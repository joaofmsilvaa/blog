<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function indexPosts(){
        return view('admin.posts.index', [
            'posts' => Post::paginate(15)
        ]);
    }

    public function indexCategories(){

        $categories = Category::withCount('posts')->paginate(15);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function editPost(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function editCategory(Category $category){
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function updatePost(Post $post){

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


        $post->update($attributes);

        return back()->with('success', 'Post updated');

    }

    public function destroyPost(Post $post){
        $post->delete();

        return back()->with('success', 'Post deleted');
    }

}
