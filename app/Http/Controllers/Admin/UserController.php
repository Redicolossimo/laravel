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

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'id' => $id,
            'message' => 'User successfully deleted!',
        ]);
//        $user->delete();
//        return redirect()
//            ->route('admin.users')
//            ->with('success', 'User successfully deleted!');
    }

    public function update($id)
    {
        $user = User::query()->find($id);
        $user->is_admin = !$user->is_admin;
        $user->save();
        return response()->json([
            'id' => $id,
            'message' => 'User successfully updated!',
            'is_admin' => $user->is_admin,
        ]);
//        return redirect()
//            ->route('admin.users')
//            ->with('success', 'User mode successfully changed to/from admin!');
    }

}
