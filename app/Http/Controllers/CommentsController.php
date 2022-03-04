<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class CommentsController extends Controller
{
    public function create() {
        return view('blog.show');
    }

    // request型で送られてくる
    public function store(Blog $blog, Request $request) {

        $input = $request->validate([
            'name'=>['required', 'max:255'],
            'body'=>['required', 'max:255'],
        ]);

        $post = new Comment();
        $post->name = $input['name'];
        $post->body = $input['body'];
        $post->blog_id = $blog->id;
        $post->save();
        return back()->with('message','コメントを投稿しました');
    }

    public function show(Blog $blog)
    {
        //非公開のものは見られないようにする
        // if (! $blog->is_open) {
        //     abort(403);
        // }

        abort_unless($blog->is_open,403);

        return view('blog.show', compact('blog'));
    }
}
