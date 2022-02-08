<?php

namespace App\Models\HT11;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'name', 'content', 'link', 'status', 'type', 'form', 'create_by', 'modify_by'
    ];
    protected $fillable_store = [
        'name', 'content', 'link', 'type', 'form'
    ];
    protected $fillable_update = ['name', 'content', 'link', 'type', 'form'];
    protected $table = "ht11_insurance";

}
