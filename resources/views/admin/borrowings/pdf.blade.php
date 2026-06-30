<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengajuan</title>
</head>
<body>

<h2>Detail Pengajuan Ruangan</h2>

<p>
    <strong>Nama Pengaju:</strong>
    {{ $borrowing->user->name }}
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
    <strong>Mulai:</strong>
    {{ $borrowing->mulai_peminjaman }}
</p>

<p>
    <strong>Selesai:</strong>
    {{ $borrowing->selesai_peminjaman }}
</p>

<p>
    <strong>Status:</strong>
    {{ ucfirst($borrowing->status) }}
</p>

</body>
</html>