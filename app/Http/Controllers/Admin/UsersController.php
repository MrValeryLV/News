<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::query()->where('id', '!=', Auth::id())->get();

        return view('admin.users',
            [
                'users' => $users,
            ]);
    }

    public function toggleAdmin(User $user) {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.updateUser')->with('success', 'Права изменены');
        }
        return redirect()->route('admin.updateUser')->with('success', 'Нельзя снять админа с себя.');

    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.updateUser')->with('success', 'Пользователь успешно удалена');
    }

}
