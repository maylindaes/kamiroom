@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Tambah Tata Tertib
    </h2>

    <form method="POST" action="/admin/rules">

        @csrf

        <div class="mb-4">

            <label class="form-label">
                Isi Tata Tertib
            </label>

            <textarea
                name="isi"
                rows="5"
                class="form-control"
                required
            ></textarea>

        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

        <a
            href="/admin/rules"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </form>

</div>

@endsection