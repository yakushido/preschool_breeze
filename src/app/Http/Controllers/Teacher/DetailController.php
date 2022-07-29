<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Gender;
use App\Models\Team;

class DetailController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        
        return view('teacher.detail', compact('user'));
    }

    public function update_show($id)
    {
        $update_user = User::find($id);
        $genders = Gender::all();
        $teams = Team::all();

        return view('teacher.detail_update',compact('update_user','genders','teams'));
    }

    public function update(Request $request, $id)
    {
        $update_user = User::find($id);
        
        $update_user['name'] = $request->input('name');
        $update_user['gender_id'] = $request->input('gender_id');
        $update_user['email'] = $request->input('email');
        $update_user['birthday'] = $request->input('birthday'); 
        $update_user['team_id'] = $request->input('team_id');
        
        $update_user->save();
        return redirect()->route('teacher.detail.index',$update_user['id']);
    }

    public function delete($id)
    {
        $delete_user = User::find($id);

        $delete_user->delete();

        return redirect()->route('teacher.dashboard');
    }
}
