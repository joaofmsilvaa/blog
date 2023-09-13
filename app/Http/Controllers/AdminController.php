<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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
}
