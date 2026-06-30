<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $query = Faculty::withCount([
            'rooms',
            'users'
        ]);

        if ($request->search) {

            $query->where(
                'nama_fakultas',
                'like',
                '%' . $request->search . '%'
            );

        }

        $faculties = $query
            ->latest()
            ->get();

        return view(
            'admin.faculties.index',
            compact('faculties')
        );
    }

    public function create()
    {
        return view(
            'admin.faculties.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required'
        ]);

        Faculty::create([
            'nama_fakultas' =>
            $request->nama_fakultas
        ]);

        return redirect(
            '/admin/faculties'
        );
    }

    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);

        return view(
            'admin.faculties.edit',
            compact('faculty')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->update([
            'nama_fakultas' =>
            $request->nama_fakultas
        ]);

        return redirect(
            '/admin/faculties'
        );
    }

    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);

        if (
            $faculty->rooms()->count() > 0
        ) {
            return back()->with(
                'error',
                'Fakultas masih memiliki ruangan.'
            );
        }

        $faculty->delete();

        return redirect(
            '/admin/faculties'
        );
    }
}