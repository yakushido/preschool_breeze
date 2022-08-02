<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AttendanceRequest;
use App\Models\UserAttendance;
use App\Models\Attendance;
use App\Models\Reason;

class AttendanceController extends Controller
{

    public function show()
    {
        $attendances = Attendance::all();
        $reasons = Reason::all();
        $user_attendances = UserAttendance::where('user_id', Auth::id())->orderBy('date', 'desc')->get();

        return view('user.attendance', compact('attendances','reasons', 'user_attendances'));
    }

    public function add(AttendanceRequest $request)
    {
        UserAttendance::create([
            'user_id' => $request->id,
            'attendance_id' => $request->attendance,
            'reason_id' => $request->reason,
            'date' => $request->date
        ]);

        return redirect()->route('user.attendance.done');
    }

    public function done()
    {
        return view('user.attendance_done');
    }

}
