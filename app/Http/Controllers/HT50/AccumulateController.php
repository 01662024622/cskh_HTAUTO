<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT50\Gift;
use App\Models\HT50\GiftCustomer;
use App\Models\HT50\T4;
use App\Models\HT50\InforCustomerSurvey;
use App\Models\HT50\Revenue;
use App\Services\HT50\InforCustomerSurveyService;
use App\Services\Impl\HT50\SpeedSMSApiServericeImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccumulateController extends ResouceController
{
    function __construct(InforCustomerSurveyService $service)
    {
        parent::__construct($service, array('active' => 'survey', 'group' => 'manager'), '.accumulate');
    }

    public function index()
    {
        $data = Revenue::rightjoin('B20Customer', 'B20Customer.Code', '=', 'ht50_revenues.code')
            ->where('B20Customer.isActive', 1)
            ->where('B20Customer.isGroup', 0)
            ->groupBy('ht50_revenues.level')->select('ht50_revenues.level as level', DB::raw('count(*) as total'))->get();
        $levels = ["Total" => 0, "Gold" => 0, "HT" => 0, "Platinum" => 0, "Silver" => 0, "Titan" => 0];
        $total = 0;
        foreach ($data as $level) {
            $total = $total + $level['total'];
            $levels[$level['level']] = $level['total'];
        }
        $levels["Total"] = $total;
        return parent::index()->with($levels); // TODO: Change the autogenerated stub
    }

    public function store(Request $request)
    {
        $customer = Revenue::where('code', $request->customer_code)->first();
        if (empty($customer)) return view('errors.404');
        $gift = Gift::find($request->gift);
        $customer->used = $customer->used + $gift->coin;
        $customer->save();
        $data['customer_code'] = $request->customer_code;
        $data['gift_id'] = $request->gift;
        $data['code'] = $request->code;
        $data['created_by'] = '47';
        return GiftCustomer::create($data);
    }

    public function show($id)
    {
        if ($id == '') return view('errors.404');
        $customer = T4::where('code', $id)->first();
        if ($customer) {
            $voucher = InforCustomerSurvey::where('code', $id)->first();
            if ($voucher) return view('survey.notOver', ['voucher' => $customer->voucher]);
            return view('survey.index', ['code' => $customer->code]);
        }
        return view('errors.404');
    }

    public function edit($id)
    {
        $data = Revenue::rightjoin('B20Customer', 'B20Customer.Code', '=', 'ht50_revenues.code')
            ->where('B20Customer.isActive', 1)
            ->where('B20Customer.isGroup', 0)
            ->where('B20Customer.Role_PT', $id)
            ->groupBy('ht50_revenues.level')->select('ht50_revenues.level as level', DB::raw('count(*) as total'))->get();
        $levels = ["Total" => 0, "Gold" => 0, "Member" => 0, "Platinum" => 0, "Silver" => 0, "Titan" => 0];
        $total = 0;
        foreach ($data as $level) {
            $total = $total + $level['total'];
            $levels[$level['level']] = $level['total'];
        }
        $levels["Total"] = $total;
        return view('survey.accumulate-edit')->with($levels)->with(['role' => $id]);
    }

    public function welcomeBox($id)
    {
        $data = InforCustomerSurvey::where('code', $id)->first();
        $SMSservice = new SpeedSMSApiServericeImpl("I9NybjZuDjcA2Lfx2dAiLyFwSU3aFqAg");
        $content = "Chao mung Quy khach da tro thanh khach hang than thiet cua HTAuto Viet Nam. Chi tiet chuong trinh: https://htauto.com.vn/chinh-sach-khach . CSKH: 0888315599";
        $SMSservice->sendSMS([$data->phone], $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
        return $data->update(array('wb' => date("Y/m/d")));
    }

    public function giftBG(Request $request)
    {
        $data = InforCustomerSurvey::where('code', $request->code)->first();
        $SMSservice = new SpeedSMSApiServericeImpl("I9NybjZuDjcA2Lfx2dAiLyFwSU3aFqAg");
        $content = "HTAuto kinh chuc Quy khach sinh nhat vui ve. Tran trong gui tang Quy khach 1 voucher mua hang tai HTAuto tri gia " . $request->value . ", ma voucher: " . $request->bg . "(han:" . $request->b_date . ")";
        $SMSservice->sendSMS([$data->phone], $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
        return $data->update(array('bg' => $request->bg, 'value' => $request->value, 'b_date' => $request->b_date));
    }

    public function status($id)
    {
        return InforCustomerSurvey::where('code', $id)->first()->update(array('status' => 5));
    }
}