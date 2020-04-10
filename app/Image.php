<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    // Posts-Comment
    public function posts(){

        return $this->belongsTo('App\Post','posts_id');
    }
}
