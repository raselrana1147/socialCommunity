<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable=[
    	'title','description','cover_picture','icon','qty','credit','status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quests');
    }
}
