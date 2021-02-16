<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Models\User;

class UserMeta extends Model
{
    protected $fillable=['user_id','meta_type','meta_key','meta_value'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
