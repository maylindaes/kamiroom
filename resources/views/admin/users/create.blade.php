@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-body">

        <h3 class="fw-bold mb-4">
            Tambah User
        </h3>

        <form
            method="POST"
            action="/admin/users"
        >

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    NIM/NIDN
                </label>

                <input
                    type="text"
                    name="nomor_identitas"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
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

                    <option value="{{ $faculty->id }}">
                        {{ $faculty->nama_fakultas }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="tanggal_lahir"
                    class="form-control"
                >

            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-save"></i>
                Simpan
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