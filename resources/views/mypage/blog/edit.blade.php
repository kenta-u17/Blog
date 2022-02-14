@extends('layouts.app')

@section('content')

<h1>マイブログ編集・更新</h1>

<form method="post" enctype="multipart/form-data" onsubmit="return ajaxSubmit(this)">
@csrf

@include('inc.error')

@include('inc.message')

タイトル：<input type="text" name="title" style="width:400px" value="{{ data_get($data, 'title') }}">
<br>
本文：<textarea name="body" style="width:600px; height:200px;">{{ data_get($data, 'body') }}</textarea>
<br>
公開する：<label><input type="checkbox" name="is_open" value="1" {{ (data_get($data, 'is_open') ? 'checked' : '') }}>公開する</label>
<br>
画像：<input type="file" name="pict">
@if($blog->pict)
<P><img src="{{ Storage::url($blog->pict) }}" alt="" srcset=""></p>
@endif

<br><br>
<input type="submit" value="更新する">

</form>

@endsection