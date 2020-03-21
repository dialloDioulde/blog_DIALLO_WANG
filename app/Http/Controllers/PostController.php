<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Post $post){

        $data = request()->validate([
            'comment_name' => ['required'],
            'comment_email' => ['required'],
            'comment_content' => ['required'],

        ]);


        Comment::create([
            'user_id' => auth()->id,
            'post_id' => $post->id,
            'comment_name' => $data['post_content'],
            'comment_email' => $data['post_title'],
            'comment_content' => $data['post_status'],

        ]);


    }
}
