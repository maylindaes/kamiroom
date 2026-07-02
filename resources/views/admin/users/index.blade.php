@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-0">
            Kelola User
        </h2>

        <small class="text-muted">
            Manajemen akun pengguna sistem
        </small>

    </div>

    <a
        href="/admin/users/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah User
    </a>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total User
                </h6>

                <h2>
                    {{ $users->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    User Aktif
                </h6>

                <h2>

                    {{ $users->where('status_aktif',1)->count() }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Admin
                </h6>

                <h2>

                    {{ $users->where('role','admin')->count() }}

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-12">

                    <input
                        type="text"
                        name="search"
                        class="form-control auto-search"
                        placeholder="Cari nama, NIM atau email..."
                        value="{{ request('search') }}"
                    >

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="mb-3">

            <strong>
            </strong>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>NIM/NIDN</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Fakultas</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $user->nomor_identitas }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->faculty?->nama_fakultas }}
                        </td>

                        <td>

                            @if($user->role == 'admin')

                                <span class="badge bg-danger">
                                    Admin
                                </span>

                            @else

                                <span class="badge bg-primary">
                                    Mahasiswa
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($user->status_aktif)

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Nonaktif
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="/admin/users/{{ $user->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <form
                                action="/admin/users/{{ $user->id }}/reset-password"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Reset Password
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="text-center py-4">

                                Tidak ada data user

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection