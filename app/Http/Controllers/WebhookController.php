<?php
namespace App\Http\Controllers;

use App\Center;
use App\Customer;
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
        return response("true", 200);

    }


    public function create(Request $request)
    {
        $nhanh = $request->only(["event", "webhooksVerifyToken", "data"]);
        if ($nhanh["webhooksVerifyToken"] != "Thangui0011@@1996") return response('error', 404);
        $oldToken = ErpToken::latest()->first();
        $this->token = $oldToken->token;
        if ($nhanh["event"] == "productAdd") {
            return $this->procedureProduct($nhanh);
        }

        if ($nhanh["event"] == "orderAdd" ||$nhanh["event"] == "orderUpdate") {
            return $this->procedurePoint();
        }
        if ($nhanh["event"] != "inventoryChange") {
            $webhook = Webhook::create(['data' => json_encode($nhanh)]);
            return response($webhook, 200);
        }

        return $this->procedureInventory($nhanh);
    }
    private function procedurePoint(){
        $res = $this->getCustomersPoint();

            foreach ($res->data->customers as $customer) {
                $CheckCustomer = Customer::where("phone",preg_replace('/\s+/S', " ", $customer->mobile))->first();
                if($CheckCustomer){
                    if($CheckCustomer->coin == (int)$customer->points) continue;
                    $this->updatePoint($CheckCustomer);
                    $CheckCustomer->update(["coin"=>(int)$customer->points]);
                }else{
                    // thêm mới khách hàng
                    $newC = new Customer();
                    $newC->phone = preg_replace('/\s+/S', " ", str_replace("\"","",$customer->mobile));
                    $newC->name = preg_replace('/\s+/S', " ", str_replace("\"","",$customer->name));
                    $newC->coin = (int)$customer->points;

                    $getCustomer = $this->getCustomer($newC->phone);
                    if (property_exists($getCustomer, 'data')){
                        if(count($getCustomer->data)>0){
                            $newC->eId=$getCustomer->data[0]->id;
                            $newC->save();
                            continue;
                        }
                    }
                    $res = $this->updatePoint($newC);
                    if (!property_exists($res, 'data')) {
                        Log::create(["content"=> "create customer false","description"=>$newC->phone."-".$res]);
                        continue;
                    }
                    $newC->eId=$res->data->id;
                    $newC->save();
                }

            }
        return response('true', 200);
    }
    private function procedureProduct($nhanh){

        if($nhanh["data"]["parentId"]!= null)
            return response('true', 200);
        $product = Product::create(["code"=>$nhanh["data"]["code"],"name"=>$nhanh["data"]["name"]]);
        $product->slug=$product->code;
        $product->sku=$product->code;
        $product->type="item";
        $product->variations=[];
        $product->categories=[];
        $product->units=[];
        $product->parts=[];
        $product->unit=null;
        $product->price=$nhanh["data"]["price"];
        $product->normal_price=$nhanh["data"]["price"];
        $product->original_price=0;
        if(array_key_exists("image",$nhanh["data"])){
            $info = pathinfo($nhanh["data"]["image"]);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.lep.vn/v1/images/upload-single?group=products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('file'=> curl_file_create($nhanh["data"]["image"],'image/jpeg',$info['basename'])),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NDk0MjkyLCJwaG9uZSI6ImFkbWluIiwiZW1haWwiOm51bGwsIm5hbWUiOiJBZG1pbiIsImF2YXRhciI6bnVsbCwic2VydmljZSI6InN0YWZmIiwiZXhwIjoxNjY5MDUwODk0LCJpYXQiOjE2NjgxODY4OTQsImF1ZCI6IndlYiIsImlzcyI6ImF1dGguYjJjLnZuL3VzZXIvd2ViIn0.Z-VqfS1MeLtb3fkFzSQOitWNTb-GePicQoF6qF4r0Hsp11Yu_OeuU7EGPZF1RFxMTjuG7CySSu07EvDTqj7BDsoznrE-Lb6G_PqnS1RZM5CNLSK2vqoYN7_5o5vlyEJ4EHqhbNGd8WALI6t4_XBptwG7oU_oTv48kbeY2f21wea3DIkcHg2mqe25TJr_U0bB3XPuPd99nXAY6xFDrk-99hset1rf2Fju2E3U41TMYXsD2xwgbNlBbtVB0YJXTKqhSQWrGhCh-weSfl0ACO-hAVeoFEFkwdKY_ny1KcPIFxv5c_zCkl0qGYCk39emoexsWERdKoaTGPRcss0Sy6bWEQ'
                ),
            ));

            $response = json_decode(curl_exec($curl));
            if (!property_exists($response, 'url')) return response("true", 200);
            $product->thumbnail_url =$response->url;
            curl_close($curl);

        }


        $res = $this->getSubProducts($nhanh["data"]["productId"]);
        if (!property_exists($res, 'data')) {
            $product->products=[];
            $resProduct = $this->createProduct($product);
            if (!property_exists($resProduct, 'data')) return response("true", 200);
            $update = Product::find($product->id);
            $update->pId=$resProduct->data->id;
            $update->save();
            return response("true", 200);
        }
        $subProducts=[];
        $index=0;
        foreach ($res->data->products as $value) {

            $sub =array(
                "indexes"=>[$index],
                "options"=> ["\"".trim(str_replace("-","",str_replace($product->code,"",$value->code)))."\""],
                "option_name"=> trim(str_replace("-","",str_replace($product->code,"",$value->code))),
                "slug"=>$value->code,
                "sku"=>$value->code,
                "name"=>$value->name,
                "type"=>"item",
                "variations"=>[],
                "categories"=>[],
                "units"=>[],
                "parts"=>[],
                "unit"=>null,
                "price"=>$value->price==null?0:$value->price,
                "normal_price"=>$value->price==null?0:$value->price,
                "original_price"=>0,

            );
            $subProducts[] = $sub;
            $index++;
        }
        $product->products = $subProducts;
        $resProduct = $this->createProduct($product);

        if (!property_exists($resProduct, 'data')) {
            $tok = $this->login();
            if($tok=="") return response("true", 200);

            $resProduct = $this->createProduct($product);
            if (!property_exists($resProduct, 'data')) return response("true", 200);
        }
        $update = Product::find($product->id);
        $update->pId=$resProduct->data->id;
        $update->save();
        $resProduct = $this->getListSubOfProduct($update->pId);
        if (!property_exists($resProduct, 'data')) {
            $tok = $this->login();
            if($tok=="") return response("true", 200);
            $resProduct = $this->getListSubOfProduct($update->pId);
            if (!property_exists($resProduct, 'data')) return response("true", 200);
        }
        foreach ($resProduct->data->products as $value) {
            foreach ($subProducts as $subP){
                if (strtolower($subP["sku"]) == strtolower($value->sku)){
                    Product::create(["code"=>$value->sku,"name"=>$subP["name"],"pId"=>$value->id,"parentId"=>$update->pId]);
                    break;
                }
            }
        }
        return response("true", 200);
    }
    private function procedureInventory($nhanh){
        $stocks = Center::where('nhanhId', '>', 0)->where('active',1)->get();
        $stockNhanhs = Center::where('nhanhId', '>', 0)->where('active',1)->get()->pluck('nhanhId')->toArray();
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
            $check=true;
            break;
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
    private function createProduct($data)
    {
        $token =str_replace("\"", "", $this->token);
        $headers = array('Authorization' => 'Bearer ' .$token, 'Content-Type' => 'application/json');
        $body = Body::json($data);
        $response = Api::post('https://api.lep.vn/v1/products', $headers, $body);
        return $response->body;

    }
    private function getListSubOfProduct($id)
    {
        $token =str_replace("\"", "", $this->token);
        $headers = array('Authorization' => 'Bearer ' .$token, 'Content-Type' => 'application/json');
        $response = Api::get('https://api.lep.vn/v1/products/'.$id, $headers);
        return $response->body;

    }

    private function getCustomersPoint()
    {
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $data = $this->getBodyGetProduct("{\"page\":1,\"fromLastBoughtDate\":\"" . date("Y-m-d") . "\",\"toLastBoughtDate\":\"" . date("Y-m-d") . "\"}");
        $response = Api::post('https://open.nhanh.vn/api/customer/search', $headers, $data);
        return $response->body;

    }
    private function getSubProducts($id)
    {
        $headers = array('Content-Type' => 'application/x-www-form-urlencoded');
        $data = $this->getBodyGetProduct("{\"page\":1,\"parentId\":".$id."}");
        $response = Api::post('https://open.nhanh.vn/api/product/search', $headers, $data);
        return $response->body;

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

    private function getBodyGetProduct($data) {
        return "appId=73008&version=2.0&businessId=16294&accessToken=MbkK0iZX0IwRewzFLAdJ0w1X9RCEwqmFUJsIpl2kZQ1ytElyOjTmHrjBqHwNKo2ysghCOhbBhzPQ65AVT5GBzFqgBADC2WekYD1jsgQoEtmq9IyrvbVRm8TME0uaDWsV5h1eYq6Jx5Zp87lrHgcZrJtRTsXjAo8uteUbkMgdWPWAt2IMTadyet8H2JTi"
            ."&data=".$data;
    }

    private function updatePoint($customer)
    {
        $token =str_replace("\"", "", $this->token);
        $headers = array('Authorization' => 'Bearer ' .$token,'Content-Type' => 'application/json');
        $data = "{\n" .
            "  \"type\": \"individual\",\n" .
            "  \"name\": \"".$customer->name."\",\n" .
            "  \"phone\": \"".$customer->phone."\",\n" .
            "  \"group\": {\n" .
            "    \"id\": 6,\n" .
            "    \"name\": \"MEMBER\"\n" .
            "  },\n" .
            "  \"stores\": [\n" .
            "\n" .
            "  ],\n" .
            "  \"gender\": \"female\",\n" .
            "  \"country\": \"vn\",\n" .
            "  \"permissions\": [\n" .
            "    \"user\"\n" .
            "  ],\n" .
            "  \"total_point\": ".$customer->coin.",\n" .
            "  \"status\": \"active\"\n" .
            "}";
        if(empty($customer->eId)){
            $response = Api::post('https://api.lep.vn/v1/users', $headers, $data);
        }else{
            $response = Api::put('https://api.lep.vn/v1/users/'.$customer->eId, $headers, $data);
        }
        return $response->body;
    }
    private function getCustomer($phone)
    {
        $token =str_replace("\"", "", $this->token);
        $headers = array('Authorization' => 'Bearer ' .$token, 'Content-Type' => 'application/json');
        $response = Api::get('https://api.lep.vn/v1/users?limit=20&skip=0&keyword='.$phone, $headers);
        return $response->body;

    }
}
