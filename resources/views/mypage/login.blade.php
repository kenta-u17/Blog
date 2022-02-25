@extends('layouts.app')

@section('content')

<h1>ログイン画面</h1>

<form method="post">
@csrf

@include('inc.error')

@include('inc.message')

<div>
  <label>メールアドレス：</label>
  <input type="text" name="email" value="{{ old('email' )}}">
</div>

<div>
  <label>パスワード：</label>
  <input type="password" name="password" >
</div>

<br>
<input type="submit" value=" 送信する ">

</form>

<p>
  <a href="/signup">新規ユーザー登録</a>
</p>


@endsection