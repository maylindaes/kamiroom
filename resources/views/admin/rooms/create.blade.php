@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body p-4">

        <h2 class="fw-bold mb-4">
            Tambah Ruangan
        </h2>

        <form action="/admin/rooms" method="POST">

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
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    class="form-control"
                    required
                >
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
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                >
                    <option value="dibuka">
                        Dibuka
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