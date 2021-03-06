<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ブログ</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="body">
        <div class="header_set">
            <div class="newHeader">
                <img src="/storage/fonts/massle.svg" alt="" srcset="" class="muscle_font">
                <h1 id="muscle_title">筋肉BLOG</h1>
            </div>
            <div class="header_text">
                <div class="blogtop"><a class="menu_button" href="/">TOP（ブログ一覧）</a></div>
                @auth
                    <div class="title_text">
                        <div class="my_blogs"><a class="menu_button" href="/mypage">ブログ管理</a></div>
                        <div class="youser_names">ようこそ{{ auth()->user()->name }}さん！</div>
                        <div class="back">
                            <form method="post" action="/mypage/logout">
                                @csrf
                                <div><input type="submit" value="ログアウト" id="back_input"></div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="blog_login_set">
                        <div><a class="blog_login" href="{{ route('login') }}">ログイン</a></div>
                        <div>
                            <a class="new_login" href="/signup">
                                新規登録
                            </a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    @yield('content')

</body>

</html>
