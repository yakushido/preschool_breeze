@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/welcome.css') }}">

    <img class="square" src="/storage/preschool.jpg" alt="保育園image">
    
    <div class="blog">
        <h3>毎日ブログ</h3>
        <div>
            <p>このブログでは､その日の給食画像や出来事を毎日アップしています</p>
            <div class="blog_card">
                @foreach($blogs as $blog)
                <a class="blog_card_item" href="/blog/{{ $blog->id }}">
                    <h4>{{ $blog['title'] }}</h4>
                    <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
                </a>
                @endforeach
            </div>
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class='attendance'>
        <a href="/attendance">こちらからお休みの連絡ができます。</a>
    </div>
    <div>
        <a href="/shop">こちらから制服の購入ができます。</a>
    </div>

    <div>
        {!! QrCode::generate('/') !!}
    </div>

    <script>
        document.querySelector(".square").animate(
        {
            borderRadius: [
            "50% 50% 50% 70%/50% 50% 70% 60%",
            "80% 30% 50% 50%/50%",
            "40% 40% 50% 40%/30% 50% 40% 80%"
            ]
        },
        {
            iterations: Infinity,
            direction: "alternate",
            duration: 7000
        }
        );
    </script>
@endsection