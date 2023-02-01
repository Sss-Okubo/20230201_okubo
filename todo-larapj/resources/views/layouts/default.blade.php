<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <style>
    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .header{
      display:flex;
      justify-content:space-between;
    }

    .title-txt{
      font-weight: bold;
      font-size: 24px;
      margin-top: 0px;
      height: 10px;
    }
    
    .header-login-info{
      margin-top: 0px;
      margin-left: auto;
    }
    .header-logout{
      margin-top: 5px;
    }

    table {
      text-align: center;
      width: 100%
    }

    tr {
      height: 50px;
    }

    input,
    select {
      vertical-align: middle;
    }

    .input-edit {
      width: 90%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none; 
    }

    .edit-tag select{
      font-size:0.8em;
      border: 1px solid;
      border-color:lightgray;
      border-radius: 4px;
      outline: none;
      width: 100%;
      height: 1.8rem;
   }
    
   .button-add:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

    .button-edit {
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .button-edit:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .button-delete {
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .button-delete:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }

   .button-logout{
      text-align: left;
      border: 2px solid #fc0101;
      font-size: 12px;
      color: #fc0101;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
      margin-left: 15px;
    }

    .button-logout:hover {
      background-color: #fc0101;
      border-color: #fc0101;
      color: #fff;
    }
 
  </style>
</head>
<body>
  <div class="container">
  <div class="card">
    <div class="header">
      <div class="header-title">
        <p class="title-txt">@yield('title')</p>
      </div>
      <!-- ログイン情報 -->
      @if (Auth::check())
      <div class="header-login-info">
        <p>{{'「'.$user->name . '」でログイン中'}}<p>
      </div>
      <div class="header-logout">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="button-logout">ログアウト</button>
        </form>
      </div>
        @endif
    </div>
    
    <!-- コンテンツ -->
    @yield('content')

  </div>
</div>
</body>
</html>
