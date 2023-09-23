<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Models\Post;

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

    public function store(Bookmark $bookmark)
    {

    }

}
