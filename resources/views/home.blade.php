@extends('layouts.app')

@section('content')

<h1>ブログ一覧</h1>
<hr>

<div >
    @foreach($blogs as $blog)
    <div class="card_box">
        <div class="card__imgframe" >
            <img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="150"></div>
        <div class="card__titletext" type="button" onclick=location.href="{{ route('blog.show', $blog)}}">{{ $blog->title }}</div>
        {{ $blog->user->name }} 
          （{{ $blog->comments_count }}件のコメント） <small>{{ $blog->updated_at }}</small>
    </div> 

    <!-- <! <li>{{ $blog->title }} {{ $blog->user ? $blog->user->name : '(退会者)' }}</li> 存在しないデータに対応 --> 

    <!-- <li>{{ $blog->title }} {{ $blog->user->name ?? '(退会者)' }}</li> Null 合体演算子　(PHP7~) -->

    <!-- <li>{{ $blog->title }} {{ $blog->user?->name ?? '(退会者)' }}</li>　Nullsafe演算子　(PHP8~) -->

    <!-- <li>{{ $blog->title }} {{ optional($blog->user)->name }}</li> -->
    @endforeach
</div>


@endsection