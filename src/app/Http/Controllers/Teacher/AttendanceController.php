<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AttendanceRequest;
use App\Models\UserAttendance;
use App\Models\Attendance;
use App\Models\Reason;

class AttendanceController extends Controller
{
    public function add(AttendanceRequest $request)
    {
            if($request->has('attend')){
            UserAttendance::create([
                'user_id' => $request->id,
                'attendance_id' => 1,
                'date' => $request->date,
                'reason_id' => null
            ]);
            } elseif ($request->has('absence')) {
                UserAttendance::create([
                    'user_id' => $request->id,
                    'attendance_id' => 2,
                    'date' => $request->date,
                    'reason_id' => $request->reason
                ]);
            }
            return redirect()->route('teacher.dashboard');
    }

    public function delete($id)
    {
        UserAttendance::find($id)->delete();

        return redirect()->route('teacher.dashboard');
    }

    public function update_show($id)
    {
        $user_attendance = UserAttendance::find($id);
        $attendances = Attendance::all();
        $reasons = Reason::all();

        return view('teacher.update',compact('user_attendance','attendances','reasons'));
    }

    public function update(Request $request, $id)
    {
        $update_attendance = UserAttendance::find($id);

        $update_attendance['attendance_id'] = $request['attendance_id'];
        $update_attendance['reason_id'] = $request['reason_id'];

        if($request['attendance_id'] === 1){
            $update_attendance['reason_id'] = null;
        }

        $update_attendance->save();

        return redirect()->route('teacher.dashboard');
    }

    public function user_show()
    {
        $attendances = Attendance::all();
        $reasons = Reason::all();
        $user_attendances = UserAttendance::where('user_id', Auth::id())->get();

        return view('attendance', compact('attendances','reasons', 'user_attendances'));
    }

    public function user_add(Request $request)
    {
        UserAttendance::create([
            'user_id' => Auth::id(),
            'attendance_id' => $request->attendance,
            'reason_id' => $request->reason,
            'date' => $request->date
        ]);

        return redirect()->route('user.attendance.done');
    }

    public function user_done()
    {
        return view('attendance_done');
    }
}
