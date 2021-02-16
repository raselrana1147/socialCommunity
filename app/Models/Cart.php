<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'license_type', 'price'
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
