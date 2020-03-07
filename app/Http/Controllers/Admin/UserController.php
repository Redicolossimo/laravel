<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->paginate(6);

        return view('admin.users', ['users' => $users]);

    }

    public function delete(User $user)
    {

        $user->delete();
        return redirect()
            ->route('admin.users')
            ->with('success', 'User successfully deleted!');
    }

    public function update(Request $request,User $user)
    {
        $user->is_admin = 1;
        $user->save();
        return redirect()
            ->route('admin.users')
            ->with('success', 'User mode successfully changed to admin!');
    }
}
