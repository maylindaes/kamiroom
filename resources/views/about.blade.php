@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="text-center mb-4">

            <h1 class="fw-bold text-primary">
                KamiRoom
            </h1>

            <p class="text-muted">
                Sistem Informasi Peminjaman Ruangan Kampus
            </p>

        </div>

        <div class="alert alert-light border">

            KamiRoom membantu mahasiswa,
            dosen, organisasi, UKM,
            dan staf dalam melakukan
            peminjaman ruangan secara online.

        </div>

        <h4 class="mt-4">
            Fitur Sistem
        </h4>

        <ul class="list-group mb-4">

            <li class="list-group-item">
                Pengajuan peminjaman ruangan
            </li>

            <li class="list-group-item">
                Upload surat pengajuan
            </li>

            <li class="list-group-item">
                Persetujuan admin
            </li>

            <li class="list-group-item">
                Upload surat persetujuan
            </li>

            <li class="list-group-item">
                Riwayat pengajuan
            </li>

            <li class="list-group-item">
                QR Verifikasi Surat
            </li>

        </ul>

        <h4>
            Tim Pengembang
        </h4>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead class="table-light">

                    <tr>

                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Tugas</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>Maylinda Eka Saputri</td>
                        <td>25SA31A049</td>
                        <td>Frontend & Backend Developer</td>
                    </tr>

                    <tr>
                        <td>Nadhifah Azzahra</td>
                        <td>25SA31A051</td>
                        <td>Dokumentasi & Pengujian</td>
                    </tr>

                    <tr>
                        <td>Ilham Deni Permana</td>
                        <td>25SA31A048</td>
                        <td>Logo & Ikon Favicon</td>
                    </tr>

                    <tr>
                        <td>Alvi Aulia Rahman</td>
                        <td>25SA31A040</td>
                        <td>Hosting</td>
                    </tr>

                    <tr>
                        <td>Jeri Rattama</td>
                        <td>25SA31A083</td>
                        <td>Mockup & Pengujian</td>
                    </tr>

                </tbody>

            </table>

        </div>

        <div class="card bg-light border-0 mt-4">

            <div class="card-body">

                <h5>
                    Tujuan Sistem
                </h5>

                <p class="mb-0">

                    Mempermudah proses pengajuan
                    peminjaman ruangan kampus yang
                    sebelumnya dilakukan secara manual
                    menjadi terkomputerisasi.

                </p>

            </div>

        </div>

        <div class="mt-4">

            <p>
                <strong>Versi:</strong> 1.0
            </p>

            <p>
                <strong>Dosen Pembimbing:</strong>
                M. Syaiful Amin
            </p>

            <p>
                <strong>Dosen Mata Kuliah:</strong>
                Banu Dwi Putranto
            </p>

            <p>
                <strong>Program Studi:</strong>
                Teknologi Informasi
            </p>

            <p>
                <strong>Universitas:</strong>
                Universitas Amikom Purwokerto
            </p>

            <p>
                <strong>Tahun:</strong>
                2026
            </p>

        </div>

    </div>

</div>

@endsection