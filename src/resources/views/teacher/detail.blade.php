@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/teacher/detail.css') }}">

  <div class="detail">
    <h3>生徒詳細</h3>
    <div>
      <label>名前：</label>
      <p>{{ $user['name'] }}</p>
    </div>
    <div>
      <label>性別：</label>
      <p>{{ $user['gender']['name'] }}</p>
    </div>
    <div>
      <label>メールアドレス：</label>
      <p>{{ $user['email'] }}</p>
    </div>
    <div>
      <label>誕生日：</label>
      <p>{{ $user['birthday'] }}</p>
    </div>
    <div>
      <label>クラス</label>
      <p>{{ $user['team']['name'] }}</p>
    </div>
    <div class="flex">
      <a href="/teacher/detail/update/{{ $user['id'] }}"><button class="update_btn">更新</button></a>
      <form action="{{ route('teacher.detail.delete',$user['id']) }}" method="POST">
      @csrf
        <button class="delete_btn">削除</button>
      </form>
    </div>
  </div>

@endsection