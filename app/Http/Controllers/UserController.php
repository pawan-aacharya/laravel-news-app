<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function view()
    {
        $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
        $data = compact('users');
        return view('dashboard.admin.users.view')->with($data);
    }

    public function delete($id)
    {
        $users = User::where('id', $id)->first();
        $users->delete();
        return back();
    }

    public function trashed_user()
    {
        $users = User::OnlyTrashed();
        $data = compact('users');
        return view('dashboard.admin.users.trash')->with($data);
    }

    public function restore($id)
    {
        $users = User::where('id', $id)->restore();
        return back();
    }

    public function force_delete($id)
    {
        $users = User::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
