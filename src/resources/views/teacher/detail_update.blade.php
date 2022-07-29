@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/teacher/detail_update.css') }}">

<div class="detail_update">
  <h3>更新フォーム</h3>
  <form action="{{ route('teacher.detail.update',$update_user['id']) }}" method="POST">
  @csrf
    <div>
      <label>名前：</label>
      <input type="text" name="name" value="{{ $update_user{'name'} }}">
    </div>
    <div>
      <label>性別：</label>
      <select name="gender_id">
        @foreach($genders as $gender)
        <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label>メールアドレス：</label>
      <input type="email" name="email" value="{{ $update_user['email'] }}">
    </div>
    <div>
      <label>誕生日：</label>
      <input type="date" name="birthday" value="{{ $update_user['birthday'] }}">
    </div>
    <div>
      <label>クラス：</label>
      <select name="team_id">
        @foreach($teams as $team)
        <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="update_btn">
      <button>更新</button>
    </div>
  </form>
</div>
@endsection