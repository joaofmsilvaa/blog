<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use DB;


class BookmarkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $bookmarks = $user->bookmark;

        $posts = $bookmarks->map(function ($bookmark) {
            return $bookmark->post;
        });


        return view('bookmark.index', compact('posts'));

    }

    public function store(Post $post)
    {

        $post_id = $post->id;
        $category_id = $post->category_id;
        $user_id = auth()->user()->id;

        $data=array('post_id'=>$post_id,"category_id"=>$category_id, "user_id" => $user_id);
        DB::table('bookmarks')->insert($data);

        return back()->with('success', 'Bookmark added created');

    }

}
