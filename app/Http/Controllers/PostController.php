<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Affiche la page de création de Post aux utilisateurs
    public function create(){
        return view('posts.createPost');
    }

    // Enregistrement des Post envoyé par les utilisateurs
    public function store(){

        $data = request()->validate([
            'post_content' => 'required',
            'post_title' => 'required',
            'post_type' => 'required',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->post_title = $data['post_title'];
        $post->post_content = $data['post_content'];
        $post->post_status = false;
        $post->post_type = $data['post_type'];


        $post->save();

        return redirect('welcome');

    }


    // Retourne la page d'Edition des Post
    public function edit(Post $post){

        $this->authorize('update', $post);

        return view('posts/editPost', compact('post'));

    }


    // Enregistrement des données d'éditions
    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $data = request()->validate([
            'post_content' => ['required'],
            'post_title' => ['required'],
            'post_type' => ['required'],
        ]);

        $post->update($data);
        return redirect('welcome');
    }


    // Suppression de Post
    public function destroy(Post $post){

        $this->authorize('delete', $post);

        $post->delete();
        return redirect('welcome');
    }



}
