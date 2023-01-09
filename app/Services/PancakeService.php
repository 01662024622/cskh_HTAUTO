<?php

namespace App\Services;

use App\PancakeItemMap;
use App\Product;
use Unirest\Request as Api;

class PancakeService
{
    private const TOKEN = "MbkK0iZX0IwRewzFLAdJ0w1X9RCEwqmFUJsIpl2kZQ1ytElyOjTmHrjBqHwNKo2ysghCOhbBhzPQ65AVT5GBzFqgBADC2WekYD1jsgQoEtmq9IyrvbVRm8TME0uaDWsV5h1eYq6Jx5Zp87lrHgcZrJtRTsXjAo8uteUbkMgdWPWAt2IMTadyet8H2JTi";
    public static $service;

    private function __construct()
    {
    }

    public static function getInstance(): PancakeService
    {
        if (static::$service == null) {
            static::$service = new PancakeService();
        }
        return static::$service;
    }

    public function updateInventory($id, $current, $change)
    {
        $idP = $this->getProduct($id);
        $url = "https://pos.pages.fm/api/v1/shops/268808/stocktakings?access_token=" . self::TOKEN;
        $data = "{
                  \"stocktaking\": {
                    \"warehouse_id\": \"64c185f4-a7c3-417d-a514-38b624f4a0f2\",
                    \"items\": [
                      {
                        \"variation_id\": \"" . $idP . "\",
                        \"changed_quantity\": " . $change . ",
                        \"current_quantity\": " . $current . ",
                        \"quantity\": " . ($current - $change) . "
                      }
                    ],
                    \"note\": \"\",
                    \"shop_id\": \"268808\",
                    \"status\": 0,
                    \"is_batch_shelf\": false
                  }
                }";
        if (empty($customer->eId)) {
            $response = Api::post('https://api.lep.vn/v1/users', [], $data);
        } else {
            $response = Api::put('https://api.lep.vn/v1/users/' . $customer->eId, [], $data);
        }
        return $response->body;
    }

    private function getProduct($id): string
    {
        $item = PancakeItemMap::where('n_id', $id)->first();
        if ($item && $item->p_id) {
            return $item->p_id;
        }
        if ($item) {
            $url = "https://pos.pages.fm/api/v1/shops/268808/products?access_token=" . self::TOKEN .
                "&page=1&page_size=100&nearly_out=false&limit_quantity_to_warn=false&last_imported_price=false&is_promotion=false&search=" . $item->code;
            $response = Api::get($url);
            $response = $response->body;
            if (property_exists($response, 'data') && property_exists($response, 'total_entries') && $response->total_entries > 0) {
                $item->p_id = $response->body->data[0]->variations[0]->id;
                $item->save();
                return $response->body->data[0]->variations[0]->id;
            }
        }

        return "";
    }

    private function createProduct($id)
    {
        $service = SpeedService::getInstance();
        $res = $service->getProductDetail($id);
        if (property_exists($res, 'data')) {
            foreach ($res->data as $key => $value) {
                $size = substr($value->code, -1);
                if ($size != "S" && $size != "M" && $size != "L") {
                    $size = "";
                } else {
                    $size = "size:".$size;
                }
                $quantity=0;
                if (property_exists($value->inventory, 'depots')) {
                    if (property_exists($value->inventory->depots, '133563')) {
                        $quantity=$value->inventory->depots["133563"]->available;
                    }
                }
                if ((int)$key == $id) {
                    $headers = array('Accept' => '*/*');
                    $data = array(
                        "params[data][product][new_product_id]" => $value->code,
                        "params[data][product][product_name]" => $value->name,
                        "params[data][variations][0][warehouse_id]" => "64c185f4-a7c3-417d-a514-38b624f4a0f2",
                        "params[data][variations][0][fields]" => $size,
                        "params[data][variations][0][weight]" => "300",
                        "params[data][variations][0][retail_price]" => $value->price,
                        "params[data][variations][0][remain_quantity]" => $quantity,
                        "params[is_kiotviet]" => "false",
                        "params[is_auto_gen]" => "true",
                        "params[is_custom_gen]" => "false"
                    );

                    $body = Api\Body::multipart($data);

                    $response = Api::post('https://pos.pages.fm/api/v1/shops/268808/products/import?access_token='.self::TOKEN, $headers, $body);
                }
            }
        }
    }
}
