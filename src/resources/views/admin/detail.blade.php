@extends('admin.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/admin/detail.css') }}">

  <div class="detail">

    <form action="{{ route('admin.detail.update', $teacher_detail['id']) }}" method="POST">
    @csrf

      <div>
        <h3>教員詳細フォーム</h3>
        <label>名前：</label>
        <input type="text" name="name" value="{{ $teacher_detail['name'] }}">
      </div>

      <div>
        <label>担当クラス：</label>
        <select name="team_id">
          @foreach($team_lists as $team_list)
            <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label>メールアドレス：</label>
        <input type="email" name="email" value="{{ $teacher_detail['email'] }}">
      </div>

      <div class="update_btn">
        <button>変更</button>
      </div>

    </form>

  </div>
@endsection