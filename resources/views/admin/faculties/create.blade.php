@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Tambah Fakultas
    </h2>

    <form method="POST" action="/admin/faculties">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Fakultas
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                required
            >

        </div>

        <div class="mb-4">

            <label class="form-label">
                Kode Fakultas
            </label>

            <input
                type="text"
                name="kode"
                class="form-control"
            >

        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a
            href="/admin/faculties"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </form>

</div>

@endsection