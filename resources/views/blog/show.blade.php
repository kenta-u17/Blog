@extends('layouts.app')

@section('content')

<h1>{{ $blog->title }}</h1>
<div>{!! nl2br(e($blog->body)) !!}</div>

@if($blog->pict)
<P><img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="350"></p>
@endif

<p>name: {{ $blog->user->name }}</P>

<h2>コメント一覧</h2>

@foreach($blog->comments as $comment)
    <hr>
    <p>{{ $comment->name }} <small>（{{ $blog->updated_at }}）</small></p>　
    <p>{!! nl2br(e($comment->body)) !!}</P>
@endforeach

<!-- //コメント機能の追加 -->
<hr>
<form method="post"  onsubmit="return ajaxSubmit(this)">
@csrf

@include('inc.error')

@include('inc.message')

<div>name:
    <input type="text" name="name" style="width:300px" value="名無しさん">
</div>

<div>コメント：
    <textarea name="body" style="width:300px; height:200px;">{{ old('body') }}</textarea>
</div>
<input type="submit" value="送信する">

</form>

@endsection