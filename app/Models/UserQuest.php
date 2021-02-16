<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    protected $table='user_quests';
    protected $fillable=['user_id','quest_id'];

    public function quest(){
    	return $this->belongsTo('App\Models\Quest','quest_id');
    }

     public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    }
}
