<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){

        $post = Post::latest()->where('status', '=', true)
            ->with(['category', 'author', 'comment'])
            ->paginate(15);

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

        return redirect('/')->with('success', 'Post created');
    }

    public function show(Post $post){

        if(request()->route('post')->status == 0 && auth()->user()?->username == 'joao'){
            $isPosted = true;
        }
        else{
            $isPosted = false;
        }

        if (auth()->user()?->id == $post->author->id || auth()->user()->username = 'joao') {
            $canDelete = true;
        } else {
            $canDelete = false;
        }

        $post = Post::where('id', $post->id)->first();
        return view('posts.show', ['post' => $post, 'canDelete' => $canDelete, 'isPosted' => $isPosted]);

    }

    public function destroy(Post $post){

        if (auth()->user()?->id == $post->author->id) {
            $post->delete();
        } else {
            abort(403);
        }

        return redirect('/')->with('success', 'Post deleted');
    }

    public function publish(Post $post){
        $post['status'] = true;
        $post['published_at'] = Carbon::now();
        $post->update();

        return back()->with('success', 'Post published');
    }

}


