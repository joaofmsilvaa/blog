<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(User $user){
        $posts = DB::table('Posts')->where('user_id', '=', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(15)->withQueryString();;


        $amountOfPosts = DB::table('Posts')->where('user_id', '=', $user->id)->count();


        return view('user.profile', compact('posts','user', 'amountOfPosts'));
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }

}