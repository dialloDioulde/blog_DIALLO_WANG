<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

#class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','google_id', 'provider', 'provider_id'
    ];

    //protected $guarded = [];

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

    // Cette fonction retourne les posts d'un utilisateur donné
    public function posts(){
        return $this->hasMany('App\Post');
    }


    // Cette fonction permet de lier un utilisateur à un ou plusieurs rôle(s)
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    // Cette fonction permet de récuperer un utilisateur qui a le rôle admin
    public function isAdmin(){
        return $this->roles()->where('name','admin')->first();
    }

    // Cette fonction retourne l'ensemble des rôles d'un utilisateur donné
    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name',$roles)->first();
    }

    // Cette fonction retourne les commentaires d'un utilisateur donné
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
