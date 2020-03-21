<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::status();
        return view('welcome', ['p' => $posts]);
    }

    //



    // show
    public function show($post_name) {
        $post = Post::where('post_name',$post_name)->get();

        $comment = Comment::all();

        return view('/posts/single', ['post'=>$post,'comments'=>$comment]);
    }


    public function store(Request $request, Post $post){

            $this->validate($request, [
                'comment_name' => ['required'],
                'comment_email' => ['required'],
                'comment_content' => ['required']
            ]);


        $comment = $post->auhtorComment()->create([
                'user_id' => auth()->user()->id,
                'comment_name' => $request['comment_name'],
                'comment_email' => $request['comment_email'],
                'comment_content' => $request['comment_content'],

            ]);


        return $comment;


    }
}
