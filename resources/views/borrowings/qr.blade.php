@extends('layouts.app')

@section('content')

<h2>
    QR Verifikasi Surat
</h2>

<br>

{!! QrCode::size(250)->generate(
    url('/verify/'.$borrowing->id)
) !!}

<br><br>

<p>
    Scan QR untuk memverifikasi
    keaslian surat.
</p>

@endsection