<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()
            ->with(['category', 'author'])->paginate(15)->withQueryString();

        return view('posts.index', compact('posts'));
    }
}
