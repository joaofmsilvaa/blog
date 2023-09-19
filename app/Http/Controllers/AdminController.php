<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AdminController extends Controller
{
    public function indexPosts(){

        $posts = Post::orderByRaw('status DESC')
            ->paginate(15);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function editPost(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function editCategory(Category $category){
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function updateCategory(Category $category){

        $attributes = request()->validate([
            'name'=>['required', Rule::unique('categories', 'name')->ignore($category->id)],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
        ]);

        $category->update($attributes);

        return back()->with('success', 'Category updated');

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

    public function indexCategories(){

        $categories = Category::withCount('posts')->paginate(15);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function destroyCategory(Category $category){
        $category->delete();

        return back()->with('success', 'Category deleted');
    }

    public function indexUsers(){

        $users = User::orderByRaw('created_at DESC')
            ->paginate(15);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

}
