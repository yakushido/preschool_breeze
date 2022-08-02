@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label>名前：</label>
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
                <label>メールアドレス：</label>
                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div>
                <label>パスワード：</label>
                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label>パスワード確認：</label>
                <x-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="register_btn">
                <a href="{{ route('user.login') }}">Already registered</a>
                <button>Register</button>
            </div>
        </form>
</div>

@endsection
