@extends('user.layouts.default')
@section('contents')
<body>
    <p>決済が完了しました！</p>
    <a href="{{ route('user.dashboard') }}">戻る</a>
</body>
@endsection