<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('user.blog', compact('blog'));
    }
}
