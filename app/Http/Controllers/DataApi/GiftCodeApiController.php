<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT20\B20Customer;
use App\Models\HT50\GiftCustomer;
use App\Models\HT50\InforCustomerSurvey;
use App\Models\HT50\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GiftCodeApiController extends Controller
{

    public static function dataQuery($parameter)
    {
        $data = B20Customer::select(DB::raw("
        B20Customer.Id as id,
        B20Customer.Code as code,
        B20Customer.Name as name,
        B20Customer.PhoneVT as phone1,
        ht50_information_customer_surveys.phone as phone2,
        B20Customer.Role_PT as role_pt,
        B20Customer.Role_CS as role_cs,
        ht50_information_customer_surveys.code as checks,
        ht50_revenues.coin as coin,
        ht50_revenues.used as used,
        ht50_revenues.level as level,
        ht50_revenues.total as total,
        ht50_revenues.`period_real` as `period_real`,
        ht50_revenues.`period_pre` as `period_pre`
"))->leftjoin('ht50_revenues', 'B20Customer.Code', '=', 'ht50_revenues.code')
            ->leftjoin('ht50_information_customer_surveys', 'ht50_information_customer_surveys.code', '=', 'B20Customer.code')
            ->where('B20Customer.isActive', 1)
            ->where('B20Customer.isGroup', 0)
            ->whereNotNull('B20Customer.Role_PT')
            ->where('B20Customer.Role_PT', '<>', '');
        if ($parameter['role_pt'] != '') $data = $data->where('B20Customer.Role_PT', $parameter['role_pt']);

        return $data->get();
    }

    public function anyData(Request $request)
    {
        $data = $this->dataQuery($request->only('role_pt'));

//        return $data;
        return DataTables::of($data)
            ->addColumn('action', function ($dt) {
                if ($dt['checks'])
                    return '<button type="button" data-toggle="modal"  href="#manageGift"class="btn btn-xs btn-warning" onclick="getGift(`' . $dt['code'] . '`)">
			<i class="fa fa-gift" aria-hidden="true"></i></button>
			';
                else return '<button type="button" class="btn btn-xs btn-info" data-toggle="modal"
			onclick="getInfo(`https://cskh.htauto.vn/HT01/' . $dt['code'] . '`)" href="#add-modal"><i class="fas fa-eye"
			aria-hidden="true"></i></button>';
            })
            ->addColumn('availability', function ($dt) {
                if ($dt['coin'] == null) return "0";
                return $dt['coin'] - $dt['used'];
            })
            ->addColumn('phone', function ($dt) {
                if ($dt['phone2'] == null) return $dt['phone1'];
                return $dt['phone2'];
            })
            ->addColumn('process', function ($dt) {
                if (trim($dt['level']) == 'Platinum') return "hạng cao nhất";
                $process = $dt['period_real'];
                $next = 200000000;
                if (trim($dt['level']) === 'Gold')
                    $next = 2000000000;
                if (trim($dt['level']) === 'Titan')
                    $next = 1000000000;
                if (trim($dt['level']) === 'Silver')
                    $next = 500000000;
                return '<div class="plus-up">' . number_format($next - $process) . 'VNĐ</div><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: ' . intval($process * 100 / $next) . '%;" aria-valuenow="' . intval($process * 100 / $next) . '" aria-valuemin="0" aria-valuemax="100">' . intval($process * 100 / $next) . '%</div>
</div>';
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }

    public function anyGift(Request $request)
    {
        $data = GiftCustomer::select(DB::raw("ht50_gifts.name as name,ht50_gifts.coin as coin,ht50_gift_customer.created_at as date,ht50_gift_customer.id as id,ht50_gift_customer.code as code"))
            ->leftjoin('ht50_gifts', 'ht50_gifts.id', '=', 'ht50_gift_customer.gift_id')->where('ht50_gift_customer.customer_code', $request->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }

    public function anyCustomer(Request $request)
    {
        $data = InforCustomerSurvey::select(DB::raw("ht50_gifts.name as name,ht50_gifts.coin as coin,ht50_gift_customer.created_at as date,ht50_gift_customer.id as id,ht50_gift_customer.code as code"))
            ->leftjoin('ht50_gifts', 'ht50_gifts.id', '=', 'ht50_gift_customer.gift_id')->where('ht50_gift_customer.customer_code', $request->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }

    public static function managerGiftQuery($data = '', $role = '')
    {

        $infor= InforCustomerSurvey::select(DB::raw("
            ht50_information_customer_surveys.id as id,
            ht50_information_customer_surveys.code as code,
            ht50_information_customer_surveys.name as name,
            ht50_information_customer_surveys.name_gara as name_gara,
            ht50_information_customer_surveys.phone as phone,
            ht50_information_customer_surveys.birthday as birthday,
            ht50_information_customer_surveys.wb as wb,
            ht50_information_customer_surveys.bg as bg,
            ht50_information_customer_surveys.b_date as b_date,
            ht50_information_customer_surveys.created_at as created_at,
            ht50_information_customer_surveys.value as value,
            ht50_information_customer_surveys.status as status," . $data .
            "B20Customer.Role_PT as role,
            ht50_revenues.role_pt as role_pt,
            ht50_revenues.role_pt as role_cs,
            ht50_revenues.coin as coin,
            ht50_revenues.level as level
        "))->leftjoin('ht50_revenues', 'ht50_information_customer_surveys.code', '=', 'ht50_revenues.code')
            ->leftjoin('B20Customer', 'B20Customer.Code', '=', 'ht50_information_customer_surveys.code');

        if ($role=='browser') $infor=$infor->where('ht50_information_customer_surveys.status','>','0');
        elseif ($role!='')
              $infor=$infor->where('B20Customer.Role_PT',$role);
          return  $infor;
    }

    public function managerGift(Request $request)
    {
        $data = $this->managerGiftQuery('', $request->role_pt)->get();
        $res = DataTables::of($data);

        if ($request->role_pt == 'browser'){
            $res=$res->addColumn('action', function ($dt) {
                //check gift
                $gift = '';
                if (($dt['bg'] == null || $dt['bg'] == '') && substr($dt['birthday'], 3, 2) == date("m"))
                    $gift = '<button type="button" class="btn btn-xs btn-warning" data-toggle="modal"  href="#bg" onclick="showBG(`' . $dt["code"] . '`)">
			<i class="fa fa-gift" aria-hidden="true"></i></button>';
                // check data checked
                if ($dt['status'] == 1)
                    return '<button type="button" class="btn btn-xs btn-info" onclick="checkeUpdate(`' . $dt["code"] . '`)">
			<i class="fa fa-eye" aria-hidden="true"></i></button> ' . $gift;
                else return '<button type="button" class="btn btn-xs btn-success"><i class="fas fa-check"
			aria-hidden="true"></i></button> ' . $gift;
            });
        }else{
            $res=$res->addColumn('action', function ($dt) {
                //check gift
                $gift = '';
                if (($dt['bg'] == null || $dt['bg'] == '') && substr($dt['birthday'], 3, 2) == date("m"))
                    $gift = '<button type="button" class="btn btn-xs btn-warning" data-toggle="modal"  href="#bg" onclick="showBG(`' . $dt["code"] . '`)">
			<i class="fa fa-gift" aria-hidden="true"></i></button>';
                // check data checked
                if ($dt['status'] == 0)
                    return '<button type="button" data-toggle="modal"  href="#edit" class="btn btn-xs btn-info" onclick="show(`' . $dt["code"] . '`,0)">
			<i class="fa fa-eye" aria-hidden="true"></i></button> ' . $gift;
                else return '<button type="button" class="btn btn-xs btn-success" data-toggle="modal"
			onclick="show(`' . $dt["code"] . '`,1)" href="#edit"><i class="fas fa-check"
			aria-hidden="true"></i></button> ' . $gift;
            });
        }
        if ($request->role_pt != ''|| $request->role_pt == 'browser') {
            $res = $res->editColumn('wb', function ($dt) {
                if ($dt['wb'] == null || $dt['wb'] == '')
                    return '';
                return Carbon::parse($dt['wb'])->format('d/m/Y');
            });

        } else {
            $res = $res->editColumn('wb', function ($dt) {
                if ($dt['wb'] == null || $dt['wb'] == '')
                    return '<div class="form-check" style="text-align: center">
                            <input type="checkbox" class="form-check-input" onclick="wb(`' . $dt['code'] . '`)" id="' . $dt['code'] . '">
                            </div>';
                return Carbon::parse($dt['wb'])->format('d/m/Y');
            });
        }

        return $res->editColumn('birthday', function ($dt) {
            if ($dt['bg'] == null) return $dt['birthday'];
            return $dt['birthday'] . "-" . $dt['value']."|".$dt['bg']. "(".$dt['b_date'].")";
        })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'wb', 'bg'])
            ->make(true);
    }
}
