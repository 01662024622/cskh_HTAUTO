<?php

namespace App\Models\HT11;

use Illuminate\Database\Eloquent\Model;

class FormInsurance extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'product', 'bill', 'amount', 'insurance_date', 'type', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'file',
    ];
    protected $fillable_store = [
        'name', 'phone', 'address', 'product', 'bill', 'amount', 'insurance_date', 'type', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'file',
    ];
    protected $fillable_update = [];
    protected $table = "ht11_form_insurances";
}
