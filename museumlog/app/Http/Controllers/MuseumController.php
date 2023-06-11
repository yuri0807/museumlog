<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\Museum;

class MuseumController extends Controller
{
    public function index(Request $request)
    {
        $posts = Museum::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('museum.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $museum = Museum::find($request->id);
        if (empty($museum)) {
            abort(404);
        }
        return view('admin.museum.edit', ['museum_form' => $museum]);
    }

    public function update(Request $request)
        {
        // Validationをかける
        $this->validate($request, Museum::$rules);
        // News Modelからデータを取得する
        $museum = Museum::find($request->id);
        // 送信されてきたフォームデータを格納する
        $museum_form = $request->all();
        
        if ($request->remove == 'true') {
            $museum_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $museum_form['image_path'] = basename($path);
        } else {
            $museum_form['image_path'] = $museum->image_path;
        }

        unset($museum_form['image']);
        unset($museum_form['remove']);
        unset($museum_form['_token']);

        // 該当するデータを上書きして保存する
        $museum->fill($museum_form)->save();
        
        return redirect('admin,museum');
        }
}