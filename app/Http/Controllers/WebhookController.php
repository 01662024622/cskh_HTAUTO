<?php

namespace App\Http\Controllers;

use App\Center;
use App\ErpToken;
use App\Log;
use App\Product;
use App\Webhook;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Http\Request;
use Unirest\Request as Api;
use Unirest\Request\Body;

class WebhookController extends Controller
{
    private const USER = "admin";
    private const PW = "123456a@";
    private $token = "";

    public function get(Request $request)
    {
        $webhook = Webhook::create(['data' => json_encode($request->all())]);
        return response($webhook, 200);
    }

    public function create(Request $request)
    {
        $nhanh = $request->only(["event", "webhooksVerifyToken", "data"]);
        if ($nhanh["webhooksVerifyToken"] != "Thangui0011@@1996") return response('error', 404);

        if ($nhanh["event"] != "inventoryChange") {
            $webhook = Webhook::create(['data' => json_encode($nhanh)]);
            return response($webhook, 200);
        }
        $oldToken = ErpToken::latest()->first();
        $stocks = Center::where('nhanhId', '>', 0)->get();
        $stockNhanhs = Center::where('nhanhId', '>', 0)->get()->pluck('nhanhId')->toArray();
        $this->token = $oldToken->token;
        foreach ($nhanh["data"] as $item) {
            $product = Product::where('code', $item['code'])->where('parentId', '>', 0)->first();
            if ($product == null) {
                $product = Product::where('code', str_replace("-", "", $item['code']))->where('parentId', '>', 0)->first();
            }
            if ($product == null) {
                Log::create(['content' => $item['code'], 'description' => 'product not have']);
                continue;
            }
            $erpProduct = $this->getProduct($this->token, $product->parentId, false);
            foreach ($erpProduct as $i) {
                if (str_replace("-", "", $i->sku )==str_replace("-", "", $product->code) ) {
                    foreach ($item["depots"] as $key => $value) {
                        if (in_array((int)$key, $stockNhanhs)) {
                            $stockMap = $this->stockFilterNhanh($stocks, (int)$key);
                            $this->checkQuantity($i,$value,$stockMap,$product->parentId);
                        }
                    }
                }
            }
        }
        return response('true', 200);
    }

    private function checkQuantity($inventoryErp, $inventoryNhanh, $stockMap,$id)
    {

        $check = false;
        foreach ($inventoryErp->stocks as $stockErp) {
            if ($stockErp->id != $stockMap->id) continue;
            if ($stockErp->total_quantity == $inventoryNhanh['available']) {
                $check =true;
                break;
            }

            $product = array('id' => $stockErp->product_id,
                'option_id' => $stockErp->product_option_id,
                'total_quantity' => $stockErp->total_quantity,
                'total_actual' => $inventoryNhanh['available'],
                'total_adjustment' => $inventoryNhanh['available']-$stockErp->total_quantity);
            $this->upDateInventory($stockMap,$product);
        }
        if($check) return;
        if ($inventoryNhanh['available']==0) return;
        $product = array('id' => $id,
            'option_id' => $inventoryErp->id,
            'total_quantity' => 0,
            'total_actual' => $inventoryNhanh['available'],
            'total_adjustment' => $inventoryNhanh['available']);
        $this->upDateInventory($stockMap,$product);
    }

    private function getProduct(string $token, int $id, bool $check = true)
    {
        $headers = array('Authorization' => 'Bearer ' . $token);

        $response = Api::get('https://api.lep.vn/v1/products/' . $id, $headers);
        $res = $response->body;
        if (property_exists($res, 'data')) {
            return $response->body->data->products;
        }
        Log::create(['content' => 'error', 'description' => 'get product ' . $id]);
        if ($check) {
            $token = $this->login();
            if ($token == '') return null;
            return $this->getProduct($token, $id, false);
        }
        return null;
    }

    private function upDateInventory($stock, $product)
    {
        $token =str_replace("\"", "", $this->token);
        $headers = array('Authorization' => 'Bearer ' .$token, 'Content-Type' => 'application/json');
        $products = array($product);
        $data = array('note' => 'Phiếu kiểm hàng tự động', 'store' => $stock, 'status' => 'completed', 'products' => $products);

        $body = Body::json($data);
        $response = Api::post('https://api.lep.vn/v1/stock-takes', $headers, $body);
        $res = $response->body;

    }

    private function login(): string
    {
        try {
            $headers = array('Content-Type' => 'application/json');
            $data = array('username' => self::USER, 'password' => self::PW, 'service' => 'staff');

            $body = Body::json($data);
            $response = Api::post('https://api.lep.vn/v1/auth/login-password?group=web', $headers, $body);
            $res = $response->body;
            if (property_exists($res, 'data')) {
                $token = json_encode(str_replace("\"", "", $response->body->data->token->access_token));
                ErpToken::create(['token' => $token]);
                $this->token = $token;
                return $token;
            }
            Log::create(['content' => 'error', 'description' => 'login false']);
            return '';

        } catch (Exception $e) {
            return '';
        }
    }

    private function stockFilterNhanh($lts, int $id)
    {
        foreach ($lts as $value) {
            if ($value->nhanhId == $id) {
                return $value;
            }
        }
        return null;
    }

    private function stockFilterErp(array $lts, int $id)
    {
        foreach ($lts as $value) {
            if ($value->id == $id) {
                return $value;
            }
        }
        return null;
    }
}
