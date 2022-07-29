<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="menu__humbergar" id="menu__humbergar">
            <span class="menu__humbergar__bar--top"></span>
            <span class="menu__humbergar__bar--middle"></span>
            <span class="menu__humbergar__bar--bottom"></span>
        </div>
        <h1>ABC保育園</h1>
        <div class="header_login">
            @if( Auth::check() )
            <h2>{{ Auth::user()['name'] }} 様</h2>
            <form action="{{ route('teacher.logout') }}" method="POST">
                @csrf
                <button>logout</button>
            </form>
            @endif
        </div>

        <div class="mask" id="mask">
            <ul class="mask-menu__lists">
                <li><a href="/">Home</a></li>
                @if( Auth::check() )
                <li><a href="{{ route('teacher.dashboard') }}">Mypage</a></li>
                @endif
            </ul>
        </div>

    </header>

    <main>
        @yield('contents')
    </main>

    <script>
        const menu = document.getElementById("menu__humbergar");
        const mask = document.getElementById("mask");
        menu.addEventListener('click',() => {
            menu.classList.toggle('active');
            mask.classList.toggle('active');
        });
    </script>

</body>
</html>