@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-body">

        <h3 class="fw-bold mb-4">
            Edit User
        </h3>

        <form
            method="POST"
            action="/admin/users/{{ $user->id }}"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $user->name }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    NIM/NIDN
                </label>

                <input
                    type="text"
                    name="nomor_identitas"
                    value="{{ $user->nomor_identitas }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ $user->email }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Fakultas
                </label>

                <select
                    name="fakultas_id"
                    class="form-select"
                >

                    @foreach($faculties as $faculty)

                    <option
                        value="{{ $faculty->id }}"
                        {{ $user->fakultas_id == $faculty->id ? 'selected' : '' }}
                    >
                        {{ $faculty->nama_fakultas }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>

                <select
                    name="role"
                    class="form-select"
                >

                    <option
                        value="mahasiswa"
                        {{ $user->role == 'mahasiswa' ? 'selected' : '' }}
                    >
                        Mahasiswa
                    </option>

                    <option
                        value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status_aktif"
                    class="form-select"
                >

                    <option
                        value="1"
                        {{ $user->status_aktif ? 'selected' : '' }}
                    >
                        Aktif
                    </option>

                    <option
                        value="0"
                        {{ !$user->status_aktif ? 'selected' : '' }}
                    >
                        Nonaktif
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-save"></i>
                Update
            </button>

            <a
                href="/admin/users"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection