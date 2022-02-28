@extends('layouts.app')

@section('content')

<h1>マイブログ一覧</h1>

<a href="/mypage/blogs/create">ブログ新規作成</a>
<hr>

<tabel>
  <tr>
    <th class="blog_mini">ブログ一覧</th>
  </tr>

  @foreach($blogs as $blog)
  <div class="card_flame">
    <td>
      <a href="{{ route('mypage.blog.edit', $blog) }}">{{ $blog->title }}</a>
    </td>
    <td>
      <form method="post" action="{{ route('mypage.blog.delete', $blog) }}">
        @csrf @method('delete') <input type="submit" value="削除">
      </form>
    </td>
  </div>
  @endforeach
</table>

@endsection