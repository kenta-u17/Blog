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
  <div>
    <td>
      <a href="{{ route('mypage.blog.edit', $blog) }}">{{ $blog->title }}</a>
    </td>
  </div>
  @endforeach
</table>

@endsection