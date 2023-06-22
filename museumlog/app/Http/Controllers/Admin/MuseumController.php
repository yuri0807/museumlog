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
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Museum::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Museum::all();
        }
        return view('admin.museum.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    public function edit(Request $request)
    {
        // Museum Modelからデータを取得する
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
        
        return redirect('admin/museum');
 }
 
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $museum = Museum::find($request->id);

        // 削除する
        $museum->delete();
        
        return redirect('admin/museum/');
   
    }
    public function show(Request $request){
        
        $museum = Museum::find($request->id);
        //dd($museum);
        return view('admin.museum.show', ["museum" => $museum]);
    }
}