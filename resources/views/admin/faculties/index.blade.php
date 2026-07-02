@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-0">
            Kelola Fakultas
        </h2>

        <small class="text-muted">
            Data fakultas dalam sistem
        </small>

    </div>

    <a
        href="/admin/faculties/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Fakultas
    </a>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Fakultas
                </h6>

                <h2>
                    {{ $faculties->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Ruangan
                </h6>

                <h2>
                    {{ $faculties->sum('rooms_count') }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total User
                </h6>

                <h2>
                    {{ $faculties->sum('users_count') }}
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
                        placeholder="Cari fakultas..."
                        value="{{ request('search') }}"
                    >

                </div>

            </div>

        </form>

    </div>

</div>

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Fakultas</th>
                        <th>Jumlah Ruangan</th>
                        <th>Jumlah User</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($faculties as $faculty)

                    <tr>

                        <td>

                            <strong>

                                {{ $faculty->nama_fakultas }}

                            </strong>

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $faculty->rooms_count }}

                                Ruangan

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $faculty->users_count }}

                                User

                            </span>

                        </td>

                        <td>

                            <a
                                href="/admin/faculties/{{ $faculty->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <form
                                action="/admin/faculties/{{ $faculty->id }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus fakultas ini?')"
                                >
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4">

                            <div class="text-center py-4">

                                Tidak ada data fakultas

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