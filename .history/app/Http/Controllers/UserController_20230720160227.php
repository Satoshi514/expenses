<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Outgo;

class UserController extends Controller

public function __construct(){
    $this->middleware('auth', ['only' => ['create', 'store']]);
 }
 

{
    public function mypage() {
    $user = Auth::user();

    return view('users.mypage',compact('user'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->update();
    
        return to_route('users.mypage');
    }

    public function update_password(Request $request) {
        $validateData = $request->validate([
            'password' => 'requred|confirmed',
        ]);

        $user = Auth::user();

        if($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage.edit_password');
        }

        return to_route('users.mypage');
    }

        public function edit_password() {
            return view('users.edit_password');
        }
    }