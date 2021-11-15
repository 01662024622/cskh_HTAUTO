<?php

namespace App\Http\Controllers\HT11;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT11\Insurance;
use App\Services\HT11\InsuranceService;

class InsuranceController  extends Controller
{

    public function index()
    {
        $data = Insurance::where('status',0)->select(['id','name'])->get();
        return view('insurance.index')->with('data',$data); // TODO: Change the autogenerated stub
    }
    public function show($id){
        return Insurance::where('id',$id)->where('status',0)->first();
    }
    public function noInsurance(){
        return view('insurance.noInsurance');
    }
}
