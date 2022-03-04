<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Controller;
use App\Models\HT50\InforCustomerSurvey;
use App\Models\HT50\Revenue;
use App\Models\HT50\T4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerGiftController extends Controller
{
    public function show($id)
    {
        return InforCustomerSurvey::where('code',$id)->first();
    }
    public function edit($id){
        if ($id == '') return view('errors.404');

        $data = Revenue::rightjoin('ht50_information_customer_surveys', 'ht50_information_customer_surveys.code', '=', 'ht50_revenues.code')->groupBy('level')->select('level', DB::raw('count(*) as total'))->get();
        $levels = ["Total" => 0, "Gold" => 0, "Member" => 0, "Platinum" => 0, "Silver" => 0, "Titan" => 0];
        $total = 0;
        foreach ($data as $level) {
            $total = $total + $level['total'];
            $levels[$level['level']] = $level['total'];
        }
        $levels["Total"] = $total;
        return view('survey.'.$id)->with($levels);
    }
    public function store(Request $request){
        $data= InforCustomerSurvey::where('code',$request->code)->first();
        return $data->update($request->only($data->getUpdate()));
    }
    public function setBG(Request $request){
        $data= InforCustomerSurvey::where('code',$request->code)->first();
        return $data->update($request->only($data->getUpdate()));
    }
}
