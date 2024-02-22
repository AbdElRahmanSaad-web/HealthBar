<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('Dashboard.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user)
        {
            return view('Dashboard.user.show',compact('user'));
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user)
        {
            $user->delete();
        }
        return redirect()->route('admin.users.index')->with('success', 'user deleted Successfully');
    }
}
