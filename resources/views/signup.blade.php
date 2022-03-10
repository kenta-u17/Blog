@extends('layouts.app')

@section('content')
    <div class="login_top">
        <h1 class="login_title">新規ユーザー登録</h1>
        <hr>

        <form method="post">
            @csrf

            @include('inc.error')

            <h4 class="login_text">メールアドレスで登録</h4>
            <div>
                <h4 class="signup_text">名前</h4>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前" id="blog_form"
                    class="login_mails">
            </div>

            <div>
                <h4 class="signup_text">メールアドレス</h4>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="メールアドレス" id="blog_form"
                    class="login_mails">
            </div>

            <div class="signup_text">
                <h4>パスワード</h4>
                <input type="password" name="password" placeholder="パスワード" id="blog_form" class="login_mails">
            </div>

            <br>
            <input type="submit" value=" 新規登録する " id="blog_form" class="login_form">

        </form>
    </div>
@endsection
