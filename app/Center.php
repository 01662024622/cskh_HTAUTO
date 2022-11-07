<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name','phone','address','nhanhId'
    ];
    protected $table = "centers";
}
