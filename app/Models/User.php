<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','parent_id','email', 'username','phone','password','salt','country',
        'city','dob','birth_place','occupation','website','life_status',
        'credit','balance','avatar','cover_photo','about','is_affiliate',
        'affiliate_id','status','email_active','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges');
    }

    public function quests()
    {
        return $this->belongsToMany(Quest::class, 'user_quests');
    }

    public function post(){
       return $this->hasMany(Post::class);
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public  function cart(){
        return $this->belongsTo('App\Models\Cart');
    }

    public function parent(){
         return $this->belongsTo('App\Models\User','parent_id');
    }

   
}
