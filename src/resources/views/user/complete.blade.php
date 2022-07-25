@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/complete.css') }}">

<div class="complete">
    <h3>決済が完了しました！</h3>
    <a href="{{ route('user.dashboard') }}">戻る</a>
</div>
@endsection