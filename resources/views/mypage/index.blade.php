@extends('layouts.app')

@section('content')

<div class="blogs_backgraund">
<div class="blog_top">
  <div class="my_blog_menu"><h1 class="top_title_group">マイブログ</h1>
      <a class="newblogs" href="/mypage/blogs/create">
        <img src="/storage/fonts/RfVNdODURCLJZIA1646098545_1646098610.png" alt="" height="26" >
        ブログを書く
      </a>
  </div>
</div>
<hr>

<tabel>
  <div class="blogs_list">
    <div class="blog_mini">ブログ一覧</div>
  </div>

  @foreach($blogs as $blog)
  <div class="my_card_flame">
    <div class="blogs_delete">
      <div class="create_titles">
        <a href="{{ route('mypage.blog.edit', $blog) }}">{{ $blog->title }}</a>
        <div class="date">
          <small>{{ $blog->updated_at }}</small>
        </div>
      </div>
      <td>
      <div class="delete">
        <form method="post" action="{{ route('mypage.blog.delete', $blog) }}">
          @csrf @method('delete') 
            <input type="submit" value="削除">
        </form>
      </div>
      </td>
    </div>
  </div>
  @endforeach
</table>

</div>
@endsection