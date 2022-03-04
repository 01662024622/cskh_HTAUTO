<?php

namespace App\Models\HT50;

use Illuminate\Database\Eloquent\Model;

class GiftCustomer extends Model
{
    protected $fillable=[
        'customer_code','gift_id','code','create_by'
    ];
    protected $fillable_store = [
        'customer_code','gift_id','code','create_by'
    ];
    protected $fillable_update = [

    ];
    protected $table = "ht50_gift_customer";
}
