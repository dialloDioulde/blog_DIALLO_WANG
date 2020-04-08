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


    // Affichage du titre des articles
    public function index(){

        $posts = Post::status();
        return view('welcome', ['p' => $posts]);
    }


    // Affichage des articles
    public function show($post_title) {

        $post = Post::where('post_title',$post_title)->get();
        return view('/posts/single', ['post'=>$post]);
    }


    // Enregsitrement des Commentaires
    public function store(Request $request, $post){

        $this->validate($request, [
            'comment_name' => ['required'],
            'comment_email' => ['required'],
            'comment_content' => ['required']
        ]);

        $comment = new Comment();

        $comment->user_id = Auth::id();
        $comment->posts_id = $post;
        $comment->comment_name = $request->input('comment_name');
        $comment->comment_email = $request->input('comment_email');
        $comment->comment_content = $request->input('comment_content');

        $comment->save();

        return redirect()->back();

    }

    // Edition De Commentaires
    public function edit($comment){
        $comment = Comment::find($comment);
        return view('commentaires/editComment')->withComment($comment);
    }


    // Enregistrement des données d'éditions
    public function update(Request $request,$comment){

        $comment = Comment::find($comment);

        request()->validate([
            'comment_name' => ['required'],
            'comment_email' => ['required'],
            'comment_content' => ['required']
        ]);

        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_content = $request->comment_content;

        $comment->save();

        return redirect('welcome');

    }


    // Suppression De Commentaires
    public function destroy(Comment $comment){

        $comment->delete();
        return redirect()->back();
    }


}
