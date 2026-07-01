@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body p-4">

        <h2 class="fw-bold mb-4">
            Tambah Ruangan
        </h2>

        <form action="/admin/rooms" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">
                    Nama Ruangan
                </label>

                <input
                    type="text"
                    name="nama_ruangan"
                    class="form-control"
                    required
                >
            </div>

            <div class="mb-3">

                <label class="form-label">

                    Fakultas

                </label>

                <select
                    name="fakultas_id"
                    class="form-select"
                    required
                >

                    <option value="">

                        -- Pilih Fakultas --

                    </option>

                    @foreach($faculties as $faculty)

                        <option value="{{ $faculty->id }}">

                            {{ $faculty->nama_fakultas }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label class="form-label">
                    Kapasitas
                </label>

                <input
                    type="number"
                    name="kapasitas"
                    class="form-control"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Fasilitas
                </label>

                <textarea
                    name="fasilitas"
                    rows="4"
                    class="form-control"
                ></textarea>
            </div>

            <div class="mb-3">

                <label class="form-label">

                    Gambar Ruangan

                </label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control"
                    accept="image/*"
                >

                <small class="text-muted">

                    Format: JPG, JPEG atau PNG (maks. 2 MB)

                </small>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select"
                >

                    <option value="tersedia">

                        Tersedia

                    </option>

                    <option value="ditutup">

                        Ditutup

                    </option>

                </select>

            </div>

            <button
                class="btn btn-primary"
            >
                <i class="bi bi-check-square"></i>
                Simpan
            </button>

            <a
                href="/admin/rooms"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection