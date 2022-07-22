@extends('user.layouts.default')
@section('contents')

  <div>
    <h2 class="">購入フォーム</h2>
    <div>
      <label> 種類：</label>
      <p>{{ $stock['cloth']['name'] }}</p>
    </div>
    <div>
      <label>サイズ：</label>
      <p>{{ $stock['size']['name'] }}</p>
    </div>
    <div>
      <label>価格：</label>
      <p>{{ $stock['price'] }}</p>
    </div>
  </div>
  <div>
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

@endsection