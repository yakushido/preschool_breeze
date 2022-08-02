<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Teacher;

class DetailController extends Controller
{
    public function index($id)
    {
        $teacher_detail = Teacher::find($id);
        $team_lists = Team::all();
        return view('admin.detail', compact('teacher_detail', 'team_lists'));
    }

    public function update(Request $request, $id)
    {
        $teacher_detail = Teacher::find($id);

        $teacher_detail['name'] = $request['name'];
        $teacher_detail['team_id'] = $request['team_id'];
        $teacher_detail['email'] = $request['email'];

        $teacher_detail->save();

        return view('admin.detail_update_done');
    }
}
