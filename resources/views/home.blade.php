@extends('layouts.app')

@section('content')
    <div class="blog_top">
        <h1 class="top_title_group">ブログ一覧</h1>
    </div>
    <hr>

    <div class="home_body">
        <div class="card_flame">
            @foreach ($blogs as $blog)
                <div class="card_box">
                    <div class="card__imgframe">
                        @if ($blog->pict === null)
                            <img src="/storage/fonts/sun.jpeg" alt="" srcset="" class="muscle">
                        @else
                            <img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" class="muscle">
                        @endif
                    </div>
                    <div class="card__textbox">
                        <a href="{{ route('blog.show', $blog) }}" class="card_texts">
                            <div class="card__titletext" type="button">
                                {{ $blog->title }}
                            </div>
                            <div class="card__overviewtext">
                                {{ $blog->user->name }}
                                （{{ $blog->comments_count }}件のコメント）
                                <div class="card_date">
                                    <small>{{ $blog->updated_at }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="paginations">
        {{ $blogs->links('vendor.pagination.custom') }}
        {{ $blogs->total() }}件中/
        {{ $blogs->firstItem() }}〜{{ $blogs->lastItem() }} 件を表示
    </div>

@endsection
