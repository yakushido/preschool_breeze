@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/dashboard.css') }}">

<div class="dashboard">
  <div>
    <a href="/attendance">欠席等の連絡はこちらから</a>
  </div>
  <div>
    <a href="/shop">制服の購入はこちらから</a>
  </div>
</div>

@endsection