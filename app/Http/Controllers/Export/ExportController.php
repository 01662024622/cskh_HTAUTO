<?php

namespace App\Http\Controllers\Export;

use App\Exports\KHTTExport;
use App\Exports\RevenueExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public function export($id){
        return Excel::download(new RevenueExport(['role_pt'=>$id]), 'KHTT-all'.time().'.xlsx');
    }
    public function total(){
        return Excel::download(new RevenueExport(['role_pt'=>'']), 'KHTT-all'.time().'.xlsx');
    }
    public function khttTotal(){
        return Excel::download(new KHTTExport(['role_pt'=>'','status'=>'']), 'KHTT-detail'.time().'.xlsx');
    }
    public function khtt(){
        return Excel::download(new KHTTExport(['role_pt'=>'','status'=>1]), 'KHTT-detail'.time().'.xlsx');
    }
}
