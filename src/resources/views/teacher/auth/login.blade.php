@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="login">

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>

        <form method="POST" action="{{ route('teacher.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label>メールアドレス：</label>
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <label>パスワード：</label>
                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="login_btn">
                @if (Route::has('teacher.password.request'))
                    <a href="{{ route('teacher.password.request') }}">Forgot your password</a>
                @endif
                <button>login</button>
            </div>

        </form>

    </div>

@endsection
