<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function changePasswordForm()
    {
        return view(
            'profile.change-password'
        );
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->password = $request->password;

        $user->password_changed = true;

        $user->save();

        return redirect('/dashboard')
            ->with(
                'success',
                'Password berhasil diganti.'
            );
    }

    public function profile()
    {
        $user = Auth::user();

        return view(
            'profile.index',
            compact('user')
        );
    }
}