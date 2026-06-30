@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between">

            <h3>
                Detail Pengajuan
            </h3>

            <span class="
                badge
                @if($borrowing->status == 'menunggu')
                    bg-warning
                @elseif($borrowing->status == 'disetujui')
                    bg-success
                @elseif($borrowing->status == 'ditolak')
                    bg-danger
                @else
                    bg-secondary
                @endif
            ">
                {{ ucfirst($borrowing->status) }}
            </span>

        </div>

        <hr>

        @php

            $tanggalPengajuan = $borrowing->created_at;

            $tanggalMulai = \Carbon\Carbon::parse(
                $borrowing->mulai_peminjaman
            );

            $selisihHari = $tanggalPengajuan
                ->diffInDays(
                    $tanggalMulai,
                    false
                );

        @endphp

        <div class="row">

            <div class="col-md-6">

                <table class="table">

                    <tr>
                        <th width="40%">
                            Nomor Pengajuan
                        </th>
                        <td>
                            #PMJ{{ $borrowing->id }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Tanggal Pengajuan
                        </th>
                        <td>
                            {{ $borrowing->created_at->format('d M Y H:i') }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Pengaju
                        </th>
                        <td>
                            {{ $borrowing->detail_pengaju }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Kategori
                        </th>
                        <td>
                            {{ $borrowing->kategori_pengaju }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Ruangan
                        </th>
                        <td>
                            {{ $borrowing->room->nama_ruangan }}
                        </td>
                    </tr>

                </table>

            </div>

            <div class="col-md-6">

                <table class="table">

                    <tr>
                        <th width="40%">
                            Nama Kegiatan
                        </th>
                        <td>
                            {{ $borrowing->nama_kegiatan }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Mulai
                        </th>
                        <td>
                            {{ $borrowing->mulai_peminjaman }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Selesai
                        </th>
                        <td>
                            {{ $borrowing->selesai_peminjaman }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Jumlah Peserta
                        </th>
                        <td>
                            {{ $borrowing->jumlah_peserta }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Syarat H-3
                        </th>
                        <td>

                            @if($selisihHari >= 3)

                                <span class="badge bg-success">
                                    Memenuhi ({{ $selisihHari }} hari)
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Tidak Memenuhi ({{ $selisihHari }} hari)
                                </span>

                            @endif

                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="mt-3">

            <h5>Deskripsi Kegiatan</h5>

            <p>
                {{ $borrowing->deskripsi_kegiatan }}
            </p>

        </div>

        <div class="mt-4">

            <a
                href="/admin/borrowings/{{ $borrowing->id }}/preview"
                target="_blank"
                class="btn btn-primary"
            >
                Lihat Surat Pengajuan
            </a>

            <a
                href="/admin/borrowings/{{ $borrowing->id }}/pdf"
                class="btn btn-secondary"
            >
                Download PDF
            </a>

        </div>

        @if($borrowing->status == 'menunggu')

            <hr>

            <h5>
                Persetujuan Pengajuan
            </h5>

            <form
                action="/admin/borrowings/{{ $borrowing->id }}/approve"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Upload Surat Persetujuan (PDF)
                    </label>

                    <input
                        type="file"
                        name="surat_persetujuan"
                        class="form-control"
                        accept="application/pdf"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Setujui Pengajuan
                </button>

                <a
                    href="/admin/borrowings/{{ $borrowing->id }}/reject"
                    class="btn btn-danger"
                >
                    Tolak Pengajuan
                </a>

            </form>

        @endif

    </div>

</div>

@endsection