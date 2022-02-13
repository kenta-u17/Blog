<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブログ</title>
  <link type="text/css" rel="stylesheet" href="/css/style.css">
</head>
<body>

<div class= "body">
  <nav>
      <li><a href="/">TOP（ブログ一覧）</a></li>
      @auth
        <li>
          <li><a href="/mypage">マイブログ一覧</a></li>
          <li>ようこそ{{ auth()->user()->name }}さん！！</li>
          <li>
            <form method="post" action="/mypage/logout">
              @csrf
              <input type="submit" value="ログアウト" >
            </form>
          </li> 
      @else
        <li><a href="{{ route(('login')) }}">ログイン</a></li>
      @endauth
  </nav>
</div>
@yield('content')

</body>
</html>