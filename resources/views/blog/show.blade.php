@extends('layouts.app')

@section('content')

<h1>{{ $blog->title }}</h1>
<div>{!! nl2br(e($blog->body)) !!}</div>

<p>name: {{ $blog->user->name }}</P>

<h2>コメント</h2>

@foreach($blog->comments as $comment)
    <hr>
    <p>{{ $comment->name }} <small>（{{ $blog->updated_at }}）</small></p>　
    <p>{{!! nl2br(e($comment->body)) !!}}</P>
@endforeach

@endsection