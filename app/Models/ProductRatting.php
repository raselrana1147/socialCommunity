<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductRatting extends Model
{
    protected $fillable=['user_id','product_id','type','content','ratting','status'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','product_id');
    }
}
