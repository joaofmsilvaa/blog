<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {

        $filters = request(['search']);

        $post = Post::latest()
            ->filter($filters)
            ->where('status', '=', true)
            ->with(['category', 'author', 'comment'])
            ->paginate(15);

        return view('posts.index', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post){

        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail' => ['image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if(isset($attributes['thumbnail'])){
            $storingPath = request()->file('thumbnail')->store('public/thumbnails');
            $attributes['thumbnail'] = str_replace("public/", "",$storingPath);

        }

        $post['status'] = 0;

        $post->update($attributes);

        return redirect('/')->with('success', 'Post Updated but now needs to be aproved by the admin');

    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'min:10', 'max:160'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $storingPath = request()->file('thumbnail')->store('public/thumbnails');
        $attributes['thumbnail'] = str_replace("public/", "", $storingPath);

        Post::create($attributes);

        return redirect('/')->with('success', 'Post created');
    }

    public function show(Post $post)
    {

        $bookmarkCheck = Bookmark::where('post_id', $post->id)->where('user_id', '=', auth()->user()?->id)->first();

        if (isset($bookmarkCheck)) {
            $isBookmarked = true;
        } else {
            $isBookmarked = false;
        }

        if (request()->route('post')->status == 0 && auth()->user()?->username == 'joao') {
            $isPosted = true;
        } else {
            $isPosted = false;
        }

        if (auth()->user()?->id == $post->author->id || auth()->user()?->username == 'joao') {
            $canDelete = true;
        } else {
            $canDelete = false;
        }


        $post = Post::where('id', $post->id)->first();
        return view('posts.show', ['post' => $post, 'canDelete' => $canDelete, 'isPosted' => $isPosted, 'isBookmarked' => $isBookmarked]);

    }

    public function destroy(Post $post)
    {

        if (auth()->user()?->id == $post->author->id) {
            $post->delete();
        } else {
            abort(403);
        }

        return redirect('/')->with('success', 'Post deleted');
    }

    public function publish(Post $post)
    {
        $post['status'] = true;
        $post['published_at'] = Carbon::now();
        $post->update();

        return back()->with('success', 'Post published');
    }

}


