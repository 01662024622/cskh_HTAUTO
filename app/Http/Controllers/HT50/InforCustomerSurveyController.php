<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT20\B20Customer;
use App\Models\HT50\HT01Customer;
use App\Models\HT50\InforCustomerSurvey;
use App\Services\HT50\InforCustomerSurveyService;
use Illuminate\Http\Request;

class InforCustomerSurveyController extends ResouceController
{
    function __construct(InforCustomerSurveyService $service)
    {
        parent::__construct($service, array('active' => 'survey', 'group' => 'manager'));
    }

    public function store(Request $request)
    {
        $code = str_replace(".","",$request->code);
        $customer =B20Customer::where('Code',$code)->orWhere('Code',$code.'.')->orWhere('Code',$request->code)->first();
        if ($customer){
            $voucher =InforCustomerSurvey::where('code',$customer->Code)->first();
            if($voucher) return view('survey.notOver');
            $data['code']=$customer->Code;
            $data['birthday']=$request->day.'/'.$request->month.'/'.$request->year;
            parent::storeRequest($request,$data);
            return view('survey.over');
        }
        return view('errors.404');
    }

    public function index()
    {
        return view('errors.404');
    }
    public function show($id)
    {
//        return $id;

        $id = str_replace(".","",$id);
        if($id=='') return view('errors.404');
        $code = str_replace(".","",$id);
        $customer =B20Customer::where('Code',$code)->orWhere ('Code',$code.'.')->first();
        if ($customer){
            $voucher =InforCustomerSurvey::where('code',$code)->first();
            if($voucher) return view('survey.notOver',['voucher'=>$customer->Code]);
            return view('survey.index',['code'=>$customer->Code]);
        }
        return view('errors.404');
    }
}
