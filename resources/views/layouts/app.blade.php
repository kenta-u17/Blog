<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブログ</title>
  <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
</head>
<body>

<div class= "body">
  <div class="head_text">
      <div class="blogtop"><a class="menu_button" href="/">TOP（ブログ一覧）</a></div>
      @auth
        <div class="title_text">
          <div class="my_blogs"><a class="menu_button" href="/mypage">ブログ管理</a></div>
          <div class="youser_names">ようこそ{{ auth()->user()->name }}さん！！</div>
          <div class="back">
            <form method="post" action="/mypage/logout">
              @csrf
              <div><input type="submit" value="ログアウト" ></div>
            </form>
          </div>
        </div>
      @else
        <div class="blog_login_set">
          <div><a class="blog_login" href="{{ route(('login')) }}">ログイン</a></div>
          <div>
            <a class="new_login" href="/signup">
              <img src="/storage/fonts/icon_152072_256.png" alt="" height="19"  class="layer_img">
              新規ユーザー登録
            </a>
          </div>
        </div>
      @endauth
  </div>
</div>
@yield('content')

</body>
</html>