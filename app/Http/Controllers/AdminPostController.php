<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('admin/adminCrudPost', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/adminCreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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


        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filenmane = time() . '.' . $extension;
            $file->move('images/posts/', $filenmane);
            $post->image = $filenmane;
        }

        $post->save();

        return redirect()->route('adminPage');

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
    public function edit(Post $post)
    {
        return view('admin/adminEditPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filenmane = time() . '.' . $extension;
            $file->move('images/posts/', $filenmane);
            $posts->image = $filenmane;
        }

        $posts->update();

        return redirect()->route('adminPage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('adminPage');
    }
}
