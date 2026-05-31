<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
    $users = \App\Models\User::all();
    return view('users', compact('users'));
    }

    public function destroy(User $user) {
        if (auth()->id() === $user->id) {
            return back()->withErrors(['msg' => 'Tidak bisa menghapus akun sendiri.']);
        }
        $user->delete();
        return back()->with('success', 'User dihapus.');
    }

}
