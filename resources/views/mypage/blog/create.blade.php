@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function ajaxSubmit(form) {
  axios.post('/mypage/blogs/create',new FormData(form))
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });

  return fales;
}
</script>

<div class="body">
  <h1>マイブログ新規作成</h1>

  <form method="post" enctype="multipart/form-data" onsubmit="return ajaxSubmit(this)">
  @csrf

  @include('inc.error')

  @include('inc.message')

  <div>
  <label>タイトル：</label>
  <input type="text" name="title" style="width:400px" value="{{ old('title') }}">
  </div>

  <div>
  <label>本文：</label>
  <textarea name="body" style="width:600px; height:200px;">{{ old('body') }}</textarea>
  </div>

  <div>
  <label>公開する：</label>
  <label><input type="checkbox" name="is_open" value="1" {{ (old('is_open') ? 'checked' : '') }}>公開する</label>
  </div>

  <div>
  <label>画像：</label>
  <input type="file" name="pict">
  </div>
  <br>
  <input type="submit" value="送信する">

  </form>
</div>

@endsection