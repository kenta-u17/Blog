@extends('layouts.app')

@section('content')

<h1>新規ユーザー登録</h1>

<form method="post">
@csrf

@include('inc.error')

<div>
  <label>名前：</label>
  <input type="text" name="name" value="{{old('name')}}">
</div>

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

@endsection