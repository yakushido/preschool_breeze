@extends('user.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/user/blog.css') }}">

  <div class="blog">
    <h2 class='blog_title'>{{ $blog['title'] }}</h2>
    <div class="blog_img">
      <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
    </div>
    <p class='blog_content'>{{ $blog['content'] }}</p>
  </div>

@endsection