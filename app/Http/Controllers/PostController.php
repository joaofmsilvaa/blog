<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        $post = Post::latest()
            ->with(['category', 'author'])->paginate(15)->withQueryString();

        return view('posts.index', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt'=>['required' , 'min:10', 'max:160'],
            'body'=>'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $storingPath = request()->file('thumbnail')->store('public/thumbnails');
        $attributes['thumbnail'] = str_replace("public/", "",$storingPath);

        Post::create($attributes);

        return redirect('/');
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->first();
        return view('posts.show', ['post' => $post]);
    }

}


