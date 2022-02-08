<?php

namespace App\Http\Controllers\HT11;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT11\FormInsurance;
use App\Models\HT11\Insurance;
use App\Services\HT11\InsuranceService;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    public function index()
    {
        $data = Insurance::where('status', 0)->select(['id', 'name'])->get();
        return view('insurance.index')->with('data', $data); // TODO: Change the autogenerated stub
    }

    public function show($id)
    {
        return Insurance::where('id', $id)->where('status', 0)->first();
    }

    public function noInsurance()
    {
        return view('insurance.noInsurance');
    }

    public function edit($id)
    {
//        $data= Insurance::where('id',$id)->where('status',0)->first();
        $data = '{"data":[{
                "ask":"Đã từng thay càng?",
                "number":1,
                "answer":["Đã thay","Chưa thay"]
            },{
                "ask":"Vị trí của càng?",
                "number":2,
                "answer":["Ảnh","Phải"]
            },{
                "ask":"Mức độ tiếng kêu?",
                "number":3,
                "answer":["To","Vừa","Nhỏ"]
            },{
                "ask":"Tiếng kêu?",
                "number":4,
                "answer":["Lục cục","Lẹt kẹt"]
            },{
                "ask":"Xe có bị nhao lái không?",
                "number":5,
                "answer":["Có","Không"]
            },{
                "ask":"Tình trạng càng (chung)?",
                "number":6,
                "answer":["Cong","Biến dạng","Lỏng cao su ép vào càng","Lỏng rotuyn ép vào càng"]
            },{
                "ask":"Tình trạng rôtuyn càng?",
                "number":7,
                "answer":["Cong vênh","Ren còn tốt","Ren hỏng"]
            },{
                "ask":"Lốp mòn không đều?",
                "number":8,
                "answer":["Đều","Không"]
            },{
                "ask":"Tình trạng cao su rôtuyn càng?",
                "number":9,
                "answer":["Rách","Không rách"]
            },{
                "ask":"Tình trạng cao su càng?",
                "number":10,
                "answer":["Rách","Không rách"]
            },{
                "ask":"Vô lăng bị rung lắc?",
                "number":11,
                "answer":["Rách","Không rách","Bị rung lắc","Không bị rung lắc"]
            }
            ]}';
        $data = json_decode($data,true);
        return view('insurance.form')->with('data', $data)->with('type',$id);

    }
    public function store(Request $request){
        $fillable = ['type','name', 'phone', 'address', 'product', 'bill', 'amount', 'insurance_date', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'
        ];
        $data = $request->only($fillable);
        if ($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('file')->move(public_path('images/insurances'), $fileName);
            $url = asset('images/insurances/' . $fileName);
            $data['file']=$url;
        }
//        return $data;
        FormInsurance::create($data);
        return view('insurance.noInsurance');
    }
}
