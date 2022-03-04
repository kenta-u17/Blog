@extends('layouts.app')

@section('content')
    <div class="blogs_backgraund">
        <div class="blog_top">
            <h1 class="top_title_group">{{ $blog->title }}</h1>
            <hr>
            <div class="blog_body_text">{!! nl2br(e($blog->body)) !!}</div>


            <div class="blog_body">
                <div class="blog_font">
                    @if ($blog->pict)
                        <p><img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="780" class="show_img">
                        </p>
                    @endif
                </div>
                <div class="youser_name">
                    <p>投稿者: {{ $blog->user->name }}</P>
                </div>
            </div>

            <div class="blog_comments">
                <h2>コメント({{ $blog->comment()->count() }})</h2>
                @foreach ($blog->comments as $comment)
                    <hr class="comment_line">
                    <p>{{ $comment->name }} <small>（{{ $blog->updated_at }}）</small></p>
                    <p class="blog_comment_body">{!! nl2br(e($comment->body)) !!}</P>
                @endforeach
            </div>

            <!-- //コメント機能の追加 -->
            <div class="create_comments">
                <hr class="create_comments_line">
                <form method="post" action="{{ route('blog.show.comment', $blog->id) }}">
                    @csrf

                    @include('inc.error')

                    @include('inc.message')

                    <div class="comment_set">
                        <div>名前</div>
                        <input type="text" name="name" value="名無しさん" class="comment_name">
                    </div>

                    <div class="comment_set">
                        <div class="comment_mini_title">コメント</div>
                        <textarea name="body" class="comment_body">{{ old('body') }}</textarea>
                    </div>
                    <div class="comment_button">
                        <button type="submit" class="bg-orange">送信する</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
