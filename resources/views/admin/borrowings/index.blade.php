@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-0">
            Kelola Pengajuan
        </h2>

        <small class="text-muted">
            Daftar seluruh pengajuan peminjaman ruangan
        </small>

    </div>

</div>

<div class="card mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-8">

                    <input
                        type="text"
                        name="search"
                        class="form-control auto-search"
                        placeholder="Cari nomor, pengaju atau kegiatan..."
                        value="{{ request('search') }}"
                    >

                </div>

                <div class="col-md-4">

                    <select
                        name="status"
                        class="form-select auto-search"
                    >

                        <option value="semua">
                            Semua Status
                        </option>

                        <option
                            value="menunggu"
                            {{ request('status') == 'menunggu' ? 'selected' : '' }}
                        >
                            Menunggu
                        </option>

                        <option
                            value="disetujui"
                            {{ request('status') == 'disetujui' ? 'selected' : '' }}
                        >
                            Disetujui
                        </option>

                        <option
                            value="ditolak"
                            {{ request('status') == 'ditolak' ? 'selected' : '' }}
                        >
                            Ditolak
                        </option>

                    </select>

                </div>

            </div>

        </form>

    </div>

</div>



<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <div class="mb-3">

                <strong>

                    Total Pengajuan:

                    {{ $borrowings->count() }}

                </strong>

            </div>

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Validasi H-3</th>
                        <th>Pengaju</th>
                        <th>Ruangan</th>
                        <th>Kegiatan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Peserta</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                @if($borrowings->count() == 0)

                <tr>

                    <td colspan="10">

                        <div class="text-center py-4">

                            Tidak ada data ditemukan

                        </div>

                    </td>

                </tr>

                @endif

                <tbody>

                @foreach($borrowings as $borrowing)

                <tr>

                    <td>
                        #PMJ{{ $borrowing->id }}
                    </td>

                    <td>

                        {{ $borrowing->created_at->format('d/m/Y H:i') }}

                        <td>

                        @php

                        $selisihHari =
                            \Carbon\Carbon::parse($borrowing->created_at)
                            ->diffInDays(
                                \Carbon\Carbon::parse($borrowing->mulai_peminjaman),
                                false
                            );

                        @endphp

                        @if($selisihHari >= 3)

                            <span
                                style="
                                    background:#198754;
                                    color:white;
                                    padding:4px 8px;
                                    border-radius:5px;
                                "
                            >
                                Sesuai
                            </span>

                        @else

                            <span
                                style="
                                    background:#dc3545;
                                    color:white;
                                    padding:4px 8px;
                                    border-radius:5px;
                                "
                            >
                                Terlambat
                            </span>

                        @endif

                        </td>
                    <td>
                        {{ $borrowing->detail_pengaju }}
                    </td>

                    <td>
                        {{ $borrowing->room->nama_ruangan }}
                    </td>

                    <td>
                        {{ $borrowing->nama_kegiatan }}
                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse(
                            $borrowing->mulai_peminjaman
                        )->format('d/m/Y H:i') }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse(
                            $borrowing->selesai_peminjaman
                        )->format('d/m/Y H:i') }}

                    </td>

                    <td>
                        {{ $borrowing->jumlah_peserta }}
                    </td>

                    <td>

                        @if($borrowing->status == 'menunggu')

                            <span class="badge bg-warning text-dark">
                                Menunggu
                            </span>

                        @elseif($borrowing->status == 'disetujui')

                            <span class="badge bg-success">
                                Disetujui
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Ditolak
                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="/admin/borrowings/{{ $borrowing->id }}"
                            class="btn btn-primary btn-sm"
                        >
                            Detail
                        </a>

                        <a
                            href="/admin/borrowings/{{ $borrowing->id }}/preview"
                            target="_blank"
                            class="btn btn-secondary btn-sm"
                        >
                            PDF
                        </a>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection