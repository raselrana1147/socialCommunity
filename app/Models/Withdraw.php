<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Withdraw extends Model
{
    protected $fillable=['user_id','balance','payment_method','payment_email','status'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
