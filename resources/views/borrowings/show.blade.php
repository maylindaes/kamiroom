@extends('layouts.app')

@section('content')

<h1>Detail Pengajuan</h1>

<br>

<p>
    <strong>Ruangan:</strong>
    {{ $borrowing->room->nama_ruangan }}
</p>

<br>

<p>
    <strong>Nama Kegiatan:</strong>
    {{ $borrowing->nama_kegiatan }}
</p>

<br>

<p>
    <strong>Kategori Pengaju:</strong>
    {{ $borrowing->kategori_pengaju }}
</p>

<br>

<p>
    <strong>Detail Pengaju:</strong>
    {{ $borrowing->detail_pengaju }}
</p>

<br>

<p>
    <strong>Jumlah Peserta:</strong>
    {{ $borrowing->jumlah_peserta }}
</p>

<br>

<p>
    <strong>Mulai:</strong>
    {{ $borrowing->mulai_peminjaman }}
</p>

<br>

<p>
    <strong>Selesai:</strong>
    {{ $borrowing->selesai_peminjaman }}
</p>

<br>

<p>
    <strong>Status:</strong>
    {{ ucfirst($borrowing->status) }}
</p>

<br>

@if($borrowing->status == 'ditolak')

<p>
    <strong>Alasan Penolakan:</strong>
    {{ $borrowing->catatan_admin }}
</p>

<br>

<a href="/my-borrowings/create?room={{ $borrowing->room_id }}">
     Ajukan Ulang
</a>

@endif

@if($borrowing->status == 'menunggu')

<form
    action="/my-borrowings/{{ $borrowing->id }}/cancel"
    method="POST"
>
    @csrf

    <button type="submit">
        Batalkan Pengajuan
    </button>
</form>

@endif

@if($borrowing->surat_persetujuan)

    <a href="{{ asset('storage/'.$borrowing->surat_persetujuan) }}"
       target="_blank">
        Download Surat Persetujuan
    </a>

@else

    <p>Surat belum tersedia</p>

@endif

@endsection