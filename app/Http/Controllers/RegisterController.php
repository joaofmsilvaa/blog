<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'profilePicture' => ['image'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        if(isset($attributes['profilePicture'])){
            $storingPath = request()->file('profilePicture')->store('public/profilePictures');
            $attributes['profilePicture'] = str_replace("public/", "", $storingPath);

        }
        else{
            $attributes['profilePicture'] = 'profilePictures/defaultImage.jpg';
        }

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');

    }

}
