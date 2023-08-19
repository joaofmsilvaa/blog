<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(){
        $posts = DB::table('Posts')->where('user_id', '=', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('user.profile', compact('posts'));
    }
}
