@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/attendance_done.css') }}">

<div class="attendance_done">
  <h3>連絡が完了しました。</h3>
  <a href="/dashboard">戻る</a>
</div>

@endsection