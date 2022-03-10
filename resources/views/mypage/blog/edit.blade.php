@extends('layouts.app')

@section('content')
    <div class="blog_top">
        <h1 class="top_title_group">マイブログ編集</h1>

        <form method="post" enctype="multipart/form-data" onsubmit="return ajaxSubmit(this)">
            @csrf

            @include('inc.error')

            @include('inc.message')

            <div class="create_title">
                <input type="text" name="title" id="create_title_text" placeholder="タイトルを入力して下さい"
                    value="{{ data_get($data, 'title') }}">
            </div>

            <div class="create_body">
                <label>本文：</label>
                <textarea name="body" id="create_textbox">{{ data_get($data, 'body') }}</textarea>
            </div>

            <div class="open_check">
                <label><input type="checkbox" name="is_open" value="1" id="checkbox_isopen"
                        {{ data_get($data, 'is_open') ? 'checked' : '' }}>公開する</label>
            </div>

            <div class="font_Choice">
                <label>画像：</label>
                <label class="upload-label">
                    ファイルを選択
                    <input type="file" name="pict" id="img_choice">
                </label>
            </div>
            <div class="create_img">
                @if ($blog->pict)
                    <P><img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="400px"></p>
                @endif
            </div>
            <div class="post_blog_form">
                <input class="post_blog" type="submit" value="投稿する">
            </div>
        </form>
    </div>
@endsection
