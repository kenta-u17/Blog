@extends('layouts.app')

@section('content')
    <div class="blog_top">
        <div class="my_blog_menu">
            <h1 class="top_title_group">マイブログ</h1>
            <a class="newblogs" href="/mypage/blogs/create">
                <img src="/storage/fonts/RfVNdODURCLJZIA1646098545_1646098610.png" alt="" class="create_blog_img">
                ブログを書く
            </a>
        </div>
    </div>
    <hr>

    <div class="blogs_list">
        <h4 class="blog_mini">ブログ一覧</h4>
    </div>

    <tabel>
        <div class="index_blog_body">
            @foreach ($blogs as $blog)
                <div class="my_card_flame">
                    <div class="blogs_delete">
                        <div class="create_titles">
                            <a href="{{ route('mypage.blog.edit', $blog) }}" id="blog_edit">
                                <img src="/storage/fonts/pens.svg" alt="" height="20" id="src_font">
                                {{ $blog->title }}
                            </a>
                            <div class="date">
                                <small>{{ $blog->updated_at }}</small>
                            </div>
                        </div>
                        <td>
                            <div class="delete">
                                <form method="post" action="{{ route('mypage.blog.delete', $blog) }}">
                                    @csrf @method('delete')
                                    <div class="delete_button">
                                        <input type="submit" value="削除" id="delete_input">
                                    </div>
                                </form>
                            </div>
                        </td>
                    </div>
                </div>
            @endforeach
        </div>
        </table>
    @endsection
