<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HT11\FormInsurance;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
class InsuranceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function anyData(Request $request)
    {
        $data = FormInsurance::join('ht11_insurance', 'ht11_insurance.id', '=', 'ht11_form_insurances.type')->get(['ht11_form_insurances.*','ht11_insurance.name as group']);

        // $products->user;
        return Datatables::of($data)
            ->addColumn('action', function ($dt) {
                return '<button type="button" class="btn btn-xs btn-warning"
            onclick="getInfo(' . $dt['id'] . ')"><i class="fas fa-pencil-alt"
            aria-hidden="true"></i></button>';
            })
            ->editColumn('insurance_date',function($dt){

               return Carbon::parse($dt['insurance_date'])->format('d/m/Y');
            })

            ->editColumn('created_at',function($dt){

               return Carbon::parse($dt['created_at'])->format('H:i d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action'])
            ->make(true);
    }
}
