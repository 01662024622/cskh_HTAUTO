<?php

namespace App\Models\HT50;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable=[
        'name','coin','plus','note'
    ];
    protected $fillable_store = [
        'name','coin','plus','note'
    ];
    protected $fillable_update = [

    ];
    protected $table = "ht50_gifts";
}
