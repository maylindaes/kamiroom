@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Tambah Event Kalender
    </h2>

<form method="POST" action="/admin/calendar">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Judul Event
        </label>

        <input
            type="text"
            name="judul"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Keterangan
        </label>

        <textarea
            name="keterangan"
            class="form-control"
            rows="4"
        ></textarea>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Tanggal
        </label>

        <input
            type="date"
            name="tanggal"
            class="form-control"
            required
        >

    </div>

    <div class="mb-4">

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

            <option value="terbatas">
                Terbatas
            </option>

            <option value="ditutup">
                Ditutup
            </option>

        </select>

    </div>

    <button class="btn btn-primary">
        Simpan
    </button>

    <a
        href="/admin/calendar"
        class="btn btn-secondary"
    >
        Kembali
    </a>

</form>

</div>

@endsection