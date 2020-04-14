<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        return view('admin.users.index')->with('users', $user);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect()->route('users.index');

        }

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //

        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')) {
            return redirect()->route('users.index');

        }

        $user_posts = Post::where('user_id', $user->id)->get(); // Récupère tous les Posts de l'utilisateur
        $user_comments = Comment::where('user_id', $user->id)->get(); // Récupère tous les Commentaires de l'utilisateur

        foreach ($user_posts as $user_post){        // Pour chacun des posts on
            $comments = Comment::where('post_id', $user_post->id)->get(); // Récupère les commentaires

            foreach ($comments as $comment){    // Pour chacun des Commentaires
                $comment->delete();             // On le supprime
            }

            $user_post->delete(); // On supprime le post
        }

        foreach ($user_comments as $user_comment){ // Pour chacun des Commentaires de l'utilisateur
            $user_comment->delete();               // On le supprime
        }

        $user->roles()->detach(); // On retire également le rôle attribué à l'utilisateur
        $user->delete(); // On supprime l'utilisateur

        return redirect()->route('users.index');

        //
    }
}
