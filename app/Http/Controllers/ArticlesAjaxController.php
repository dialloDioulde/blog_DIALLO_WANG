<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Auth;
class ArticlesAjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::all();
        return view('admin/AjaxArticlesCRUD', compact('posts'));
    }


    public function store(Request $request){

        $post = new Post;

        $post->user_id = auth()->user()->id;
        $post->post_title = $request->input('title');
        $post->post_type = $request->input('type');
        $post->post_status = false;
        $post->post_content = $request->input('content');

        $post->save();


    }


    public function update(Request $request,$id){

        $post = Post::find($id);

        $post->post_title = $request->input('e_title');
        $post->post_type = $request->input('e_type');
        $post->post_status = $request->input('e_status');
        $post->post_content = $request->input('e_content');

        $post->save();
    }

    public function destroy($id){

        $post = Post::find($id);
        $post->delete();
        return $post;
    }

}
