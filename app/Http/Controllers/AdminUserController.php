<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('faculty');

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'nomor_identitas',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'email',
                    'like',
                    '%' . $request->search . '%'
                );

            });
        }

        $users = $query
            ->latest()
            ->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        $faculties = Faculty::all();

        return view(
            'admin.users.create',
            compact('faculties')
        );
    }

    public function store(Request $request)
    {
        User::create([

            'fakultas_id' =>
                $request->fakultas_id,

            'nomor_identitas' =>
                $request->nomor_identitas,

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'tanggal_lahir' =>
                $request->tanggal_lahir,

            'role' =>
                'mahasiswa',

            'status_aktif' =>
                true,

            'password_changed' =>
                false,

            'password' => Hash::make(
                $request->tanggal_lahir
            )
        ]);

        return redirect(
            '/admin/users'
        );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $faculties = Faculty::all();

        return view(
            'admin.users.edit',
            compact(
                'user',
                'faculties'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $user = User::findOrFail($id);

        $user->update([

            'fakultas_id' =>
                $request->fakultas_id,

            'nomor_identitas' =>
                $request->nomor_identitas,

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'role' =>
                $request->role,

            'status_aktif' =>
                $request->status_aktif
        ]);

        return redirect(
            '/admin/users'
        );
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        $user->password =
            $user->tanggal_lahir;

        $user->password_changed = false;

        $user->save();

        return back()->with(
            'success',
            'Password berhasil direset.'
        );
    }
}