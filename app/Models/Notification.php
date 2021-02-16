<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=['title','type','notification_to','notification_from','post_id','product_id','status'];

    public function notificationto(){
    	return $this->belongsTo('App\Models\User','notification_to');
    }
    public function notificationfrom(){
    	return $this->belongsTo('App\Models\User','notification_from');
    }
    public function post(){
    	return $this->belongsTo('App\Models\Post','post_id');
    }

    public function product(){
    	return $this->belongsTo('App\Models\Product','product_id');
    }
}
