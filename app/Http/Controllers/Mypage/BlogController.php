<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Http\Requests\BlogSaveRequest;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        //自分のブログ一覧のみ表示
        $blogs = $request->user()->blogs;

        return view('mypage.index', compact('blogs'));
    }

    /**
     * ブログ新規登録画面
     */
    public function create()
    {
        return view('mypage.blog.create');
    }

     /**
     * ブログの新規登録処理
     */
    public function store(BlogSaveRequest $request)
    {
        /*二重送信対策*/
        $request->session()->regenerateToken();

        $data = $request->validated();

        if ($request->hasFile('pict')) {
            $data['pict'] = $request->file('pict')->store('blogs', 'public');
        }

        $blog = $request->user()->blogs()->create($data);

        return redirect(route('mypage.blog.edit', $blog))->with('message', '記事が投稿されました！');

    }

    /**
     * ブログの編集画面
     */
    public function edit(Blog $blog, Request $request)
    {
        //自分のブログに限定
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }

        $data = old() ?: $blog;

        return view('mypage.blog.edit', compact('blog','data'));
    }

    /**
     * ブログの変更処理
     */
    public function update(Blog $blog, BlogSaveRequest $request)
    {
        /*二重送信対策*/
        $request->session()->regenerateToken();

        abort_if($request->user()->isNot($blog->user), 403);

        $data = $request->proceed();

        if ($request->hasFile('pict')) {
            //古い画像の削除
            $blog->deletePictFile();

            $data['pict'] = $request->file('pict')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect(route('mypage.blog.update', $blog))->with('message', 'ブログを更新しました');
    }

    /**
     * ブログの削除
     */
    public function destroy(Blog $blog, Request $request)
    {
        abort_if($request->user()->isNot($blog->user),403);

        //付属するコメントは、イベントを使って削除します。
        //Models/Blog 参照。

        $blog->delete();

        return redirect('mypage');
    }

     /**
     * Googleドライブへの認証を行う
     * @return Google_Service_Drive
     */
    public function getDriveClient(): \Google_Service_Drive
    {
        $client = new \Google_Client();

        // サービスアカウント作成時にダウンロードしたJSONファイルの名前を「client_secret」変更し、configフォルダ内に設置
        $client->setAuthConfig(config_path('client_secret.json'));
        $client->setScopes(['https://www.googleapis.com/auth/drive']);

        return new \Google_Service_Drive($client);
    }

    /**
     * ファイルをアップロードする
     *
     * @return GoogleDrive
     */
    public function fileUpload()
    {
        $driveClient = $this->getDriveClient();

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => 'sample.jpg', // Googleドライブへアップロードされた際のファイル名（今回は「sample.jpg」とする）
            'parents' => ['xxxxxxxxxxxxxxxxxx'], // 保存先のフォルダID（配列で渡さなければならないので注意）
        ]);

        $driveClient->files->create($fileMetadata, [
            'data' => file_get_contents(storage_path('app/public/sample.jpg')), // アップロード対象となるファイルのパス（今回はstorage/app/public配下の「sample.jpg」を指定）
            'mimeType' => ' image/jpeg',
            'uploadType' => 'media',
            'fields' => 'id',
        ]);
    }
}
