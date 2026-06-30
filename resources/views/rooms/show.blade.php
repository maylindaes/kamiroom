@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-lg-8">

        <div class="card shadow-sm border-success mb-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <h2 class="fw-bold">
                            {{ $room->nama_ruangan }}
                        </h2>

                        <p class="text-muted mb-0">
                            {{ $room->faculty->nama_fakultas }}
                        </p>

                    </div>

                    <i class="bi bi-door-open fs-1 text-primary"></i>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Kapasitas</strong>

                            <span class="badge bg-info text-dark">

                                {{ $room->kapasitas }}
                                Orang

                            </span>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Status</strong>

                        <br>

                        @if($activeBorrowing)

                            <span class="badge bg-danger">
                                Dipinjam
                            </span>

                        @elseif($room->status == 'ditutup')

                            <span class="badge bg-secondary">
                                Ditutup
                            </span>

                        @else

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                        @endif

                    </div>

                </div>

                    <div class="mb-3">

                        <strong>
                            <i class="bi bi-tools"></i>
                            Fasilitas
                        </strong>

                        <p class="mb-0 mt-2">
                            {{ $room->fasilitas }}
                        </p>

                    </div>

                @if($room->status == 'ditutup')

                <div class="alert alert-warning">

                    <strong>Ruangan Ditutup</strong>

                    <br>

                    {{ $room->alasan_ditutup }}

                </div>

                @endif

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow-sm border-0">

            <div class="card-body text-center">

                <h5 class="mb-3">

                    <i class="bi bi-calendar-check"></i>

                    Peminjaman Ruangan

                </h5>

                @if($room->status == 'ditutup')

                    <button
                        class="btn btn-secondary w-100"
                        disabled
                    >
                        Ruangan Ditutup
                    </button>

                @elseif($activeBorrowing)

                    <button
                        class="btn btn-danger w-100"
                        disabled
                    >
                        Sedang Dipinjam
                    </button>

                @else

                    <a
                        href="/my-borrowings/create?room={{ $room->id }}"
                        class="btn btn-primary w-100"
                    >
                        Ajukan Peminjaman
                    </a>

                @endif

            </div>

        </div>

    </div>

</div>

@if($activeBorrowing)

<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Informasi Peminjaman Aktif
        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Dipinjam Oleh</strong>

                <p>
                    {{ $activeBorrowing->user->name }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Kategori</strong>

                <p>
                    {{ $activeBorrowing->kategori_pengaju }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Kegiatan</strong>

                <p>
                    {{ $activeBorrowing->nama_kegiatan }}
                </p>

            </div>

            <div class="col-md-6 mb-3">

                <strong>Detail Pengaju</strong>

                <p>
                    {{ $activeBorrowing->detail_pengaju }}
                </p>

            </div>

            <div class="col-md-6">

                <strong>Mulai</strong>

                <p>
                    {{ \Carbon\Carbon::parse($activeBorrowing->mulai_peminjaman)->translatedFormat('d F Y H:i') }}
                </p>

            </div>

            <div class="col-md-6">

                <strong>Selesai</strong>

                <p>
                    {{ \Carbon\Carbon::parse($activeBorrowing->selesai_peminjaman)->translatedFormat('d F Y H:i') }}
                </p>

            </div>

        </div>

    </div>

</div>

@endif

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            <i class="bi bi-clock-history"></i>

            Jadwal & Riwayat Peminjaman

        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Peminjam</th>
                        <th>Kegiatan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($borrowings as $item)

                    <tr>

                        <td>
                            {{ $item->user->name }}
                        </td>

                        <td>
                            {{ $item->nama_kegiatan }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->mulai_peminjaman)->translatedFormat('d M Y H:i') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($item->selesai_peminjaman)->translatedFormat('d M Y H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center text-muted">

                            Belum ada riwayat peminjaman.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

<style>

.table tbody tr:hover{
    background:#f8f9fa;
}

</style>