<?php

namespace App\Models\HT50;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable=['code','name','phone'];

    protected $table = "data_kh";
}
