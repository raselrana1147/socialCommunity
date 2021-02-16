<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','product_data','total_price','order_id','transaction_id',
    'user_ip','order_note','status'];
}
