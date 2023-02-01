@extends('layouts.default')

<style>
  .search{
    display:flex;
    justify-content:space-between;

  }

  .input-search {
      width: 80%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;   
    }

  .search-tag select{
    font: size 10px;
    border: 1px solid;
    border-color:lightgray;
    border-radius: 4px;
    outline: none;
    width: 4em;
    height: 3em;
  }

   .button-search{
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
  }

  .button-search:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

  .button-back{
    text-align: left;
    border: 2px solid #747174;
    font-size: 12px;
    color: #747174;
    background-color: #fff;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    outline: none;
  }

  .button-back:hover {
      background-color: #747174;
      border-color: #747174;
      color: #fff;
  }
</style>

@section('title', 'タスク検索')
@section('content')
  <!-- Todo検索-->
  <form action="/search" method="GET">
    @csrf
    <div class="search">
      
        <input class = "input-search" type="text"  name="name" >
      
      <div class="search-tag">  
        <select  name="tag_id"  >
          <option value="" selected ></option>
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="search-button">
        <button class="button-search" type="submit">検索</button>
      </div>
    </div>
  </form>
<!-- End Todo検索処理-->
<!-- Todo一覧-->

  <table class="todolist">
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>タグ</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @if($todos != null && count ($todos) > 0 )
    @foreach ($todos as $todo)
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
          <select  name="tag_id"  >
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
    @endif
  </table>
 <!-- End Todo一覧-->
 <!--戻る -->
<form action="{{ url('/') }}" method="GET">
          @csrf
        <button class="button-back">戻る</button>
</form>
@endsection