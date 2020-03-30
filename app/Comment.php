<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
    protected $table = "comments";



    // Un commentaire donné est lié un et un seul post
    public function post(){

        return $this->belongsTo('App\Post','posts_id');
    }

    // Un commentaire donnée est lié à un et un seul utilisateur
    public function user(){

        return $this->belongsTo('App\User','user_id');
    }
}
