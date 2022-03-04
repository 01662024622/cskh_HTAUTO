<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT50\Gift;
use App\Models\HT50\GiftCustomer;
use App\Models\HT50\Revenue;
use App\Services\HT50\GiftService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends ResouceController
{
    function __construct(GiftService $service)
    {
        parent::__construct($service, array('active' => '', 'group' => ''));
    }

    public function store(Request $request)
    {
        parent::storeRequest($request);
        return parent::storeRequest($request);
    }
    public function show($id)
    {
        $customer = Revenue::where('code',$id)->first();
        $data=GiftCustomer::select(DB::raw("ht50_gifts.name as name,ht50_gifts.coin as coin,ht50_gift_customer.created_at as date,ht50_gift_customer.code as code"))
            ->leftjoin('ht50_gifts', 'ht50_gifts.id', '=', 'ht50_gift_customer.gift_id')->where('ht50_gift_customer.customer_code',$id)->get();
        $gifts = Gift::where('coin','<',($customer->coin-$customer->used))->get();
        $res['used']=$data;
        $res['gifts']=$gifts;
        return $res;
    }
}
