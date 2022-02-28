@extends('layouts.app')

@section('content')

<h1>ブログ一覧</h1>
<hr>

<div  class="card_flame">
    @foreach($blogs as $blog)
    @if($blog->pict === NULL)
    <div class="card_box">
        <div class="card__imgframe" >
            <img src="" alt="" srcset="" width="280" height="140">
        </div>
        <div class="card__textbox">
            <div class="card__titletext" type="button" onclick=location.href="{{ route('blog.show', $blog)}}">
                {{ $blog->title }}
            </div>
            <div class="card__overviewtext">
                {{ $blog->user->name }} 
                （{{ $blog->comments_count }}件のコメント） <small>{{ $blog->updated_at }}</small>
            </div>
        </div>
    </div>
    @else
    <div class="card_box">
        <div class="card__imgframe" >
            <img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="280" height="140">
        </div>
        <div class="card__textbox">
            <div class="card__titletext" type="button" onclick=location.href="{{ route('blog.show', $blog)}}">
                {{ $blog->title }}
            </div>
            <div class="card__overviewtext">
                {{ $blog->user->name }} 
                （{{ $blog->comments_count }}件のコメント） <small>{{ $blog->updated_at }}</small>
            </div>
        </div>
    </div>
    @endif
    
    @endforeach
</div>


@endsection