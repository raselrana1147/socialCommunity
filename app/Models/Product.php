<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Product extends Model
{
    

    protected $fillable=['title','product_type','location_id','skin_level','require_token','item_url',
    'description','image_type','single_image','image_view','thumbnail','user_id','status'];

    public function location(){
    	return $this->belongsTo(Location::class);
    }
    public function user(){
    	 return $this->belongsTo('App\Models\User','user_id');
    }

    public function comment(){
    	return $this->hasMany('App\Models\ProductComment');
    }

     public function ratting(){
        return $this->hasMany('App\Models\ProductRatting');
    }
}
