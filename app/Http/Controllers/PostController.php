<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Affiche la page de création de Post aux utilisateurs
    public function create(){
        return view('posts.createPost');
    }

    // Enregistrement des Post envoyé par les utilisateurs
    public function store(Request $request){

        // Validation des données
        $this->validate($request, [
            'post_content' => 'required',
            'post_title' => 'required',
            'post_type' => 'required',
            'post_image' => 'sometimes|image|max:5000',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_status = false;
        $post->post_type = $request->post_type;


        if($request->hasFile('image')){ //On vérifie qu'il y'a bien une image
            $file = $request->file('image'); // On récupère l'image
            $extension = $file->getClientOriginalExtension(); // On récupère l'extension
            $filenmane = time() . '.' . $extension;
            $file->move('images/posts/', $filenmane); // On enregistre l'image dans le dossier précisé
            $post->image = $filenmane; // On enregistre
        }

        $post->save();

        return redirect('welcome');

    }


    // Retourne la page d'Edition des Post
    public function edit(Post $post){

        $this->authorize('update', $post); // On protége l'édition du Post

        return view('posts/editPost', compact('post'));

    }


    // Enregistrement des données d'éditions
    public function update(Request $request, $post)
    {
        $this->validate($request, [
            'post_content' => 'required',
            'post_title' => 'required',
            'post_type' => 'required',
            'post_image' => 'sometimes|image|max:5000',
        ]);

        $posts = Post::find($post);
        $posts->user_id = Auth::id();
        $posts->post_title = $request->post_title;
        $posts->post_content = $request->post_content;
        $posts->post_status = false;
        $posts->post_type = $request->post_type;


        if($request->hasFile('image')){ //On vérifie qu'il y'a bien une image
            $file = $request->file('image'); // On récupère l'image
            $extension = $file->getClientOriginalExtension(); // On récupère l'extension
            $filenmane = time() . '.' . $extension;
            $file->move('images/posts/', $filenmane); // On enregistre l'image dans le dossier précisé
            $posts->image = $filenmane; // On enregistre
        }


        $posts->update();
        return redirect('welcome');
    }


    // Suppression de Post
    public function destroy(Post $post){

        $this->authorize('delete', $post); // Protège la suppression du Post

        $comments = Comment::where('posts_id', $post->id)->get(); // Récupère les commentaires du Post

        foreach ($comments as $comment){
            $comment->delete();
        }

        $post->delete();
        return redirect('welcome');
    }



}
