<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::orderBy('created_at','desc')-> paginate(4);
        return view('user.welcome', compact('blogs'));
    }
}
