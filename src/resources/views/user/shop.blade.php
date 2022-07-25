@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/shop.css') }}">

<div class="flex">

  <div class="shop">
    @livewire('shop-search')
  </div>

  @if(DB::table('purchases')->where('user_id', Auth::id())->exists())
    <div class="shop_log">
      <h3>購入履歴</h2>
      <table>
        <tr>
          <th>購入日</th>
          <th>種類</th>
          <th>サイズ</th>
          <th>価格</th>
        </tr>
        @foreach($purchases as $purchase)
        <tr>
          <td>{{ substr($purchase['created_at'], 0, 10) }}</td>
          <td>{{ $purchase['stock']['cloth']['name'] }}</td>
          <td>{{ $purchase['stock']['size']['name'] }}</td>
          <td>{{ $purchase['stock']['price'] }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  @endif

</div>
@endsection