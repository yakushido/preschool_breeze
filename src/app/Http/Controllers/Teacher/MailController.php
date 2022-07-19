<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mail\ToUserMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('teacher.email.index');
    }

    public function confirm(Request $request)
    {
        $result = [];

        if ($request->has(['name', 'email', 'body'])) {
            $result['name'] = $request->name;
            $result['email'] = $request->email;
            $result['body'] = $request->body;
        } else {
            return redirect('/teacher/dashboard', $result);
        }

        return view('teacher.email.confirm', $result);
    }

    public function send(Request $request)
    {

        if ($request->has(['name', 'email', 'body'])) {
            $name = $request->name;
            $email = $request->email;
            $body = $request->body;
        }

        Mail::to($email)->send(new ToUserMail($name, $body));

        return view('teacher.email.done');
    }
}
