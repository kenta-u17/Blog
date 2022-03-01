@extends('layouts.app')

@section('content')

<div class="blog_top"><h1>ブログ一覧</h1></div>
<hr>

<div  class="card_flame">
    @foreach($blogs as $blog)
    <div class="card_box">
        <div class="card__imgframe" >
        @if($blog->pict === NULL) 
            <img src="/storage/fonts/sun.jpeg" alt="" srcset=""  height="185" width="280">
        @else
            <img src="{{ Storage::url($blog->pict) }}" alt="" srcset=""  height="190" width="280">
        @endif
        </div>
        <div class="card__textbox" onclick=location.href="{{ route('blog.show', $blog)}}">
            <div class="card__titletext" type="button" >
                {{ $blog->title }}
            </div>
            <div class="card__overviewtext">
                {{ $blog->user->name }} 
                （{{ $blog->comments_count }}件のコメント） <small>{{ $blog->updated_at }}</small>
            </div>
        </div>
    </div>
    
    @endforeach
</div>


@endsection