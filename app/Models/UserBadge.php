<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    protected $table='user_badges';
    
    protected $fillable=['user_id','badge_id'];

    public function badge(){
    	return $this->belongsTo('App\Models\Badge','badge_id');
    }

     public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    }
}
