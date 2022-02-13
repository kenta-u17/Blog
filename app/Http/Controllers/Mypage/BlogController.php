<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        //自分のブログ一覧のみ表示
        $blogs = $request->user()->blogs;

        return view('mypage.index', compact('blogs'));
    }

    /**
     * ブログの新規登録処理
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('mypage/login')->with('message','ログアウトしました');
    }

    /**
     * ブログ新規作成画面
     */
    public function create()
    {
        return view('mypage.blog.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'is_open' => ['nullable'],
        ]);

        $blog = $request->user()->blogs()->create($data);

        return redirect(route('mypage.blog.edit', $blog))->with('message', '新規登録しました');

    }

    /**
     * ブログの編集画面
     */
    public function edit(Blog $blog, Request $request)
    {
        //自分のブログに限定
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }

        $data = old() ?: $blog;

        return view('mypage.blog.edit', compact('data'));
    }

    /**
     * ブログの変更処理
     */
    public function update(Blog $blog, Request $request)
    {
        //自分のブログに限定
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'is_open' => ['nullable'],
        ]);

        $blog->update($data);

        return redirect(route('mypage.blog.update', $blog))->with('message', 'ブログを更新しました');

    }
}
