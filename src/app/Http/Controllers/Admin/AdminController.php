<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Teacher;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function add(Request $request)
    {
      $user = Teacher::create([
        'name' => $request->name,
        'team_id' => $request->team_id,
        'email' => $request->email,
        'password' => $request->password
      ]);

      event(new Registered($user));

      return redirect()->route('admin.dashboard');
    }

    public function delete(Request $request)
    {
      $teacher_delete = Teacher::find($request['id']);
      $teacher_delete -> delete();

      return redirect()->route('admin.dashboard');
    }

    public function update_show($id)
    {
      $teacher_detail = Teacher::find($id);
      $team_lists = Team::all();
      return view('admin.admin_teacher_update', compact('teacher_detail','team_lists'));
    }

    public function update(Request $request, $id)
    {
      $teacher_detail = Teacher::find($id);

      $teacher_detail['name'] = $request['name'];
      $teacher_detail['team_id'] = $request['team_id'];
      $teacher_detail['email'] = $request['email'];

      $teacher_detail -> save();

      return view('admin.admin_update_done');
    }
}
