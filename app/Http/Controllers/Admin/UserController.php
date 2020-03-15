<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->paginate(6);
        return view('admin.users', ['users' => $users]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users')
            ->with('success', 'User successfully deleted!');
    }

    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()
            ->route('admin.users')
            ->with('success', 'User mode successfully changed to/from admin!');
    }

}
