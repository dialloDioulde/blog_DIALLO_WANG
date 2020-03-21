<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $user = User::whereId($id)->first();

        if($user){
            return view('profiles.show')->withUser($user);
        }
        else{
            return 'Utilisateur inexistant';
        }

        //return view('profiles.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if($user){
                return view('profiles.edit')->withUser($user);
            }else{
                return redirect()->back();
            }

        }else{
            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user){
            $validate = null;

            if(Auth::user()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'password' => 'required|min:8'
                ]);
            }else{
                $validate = $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:8'
                ]);
            }

            if ($validate){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->password = Hash::make($request['password']);

                $user->save();
                $request->session()->flash('success', 'Votre Profil a bien été mis à jour');
                return redirect()->back();

            }else{
                return redirect()->back();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
