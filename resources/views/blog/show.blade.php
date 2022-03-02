@extends('layouts.app')

@section('content')
    <div class="blogs_backgraund">
        <div class="blog_top">
            <h1>{{ $blog->title }}</h1>
            <hr>
            <div>{!! nl2br(e($blog->body)) !!}</div>


            <div class="blog_body">
                <div class="blog_font">
                    @if ($blog->pict)
                        <p><img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="350"></p>
                    @endif
                </div>
                <div class="youser_name">
                    <p>投稿者: {{ $blog->user->name }}</P>
                </div>
            </div>

            <div class="blog_comments">
                <h2>コメント</h2>
                @foreach ($blog->comments as $comment)
                    <hr>
                    <p>{{ $comment->name }} <small>（{{ $blog->updated_at }}）</small></p>
                    <p>{!! nl2br(e($comment->body)) !!}</P>
                @endforeach


                <!-- //コメント機能の追加 -->
                <div class="create_comments">
                    <hr>
                    <form method="post" action="{{ route('blog.show.comment', $blog->id)}}">
                        @csrf

                        @include('inc.error')

                        @include('inc.message')

                        <div>
                            <label>name:</label>
                            <input type="text" name="name" style="width:300px" value="名無しさん">
                        </div>

                        <div>
                            <label>コメント：</label>
                            <textarea name="body" style="width:300px; height:200px;">{{ old('body') }}</textarea>
                        </div>
                        <input type="submit" value="送信する">
                    </form>
                </div>
            </div>
        </div>
    @endsection
