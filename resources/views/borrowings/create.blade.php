@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Ajukan Peminjaman Ruangan
        </h2>

        <p class="text-muted mb-0">
            Lengkapi formulir berikut untuk mengajukan peminjaman ruangan
        </p>

    </div>

</div>

@if($errors->any())

<div class="alert alert-danger">

    <h6 class="fw-bold">
        Terdapat kesalahan:
    </h6>

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form
            method="POST"
            action="/my-borrowings"
            enctype="multipart/form-data"
        >

        @csrf

        @if(isset($copyBorrowing))

        <input
            type="hidden"
            name="revisi_dari"
            value="{{ $copyBorrowing->id }}"
        >

        @endif

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Ruangan
                </label>

                @if(isset($selectedRoom))

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $selectedRoom->nama_ruangan }}"
                        readonly
                    >

                    <input
                        type="hidden"
                        name="room_id"
                        value="{{ $selectedRoom->id }}"
                    >

                @else

                    <select
                        name="room_id"
                        class="form-select"
                    >

                        @foreach($rooms as $room)

                        <option
                            value="{{ $room->id }}"
                            {{
                                ($copyBorrowing->room_id ?? '')
                                == $room->id
                                ? 'selected'
                                : ''
                            }}
                        >
                            {{ $room->nama_ruangan }}
                        </option>

                        @endforeach

                    </select>

                @endif

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal Pengajuan
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ now()->translatedFormat('d F Y H:i') }}"
                    readonly
                >

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal Mulai
                </label>

                <input
                    type="datetime-local"
                    name="mulai_peminjaman"
                    class="form-control"
                    value="{{ isset($copyBorrowing) ? \Carbon\Carbon::parse($copyBorrowing->mulai_peminjaman)->format('Y-m-d\TH:i') : old('mulai_peminjaman') }}"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tanggal Selesai
                </label>

                <input
                    type="datetime-local"
                    name="selesai_peminjaman"
                    class="form-control"
                    value="{{ isset($copyBorrowing) ? \Carbon\Carbon::parse($copyBorrowing->selesai_peminjaman)->format('Y-m-d\TH:i') : old('selesai_peminjaman') }}"
                >

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Kategori Pengaju
                </label>

                <select
                    name="kategori_pengaju"
                    class="form-select"
                >

                    <option value="Mahasiswa"
                    {{ ($copyBorrowing->kategori_pengaju ?? '') == 'Mahasiswa' ? 'selected' : '' }}>
                        Mahasiswa
                    </option>

                    <option value="Dosen"
                    {{ ($copyBorrowing->kategori_pengaju ?? '') == 'Dosen' ? 'selected' : '' }}>
                        Dosen
                    </option>

                    <option value="Organisasi"
                    {{ ($copyBorrowing->kategori_pengaju ?? '') == 'Organisasi' ? 'selected' : '' }}>
                        Organisasi
                    </option>

                    <option value="UKM"
                    {{ ($copyBorrowing->kategori_pengaju ?? '') == 'UKM' ? 'selected' : '' }}>
                        UKM
                    </option>

                    <option value="Staf"
                    {{ ($copyBorrowing->kategori_pengaju ?? '') == 'Staf' ? 'selected' : '' }}>
                        Staf
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Detail Pengaju
                </label>

                <input
                    type="text"
                    name="detail_pengaju"
                    class="form-control"
                    value="{{ $copyBorrowing->detail_pengaju ?? old('detail_pengaju') }}"
                >

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama Kegiatan
            </label>

            <input
                type="text"
                name="nama_kegiatan"
                class="form-control"
                value="{{ $copyBorrowing->nama_kegiatan ?? old('nama_kegiatan') }}"
            >

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Jumlah Peserta
                </label>

                <input
                    type="number"
                    name="jumlah_peserta"
                    class="form-control"
                    value="{{ $copyBorrowing->jumlah_peserta ?? old('jumlah_peserta') }}"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Upload Surat Pengajuan (PDF)
                </label>

                <input
                    type="file"
                    name="file_pengajuan"
                    accept=".pdf"
                    class="form-control"
                >

                <small class="text-muted">
                    Maksimal ukuran file 2 MB
                </small>

            </div>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Deskripsi Kegiatan
            </label>

            <textarea
                name="deskripsi_kegiatan"
                rows="4"
                class="form-control"
            >{{ $copyBorrowing->deskripsi_kegiatan ?? old('deskripsi_kegiatan') }}</textarea>

        </div>

        <div class="d-flex justify-content-between">

            <a
                href="/my-borrowings"
                class="btn btn-secondary"
            >
                Kembali
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-send"></i>
                Kirim Pengajuan
            </button>

        </div>

        </form>

    </div>

</div>

@endsection