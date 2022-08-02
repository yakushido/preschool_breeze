@extends('admin.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/admin/detail_update_done.css') }}">
  <div class="done">
    <h3>変更完了しました。</h3>
    <a href="/admin/dashboard">戻る</a>
  </div>
@endsection