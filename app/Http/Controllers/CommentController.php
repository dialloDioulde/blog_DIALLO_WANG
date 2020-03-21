<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(){

    }

    public function store(Request $request){

        $this->validate($request, [
            'comment_name' => ['required'],
            'comment_email' => ['required'],
            'comment_content' => ['required']
        ]);




    }
}
