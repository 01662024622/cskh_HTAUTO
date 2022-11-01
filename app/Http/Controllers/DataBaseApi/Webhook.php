<?php
namespace App\Http\Controllers\DataBaseApi;

use App\Http\Controllers\Controller;
use App\Models\HT11\Insurance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Webhook extends Controller
{
    public function inventory19021996(Request $request)
    {

//        $headers = array('Accept' => 'application/json');
//        $query = array('foo' => 'hello', 'bar' => 'world');
//
//        $response = Unirest\Request::post('http://mockbin.com/request', $headers, $query);
//
//        $response->code;        // HTTP Status code
//        $response->headers;     // Headers
//        $response->body;        // Parsed body
//        $response->raw_body;    // Unparsed body
        // $products->user;
        return $request;
    }
}
