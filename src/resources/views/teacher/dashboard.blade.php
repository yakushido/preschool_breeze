@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/teacher/dashboard.css') }}">

<div>
  <h3>担当クラス：{{ $teacher['team']['name'] }}組</h3>
  <h3>担当者：{{ $teacher['name'] }}</h3>
</div>

<div class="flex">

  <div class="user_list">
    <h3>{{ $teacher['team']['name'] }}組園児リスト</h3>
    <ul>
      @foreach($team_users as $team_user)
      <li><a href="/teacher/detail/{{ $team_user['id'] }}">{{ $team_user['name']}}</a></li>
      <li>
        <form action="{{ route('teacher.attendance.add') }}" method="POST">
        @csrf
          <input type="text" name="id" value="{{ $team_user['id'] }}" hidden>
          <div>
            <label>日付：</label>
            <input type="date" name="date">
            <input class="attend_btn" type="submit" name="attend" value="出席">
          </div>
          <div>
            <label>理由：</label>
            <select name="reason">
              @foreach( $reasons as $reason )
              <option value="{{ $reason['id'] }}">{{ $reason['name'] }}</option>
              @endforeach
            </select>
            <input class="absence_btn" type="submit" name="absence" value="欠席">
          </div>
        </form>
      </li>
      @endforeach
    </ul>
  </div>

  <div class="total_attendance">
    <h3>出席簿</h3>
    <div>
      <form action="{{ route('teacher.search') }}" method="POST">
      @csrf
        <input type="date" name="from" placeholder="from_date">
        <span>～<span>
        <input type="date" name="until" placeholder="until_date">
        <div class="search_btn">
          <button>検索</button>
        </div>
      </form>
    </div>
    @foreach( $team_users as $team_user )
    <table>
      <tr>
        <th>{{ $team_user['name'] }}</th>
      </tr>
      @foreach( $attendances as $attendance )
      <tr>
        @if( $team_user['name'] == $attendance['user']['name'] )
        <td>{{ substr($attendance['date'], 5,5) }}</td>
        <td>{{ $attendance['attendance']['name'] }}</td>
        <td>
          <a href="/teacher/attendance/update/{{ $attendance['id'] }}">
            <button class="update_btn">変更</button>
          </a>
        </td>
        <td>
          <form action="{{ route('teacher.attendance.delete', ['id' => $attendance['id']]) }}" method="POST">
          @csrf
            <button class="delete_btn">削除</button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </table>
    @endforeach
  </div>

</div>

  <div class="mail">
    <a href="/teacher/mail">メールの送信はこちらから</a>
  </div>


@endsection