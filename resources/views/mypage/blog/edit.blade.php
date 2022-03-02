@extends('layouts.app')

@section('content')

<div class="blogs_backgraund">
  <div class="blog_top">
    <h1>マイブログ編集・更新</h1>

    <form method="post" enctype="multipart/form-data" onsubmit="return ajaxSubmit(this)">
    @csrf

    @include('inc.error')

    @include('inc.message')

    <div>
      <label>タイトル：</label>
      <input type="text" name="title" style="width:400px" value="{{ data_get($data, 'title') }}">
    </div>

    <div>
      <label>本文：</label>
      <textarea name="body" style="width:600px; height:200px;">{{ data_get($data, 'body') }}</textarea>
    </div>

    <div>

      <label><input type="checkbox" name="is_open" value="1" {{ (data_get($data, 'is_open') ? 'checked' : '') }}>公開する</label>
    </div>

    <div>
      <label>画像：</label>
      <input type="file" name="pict">
    </div>
    @if($blog->pict)
    <P><img src="{{ Storage::url($blog->pict) }}" alt="" srcset="" width="350"></p>
    @endif

    <br>
    <input type="submit" value="更新する">

    </form>
  </div>
</div>
@endsection