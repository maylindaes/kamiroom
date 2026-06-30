@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Tambah Informasi
    </h2>

    <form method="POST" action="/admin/announcements">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Judul Informasi
            </label>

            <input
                type="text"
                name="judul"
                class="form-control"
                required
            >

        </div>

        <div class="mb-4">

            <label class="form-label">
                Isi Informasi
            </label>

            <textarea
                name="isi"
                rows="5"
                class="form-control"
                required
            ></textarea>

        </div>

        <button class="btn btn-primary">
            <i class="bi bi-check-square"></i>
            Simpan
        </button>

        <a
            href="/admin/announcements"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </form>

</div>

@endsection