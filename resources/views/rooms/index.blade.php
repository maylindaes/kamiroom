@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Daftar Ruangan
        </h2>

        <p class="text-muted mb-0">
            Pilih ruangan yang tersedia untuk diajukan peminjaman
        </p>

    </div>

</div>

{{-- Filter Fakultas --}}

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body text-center">
            <h6 class="text-muted mb-3">
                Filter Fakultas
            </h6>

            <a
                href="/rooms"
                class="btn {{ request('faculty') ? 'btn-outline-primary' : 'btn-primary' }} me-2 mb-2"
            >
                Semua
            </a>

            <a
                href="/rooms?faculty=1"
                class="btn {{ request('faculty') == 1 ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2"
            >
                FIK
            </a>

            <a
                href="/rooms?faculty=2"
                class="btn {{ request('faculty') == 2 ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2"
            >
                FEBIS
            </a>

            <a
                href="/rooms?faculty=3"
                class="btn {{ request('faculty') == 3 ? 'btn-primary' : 'btn-outline-primary' }} mb-2"
            >
                FIKES
            </a>

        </div>

    </div>

<div class="row g-4">

@forelse($rooms as $room)

<div class="col-lg-4 col-md-6">

    <a
        href="/rooms/{{ $room->id }}"
        class="text-decoration-none"
    >

        <div class="card room-card h-100 border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <h5 class="fw-bold text-dark">
                        {{ $room->nama_ruangan }}
                    </h5>

                    <i class="bi bi-door-open fs-4 text-primary"></i>

                </div>

                <hr>

                <p class="text-muted mb-2">

                    <i class="bi bi-people-fill"></i>

                    Kapasitas:
                    <strong>
                        {{ $room->kapasitas ?? '-' }}
                    </strong>

                </p>

                @if($room->status_tampil == 'tersedia')

                    <span class="badge bg-success">
                        Tersedia
                    </span>

                @elseif($room->status_tampil == 'dibooking')

                    <span class="badge bg-warning text-dark">
                        Dibooking
                    </span>

                @elseif($room->status_tampil == 'dipinjam')

                    <span class="badge bg-danger">
                        Dipinjam
                    </span>

                @else

                    <span class="badge bg-secondary">
                        Ditutup
                    </span>

                @endif

            </div>

            <div class="card-footer bg-white border-0">

                <small class="text-primary fw-semibold">

                    Lihat Detail
                    <i class="bi bi-arrow-right"></i>

                </small>

            </div>

        </div>

    </a>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning">

        Tidak ada ruangan ditemukan.

    </div>

</div>

@endforelse

</div>

<style>

.room-card{
    transition:.25s;
}

.room-card:hover{
    transform:translateY(-6px);
    box-shadow:0 8px 25px rgba(0,0,0,.12) !important;
}

</style>

@endsection