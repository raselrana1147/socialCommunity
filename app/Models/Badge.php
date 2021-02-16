<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable=[
    	'title','description','icon','qty','credit','status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges');
    }
}
