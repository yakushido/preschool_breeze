<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\Team;
use App\Models\Gender;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teachers');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::where('id', Auth::id())->first();
        $team_users = User::where('team_id', $teacher['team_id'])->get();
        $attendances = UserAttendance::all()->sortByDesc("date");
        $team_lists = Team::all();
        $gender_lists = Gender::all();

        return view('teacher.dashboard', compact('teacher', 'team_users', 'attendances', 'team_lists', 'gender_lists'));
    }

    public function detail($id)
    {
        $user = User::find($id);

        return view('teacher.detail', compact('user'));
    }
}