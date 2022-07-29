@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/teacher/update.css') }}">
<div class="update">
  <h3>変更フォーム</h3>
  <form action="{{ route('teacher.attendance.update',['id' => $user_attendance['id']]) }}" method="POST">
  @csrf
    <div>
      <label>日付：</label>
      <p>{{ $user_attendance['date'] }}</p>
    </div>
    <div>
      <label>内容：</label>
      <select name="attendance_id">
        @foreach($attendances as $attendance)
        <option value="{{ $attendance['id'] }}">{{ $attendance['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label>理由：</label>
      <select name="reason_id">
        @foreach($reasons as $reason)
        <option value="">{{ $reason['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="update_btn">
      <button>変更</button>
    </div>
  </form>
</div>
@endsection