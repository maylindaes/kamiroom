@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 class="fw-bold text-danger mb-4">
            Tolak Pengajuan
        </h2>

        <div class="alert alert-warning">

            <strong>Ruangan:</strong>
            {{ $borrowing->room->nama_ruangan }}

            <br>

            <strong>Kegiatan:</strong>
            {{ $borrowing->nama_kegiatan }}

        </div>

        <form
            action="/admin/borrowings/{{ $borrowing->id }}/reject"
            method="POST"
        >

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Alasan Penolakan
                </label>

                <textarea
                    name="catatan_admin"
                    class="form-control"
                    rows="5"
                    required
                ></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-danger"
            >
                Simpan Penolakan
            </button>

            <a
                href="/admin/borrowings/{{ $borrowing->id }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection