@extends('layouts.app')

@section('content')
    <div class="blog_top">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            function ajaxSubmit(form) {
                axios.post('/mypage/blogs/create', new FormData(form))
                    .then(function(response) {
                        console.log(response);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });

                return fales;
            }
        </script>

        <div class="bodye">
            <h1 class="top_title_group">ブログ新規作成</h1>

            <form method="post" enctype="multipart/form-data" onsubmit="retrun ajaxSubmit(this)">
                @csrf

                @include('inc.error')

                @include('inc.message')

                <div class="create_title">
                    <input type="text" name="title" id="create_title_text" value="{{ old('title') }}"
                        placeholder="タイトルを入力して下さい">
                </div>

                <div class="create_body">
                    <label>本文：</label>
                    <textarea name="body" id="create_textbox">{{ old('body') }}</textarea>
                </div>

                <div class="open_check">
                    <label><input type="checkbox" name="is_open" value="1" id="checkbox_isopen"
                            {{ old('is_open') ? 'checked' : '' }}>公開する</label>
                </div>

                <div class="font_Choice">
                    <label>画像：</label>
                    <label class="upload-label">
                        ファイルを選択
                        <input type="file" name="pict" id="img_choice">
                    </label>
                </div>

                <div class="post_blog_form">
                    <input class="post_blog" type="submit" value="投稿する">
                </div>

            </form>
        </div>
    </div>
@endsection
