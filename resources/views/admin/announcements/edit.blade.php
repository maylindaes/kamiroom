@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Edit Informasi
    </h2>

    <form
        method="POST"
        action="/admin/announcements/{{ $announcement->id }}"
    >

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Judul Informasi
            </label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ $announcement->judul }}"
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
            >{{ $announcement->isi }}</textarea>

        </div>

        <button class="btn btn-primary">
            Update
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