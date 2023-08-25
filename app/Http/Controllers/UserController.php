<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(User $user)
    {
        $posts = Post::latest()->where('user_id', '=', $user->id)
            ->where('status', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('user.profile', compact('posts', 'user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','max:16', 'min:3', Rule::unique('users', 'username')->ignore($user->id)],
            'profilePicture' => ['image'],
            'description' => ['max:255']
        ]);

        if(isset($attributes['profilePicture'])){
            $storingPath = request()->file('profilePicture')->store('public/profilePictures');
            $attributes['profilePicture'] = str_replace("public/", "", $storingPath);
        }


        $user->update($attributes);

        return redirect('/profile/' . $user->id)->with('success', 'Profile updated');

    }

}
