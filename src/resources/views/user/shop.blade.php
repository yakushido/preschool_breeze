@extends('user.layouts.default')
@section('contents')

<div>
  @livewire('shop-search')
<div>

@if(DB::table('purchases')->where('user_id', Auth::id())->exists())
  <div>
    <h2>購入履歴</h2>
    <table>
      <tr>
        <th>種類</th>
        <th>サイズ</th>
        <th>価格</th>
        <th>購入日</th>
      </tr>
      @foreach($purchases as $purchase)
      <tr>
        <td>{{ $purchase['stock']['cloth']['name'] }}</td>
        <td>{{ $purchase['stock']['size']['name'] }}</td>
        <td>{{ $purchase['stock']['price'] }}</td>
        <td>{{ substr($purchase['created_at'], 0, 10) }}</td>
      </tr>
      @endforeach
    </table>
  </div>
@endif

@endsection