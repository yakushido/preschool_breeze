@extends('user.layouts.default')
@section('contents')
<div>
  {!! QrCode::generate('www.google.com') !!}
</div>
@endsection