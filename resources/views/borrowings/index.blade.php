@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Pengajuan Saya
        </h2>

        <p class="text-muted mb-0">
            Riwayat seluruh pengajuan peminjaman ruangan
        </p>

    </div>

    <a
        href="/my-borrowings/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Buat Pengajuan
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>No</th>

                        <th>Ruangan</th>

                        <th>Kegiatan</th>

                        <th>Status</th>

                        <th>Jadwal</th>

                        <th>Dokumen</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($borrowings as $borrowing)

                <tr>

                    <td>

                        <strong>
                            #PMJ{{ $borrowing->id }}
                        </strong>

                        @if($borrowing->revisi_dari)

                            <br>

                            <small class="text-muted">

                                Revisi dari
                                #PMJ{{ $borrowing->revisi_dari }}

                            </small>

                        @endif

                    </td>

                    <td>

                        <strong>
                            {{ $borrowing->room->nama_ruangan }}
                        </strong>

                        <br>

                        <small class="text-muted">

                            {{ $borrowing->kategori_pengaju }}

                        </small>

                    </td>

                    <td>

                        <strong>
                            {{ $borrowing->nama_kegiatan }}
                        </strong>

                        <br>

                        <small>

                            {{ $borrowing->jumlah_peserta }}
                            Peserta

                        </small>

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

                        @elseif($borrowing->status == 'ditolak')

                            <span class="badge bg-danger">
                                Ditolak
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                {{ ucfirst($borrowing->status) }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <small>

                            <strong>Mulai:</strong>

                            <br>

                            {{ \Carbon\Carbon::parse($borrowing->mulai_peminjaman)->translatedFormat('d M Y H:i') }}

                            <br><br>

                            <strong>Selesai:</strong>

                            <br>

                            {{ \Carbon\Carbon::parse($borrowing->selesai_peminjaman)->translatedFormat('d M Y H:i') }}

                        </small>

                    </td>

                    <td>

                        <div class="d-grid gap-1">

                            <a
                                href="/my-borrowings/{{ $borrowing->id }}/proposal"
                                target="_blank"
                                class="btn btn-outline-primary btn-sm"
                            >
                                Surat Pengajuan
                            </a>

                            @if($borrowing->surat_persetujuan)

                                <a
                                    href="{{ asset('storage/'.$borrowing->surat_persetujuan) }}"
                                    target="_blank"
                                    class="btn btn-outline-success btn-sm"
                                >
                                    Surat Persetujuan
                                </a>

                                <a
                                    href="/borrowings/{{ $borrowing->id }}/qr"
                                    target="_blank"
                                    class="btn btn-outline-dark btn-sm"
                                >
                                    QR Verifikasi
                                </a>

                            @endif

                        </div>

                    </td>

                    <td>

                        @if($borrowing->status == 'ditolak')

                            <button
                                class="btn btn-danger btn-sm mb-2"
                                data-bs-toggle="collapse"
                                data-bs-target="#alasan{{ $borrowing->id }}"
                            >
                                Lihat Alasan
                            </button>

                            <div
                                class="collapse"
                                id="alasan{{ $borrowing->id }}"
                            >

                                <div class="alert alert-danger p-2 mt-2 mb-2">

                                    {{ $borrowing->catatan_admin }}

                                </div>

                            </div>

                        @endif

                        @if($borrowing->status == 'menunggu')

                            <form
                                action="/my-borrowings/{{ $borrowing->id }}/cancel"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger btn-sm"
                                >
                                    Batalkan
                                </button>

                            </form>

                        @endif

                        @if($borrowing->status == 'ditolak')

                            <a
                                href="/my-borrowings/create?copy={{ $borrowing->id }}"
                                class="btn btn-warning btn-sm"
                            >
                                Ajukan Ulang
                            </a>

                        @endif

                    </td>

                </tr>

                @if($borrowing->logs->count())

                <tr>

                    <td colspan="7">

                        <small class="text-muted">

                            <strong>
                                Riwayat:
                            </strong>

                            <br>

                            @foreach($borrowing->logs as $log)

                                • {{ $log->aktivitas }}

                                ({{ $log->created_at }})

                                <br>

                            @endforeach

                        </small>

                    </td>

                </tr>

                @endif

                @empty

                <tr>

                    <td
                        colspan="7"
                        class="text-center text-muted"
                    >

                        Belum ada pengajuan.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection