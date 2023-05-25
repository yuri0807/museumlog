<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Museum;

class MuseumController extends Controller
{
    //
public function add()
    {
        return view('admin.museum.create');
    }
    // 以下を追記
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Museum::$rules);

        $museum = new Museum;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$museum->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $museum->image_path = basename($path);
        } else {
            $museum->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $museum->fill($form);
        $museum->save();
        
        // admin/museum/createにリダイレクトする
        return redirect('admin/museum/create');
    }
}
