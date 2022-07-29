@extends('teacher.layouts.default')
@section('contents')  
  
  <div class="register">
    <h3>園児の登録</h3>
    <form action="{{ route('user.register') }}" method="POST">
    @csrf
      <div>
        <label>名前：</label><input type="text" name="name">
      </div>
      <div>
        <label>クラス：</label>
        <select name="team_id">
          @foreach($team_lists as $team_list)
            <option value="{{ $team_list['id'] }}">{{ $team_list['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label>性別：</label>
        <select name="gender_id">
          @foreach($gender_lists as $gender_list)
            <option value="{{ $gender_list['id'] }}">{{ $gender_list['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label>誕生日：</label><input type="date" name="birthday">
      </div>
      <div>
        <label>メールアドレス：</label><input type="email" name="email">
      </div>
      <div>
        <label>パスワード：</label><input type="text" name="password">
      </div>
      <div>
        <button>追加</button>
      </div>
    </form>
  </div>

@endsection