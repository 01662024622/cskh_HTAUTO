<?php

namespace App\Http\Controllers\HT30;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT30\Key;
use App\Services\HT30\KeyService;
use Illuminate\Http\Request;

class KeyController extends ResouceController
{
    function __construct(KeyService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'okrs'),'.key');
    }
    public function show($id)
    {
        $key = Key::find($id);
        $key->results;
        return $key; // TODO: Change the autogenerated stub
    }

    public function store(Request $request){
        $data=[];
        if ($request->type==1){
            $data['result']=100;
        }
        return parent::storeRequest($request,$data);
    }
}
