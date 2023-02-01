<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;//

class TodoController extends Controller
{
  public function index()
  {
    $user = Auth::user();                       // user情報取得
    $tags = Tag::all();                         // tagsテーブルから全件取得
    $param = ['user' =>$user,'tags' => $tags];  // $param連想配列を代入
    return view('index', $param);               // index.blade.phpを呼び出す
  }
    
  public function create(TodoRequest $request)
  {
    $form = $request->all();  // 画面リクエストを$formに格納
    Todo::create($form);      // createメソッドで登録
    return redirect('/');     // ホームにリダイレクト
  }

  public function edit(TodoRequest $request)
  {
    $form = $request->all();  // 画面リクエストを$formに格納
    unset($form['_token']);   // 不要なトークンを削除
    Todo::where('id', $request->id)->update($form);//Updateメソッドで更新
    return redirect('/');     // ホームにリダイレクト
  }

  public function delete(Request $request)
  {
    Todo::find($request->id)->delete(); // deleteメソッドで削除
    return redirect('/');               // ホームにリダイレクト
  }

  public function find()
  {
    $user = Auth::user();           // user情報取得
    $todos = null;                  // todosテーブルから全件取得
    $tags = Tag::all();             // tagsテーブルから全件取得
    $param = ['user' =>$user,'todos' => $todos,'tags' => $tags]; // $param連想配列を代入
    return view('search', $param);  // search.blade.phpを呼び出す
  }

  public function search(Request $request)
  {
    $user = Auth::user();         // user情報取得
    $tags = Tag::all();           //tagsテーブルから全件取得

    // Todo検索クエリ生成
    $query = Todo::where('name','LIKE BINARY',"%{$request->name}%") // タスク名が部分一致
            ->where('user_id','=',"{$user->id}");                   // ユーザIDが一致
    if($request->tag_id != null){                                   // タグが選択されている場合
      $query->where('tag_id','=',"{$request->tag_id}");             // タグIDが一致
    };

    // Todo検索
    $todos =  $query->get();

    $param = ['user' =>$user,'todos' => $todos,'tags' => $tags];    // $param連想配列を代入
    return view('search', $param); // search.blade.phpを呼び出す  
  }
}
