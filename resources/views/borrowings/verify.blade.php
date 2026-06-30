@extends('layouts.app')

@section('content')

<h1>
    Verifikasi Surat
</h1>

<br>

@if(
    $borrowing->status == 'disetujui'
)

    <h2 style="color:green;">
        ✓ VALID
    </h2>

@else

    <h2 style="color:red;">
        ✗ TIDAK VALID
    </h2>

@endif

<br>

<p>
    <strong>Nomor:</strong>
    PMJ-{{ str_pad($borrowing->id,4,'0',STR_PAD_LEFT) }}
</p>

<p>
    <strong>Ruangan:</strong>
    {{ $borrowing->room->nama_ruangan }}
</p>

<p>
    <strong>Kegiatan:</strong>
    {{ $borrowing->nama_kegiatan }}
</p>

<p>
    <strong>Status:</strong>
    {{ ucfirst($borrowing->status) }}
</p>

@endsection