<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.login');
    }
<<<<<<< Updated upstream
=======

    public function store(){

        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);

    }
>>>>>>> Stashed changes
}
