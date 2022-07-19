@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <div class="blog">
        <div>
            <img src="/storage/preschool.jpg" alt="保育園image">
        </div>
        <div>
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
    </div>

    <div class='attendance'>
        <a href="/attendance">こちらからお休みの連絡ができます</a>
    </div>
@endsection