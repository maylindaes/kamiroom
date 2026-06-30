@extends('layouts.admin')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold">
        Dashboard Admin
    </h2>

    <p class="text-muted">
        Ringkasan kondisi sistem peminjaman ruangan
    </p>

</div>

<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted">
                    Menunggu
                </h6>
                <h1>
                    {{ $pendingBorrowings }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted">
                    Disetujui
                </h6>
                <h1>
                    {{ $approvedBorrowings }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted">
                    Ditolak
                </h6>
                <h1>
                    {{ $rejectedBorrowings }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h6 class="text-muted">
                    Total User
                </h6>
                <h1>
                    {{ $totalUsers }}
                </h1>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Ruangan
                </h6>

                <h1>
                    {{ $totalRooms }}
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Ruangan Dipinjam
                </h6>

                <h1>
                    {{ $activeRooms }}
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Ruangan Ditutup
                </h6>

                <h1>
                    {{ $closedRooms }}
                </h1>

            </div>

        </div>

    </div>

</div>

<div class="card mt-2">

    <div class="card-body">

        <h5 class="mb-3">
            Informasi Dashboard
        </h5>

        <p class="text-muted mb-0">

            Dashboard ini menampilkan ringkasan data
            peminjaman ruangan, status pengajuan,
            jumlah pengguna, dan kondisi ruangan
            yang tersedia dalam sistem KamiRoom.

        </p>

    </div>

</div>

@endsection