<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){

        request()->validate([
            'body'=>'required'
        ]);

        $post->comment()->create([
            'user_id'=>request()->user()->id,
            'body'=>request('body'),

        ]);

        return back()->with('success', 'Comment added');
    }

    public function destroy(Comment $comment){

        if (auth()->user()?->id == $comment->user->id || auth()->user()?->username == 'joao') {
            $comment->delete();
        } else {
            abort(403);
        }

        return back()->with('success', 'Comment deleted');
    }
}
