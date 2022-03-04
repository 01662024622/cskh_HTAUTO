<?php

namespace App\Models\HT50;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable=[
        'code','role_pt','role_cs','coin','used','level','total','period_pre','period_real','t1','t2','t3','t4','t5','t6','t7','t8','t9','t10','t11','t12'
    ];
    protected $fillable_store = [

    ];
    protected $fillable_update = [

    ];

    protected $table = "ht50_revenues";
}
