@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/cart.css') }}">

<div class="cart">

  <div>
    <h3 class="">購入フォーム</h2>
    <table>
      <tr>
        <th>種類</th>
        <th>サイズ</th>
        <th>価格</th>
      </tr>
      <tr>
        <td>{{ $stock['cloth']['name'] }}</td>
        <td>{{ $stock['size']['name'] }}</td>
        <td>{{ $stock['price'] }}</td>
      </tr>
    </table>
  </div>

  <div class="stripe">
    <form action="{{ asset('payment') }}" method="POST" class="text-center mt-5">
      @csrf
      <input type="hidden" name="amount" value="{{ $stock['price'] }}">
      <input type="hidden" name="stock_id" value="{{ $stock['id'] }}">
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="{{ $stock['price'] }}"
        data-name="Stripe Demo"
        data-label="決済をする"
        data-description="Online course about integrating Stripe"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="JPY">
      </script>
    </form>
  </div>

</div>

@endsection