@extends('layouts.default')

<style>
   
  .add-tag select{
    font: size 10px;
    border: 1px solid;
    border-color:lightgray;
    border-radius: 4px;
    outline: none;
    width: 4em;
    height: 3em;
  }
  .button-add{
    text-align: left;
    border: 2px solid #dc70fa;
    font-size: 12px;
    color: #dc70fa;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
    height: 3.5em;
  }

  .button-add:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
  }

  .button-search{
    text-align: left;
    border: 2px solid #b5fa70;
    font-size: 12px;
    color: #b5fa70;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-search:hover {
      background-color: #b5fa70;
      border-color: #b5fa70;
      color: #fff;
  }

.add{
    display:flex;
    justify-content:space-between;
    /* margin-right: 2em; */
  }
  
  .input-add {
      width: 80%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;   
  }

</style>

@section('title', 'Todo List')
@section('content')
<!--タスク検索遷移ボタン -->
<form action="{{ url('/find') }}" method="GET">
          @csrf
        <button class ="button-search">タスク検索</button>
</form>
<!-- エラー処理-->
  @if (count($errors)>0)
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  @endif

  <!-- Todo追加処理-->
  <form action="/create" method="post">
    @csrf
    <div class="add">

        <input type="text" class="input-add" name="name" >
        <input type="hidden" name="user_id" value="{{$user->id}}">

      <div class="add-tag">  
        <select  name="tag_id"  >
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="add-button">
        <button class="button-add" type="submit">追加</button>
      </div>
    </div>
  </form>
  <!-- End Todo追加処理-->
  <!-- Todo一覧-->
  <table class="todolist">
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>タグ</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
      @foreach($user->todos as $todo)
        <tr>
          <!-- 更新日時-->
          <td>{{$todo->created_at}}</td>
          <!-- 更新-->
          <form action="/edit" method="post">
            @csrf
            <td>
              <input class="input-edit" type="text" name="name" value="{{$todo->name}}">
              <input type="hidden" name="id" value="{{$todo->id}}">
            </td>
            <!-- タグ -->
            <td class="edit-tag">
              <select name="tag_id">
                @foreach($tags as $tag)
                @if($tag->id == $todo -> tag_id)
                <option value="{{ $tag->id }}" selected>{{ $tag->tag_name }}</option>
                @else
                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                @endif
                @endforeach
              </select>
            </td>
            <td>
              <button class="button-edit" type="submit">更新</button>
            </td>
          </form>
          <!-- End 更新-->
          <!-- 削除-->
          <form action="/delete" method="post">
            @csrf
            <td>
              <input type="hidden" name="id" value="{{$todo->id}}">
              <button class="button-delete" type="submit">削除</button>
            </td>
          </form>
          <!-- End 削除-->
        </tr>
      @endforeach
  </table>
  <!-- End Todo一覧 -->
@endsection

