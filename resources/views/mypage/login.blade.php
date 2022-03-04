@extends('layouts.app')

@section('content')
        <div class="login_top">
            <h1 class="login_title">ログイン</h1>
            <hr>

            <form method="post">
                @csrf

                @include('inc.error')

                @include('inc.message')

                <h4 class="login_title">メールアドレスでログイン</h4>
                <div class="mail">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="メールアドレス" id="blog_form"
                        class="login_mails">
                </div>

                <div class="login_pass">
                    <input type="password" name="password" placeholder="パスワード" id="blog_form" class="login_mails">
                </div>

                <input type="submit" value=" ログイン " id="blog_form" class="login_form">
            </form>

            <hr>
            <a class="new_login_form" href="/signup">
                <div class="new_login_form_text">新規登録はコチラから</div>
            </a>
        </div>
@endsection
