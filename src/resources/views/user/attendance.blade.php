@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/attendance.css') }}">

<div class="flex">
  <div class="attendance">
    <h3>欠席等の連絡</h3>
    <form action="{{ route('user.attendance.add') }}" method="POST">
    @csrf
      <div>
        <label>日付：</label>
        <input type="date" name="date">
      </div>
      <div>
        <label>内容：</label>
        <select name="attendance">
          @foreach( $attendances as $attendance )
          <option value="{{ $attendance['id'] }}">{{ $attendance['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label>理由：</label>
        <select name="reason">
          @foreach( $reasons as $reason )
          <option value="{{ $reason['id'] }}">{{ $reason['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <button>連絡する</button>
      </div>
    </form>
  </div>
  
  @if(DB::table('user_attendances')->where('user_id', Auth::id())->exists())
  <div class="attendance_log">
    <h3>連絡履歴</h3>
    <table>
      <tr>
        <th>日付</th>
        <th>内容</th>
        <th>理由</th>
      </tr>
      @foreach($user_attendances as $user_attendance)
      <tr>
        <td>{{ substr($user_attendance['created_at'], 0, 10) }}</td>
        <td>{{ $user_attendance['attendance']['name'] }}</td>
        <td>{{ $user_attendance['reason']['name'] }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  @endif
</div>
@endsection