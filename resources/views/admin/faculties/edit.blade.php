@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Edit Fakultas
    </h2>

    <form
        method="POST"
        action="/admin/faculties/{{ $faculty->id }}"
    >

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Fakultas
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                value="{{ $faculty->nama }}"
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
                value="{{ $faculty->kode }}"
            >

        </div>

        <button class="btn btn-primary">
            Update
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