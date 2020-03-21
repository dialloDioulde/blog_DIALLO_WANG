<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable =['post_title','post_name','post_type','post_category','post_status','post_content'];
    protected $guarded = [];
    // Posts-Users
    public function author()
    {
        return $this->belongsTo('App\User','user_id');

    }

    // Posts-Comment
    public function auhtorComment(){
        return $this->hasMany('App\Comment', 'comment_id');
    }


    //
    public function scopeStatus($query){
        return $query->whereIn('id', [8,9,10])->get();
    }

    //
}
