<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [

            'nomor_identitas' =>
                $request->nomor_identitas,

            'password' =>
                $request->password
        ];

        if (Auth::attempt($credentials)) {

            $request
                ->session()
                ->regenerate();

            $user = Auth::user();

            //User Non-active tidak akan bisa login

            if (!$user->status_aktif) {

                Auth::logout();

                return back()->with(
                    'error',
                    'Akun dinonaktifkan'
                );
            }

            // wajib ganti password pertama kali
            if (
                !$user->password_changed
                &&
                $user->role !== 'admin'
            ) {

                return redirect(
                    '/change-password'
                );
            }

            if ($user->role === 'admin') {

                return redirect(
                    '/admin/dashboard'
                );
            }

            return redirect(
                '/dashboard'
            );
        }

        return back()->with(
            'error',
            'Nomor identitas atau password salah'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}