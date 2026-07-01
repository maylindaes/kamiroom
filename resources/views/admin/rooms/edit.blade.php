@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body p-4">

        <h2 class="fw-bold mb-4">
            Edit Ruangan
        </h2>

        <form
            action="/admin/rooms/{{ $room->id }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">
                    Nama Ruangan
                </label>

                <input
                    type="text"
                    name="nama_ruangan"
                    class="form-control"
                    value="{{ $room->nama_ruangan }}"
                    required
                >
            </div>

            <div class="mb-3">

                <label class="form-label">

                    Fakultas

                </label>

                <select
                    name="fakultas_id"
                    class="form-select"
                    required
                >

                    @foreach($faculties as $faculty)

                        <option
                            value="{{ $faculty->id }}"
                            {{ $room->fakultas_id == $faculty->id ? 'selected' : '' }}
                        >

                            {{ $faculty->nama_fakultas }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label class="form-label">
                    Kapasitas
                </label>

                <input
                    type="number"
                    name="kapasitas"
                    class="form-control"
                    value="{{ $room->kapasitas }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Fasilitas
                </label>

                <textarea
                    name="fasilitas"
                    rows="4"
                    class="form-control"
                >{{ $room->fasilitas }}</textarea>
            </div>

            <div class="mb-3">

                <label class="form-label">

                    Gambar Ruangan

                </label>

                @if($room->gambar)

                    <div class="mb-3">

                        <img
                            src="{{ asset('storage/'.$room->gambar) }}"
                            width="220"
                            class="img-thumbnail"
                        >

                    </div>

                @endif

                <input
                    type="file"
                    name="gambar"
                    class="form-control"
                    accept="image/*"
                >

                <small class="text-muted">

                    Kosongkan jika tidak ingin mengganti gambar.

                </small>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select"
                >

                    <option
                        value="tersedia"
                        {{ $room->status == 'tersedia' ? 'selected' : '' }}
                    >

                        Tersedia

                    </option>

                    <option
                        value="ditutup"
                        {{ $room->status == 'ditutup' ? 'selected' : '' }}
                    >

                        Ditutup

                    </option>

                </select>

            </div>

            <button
                class="btn btn-primary"
            >
                <i class="bi bi-check-square"></i>
                Update
            </button>

            <a
                href="/admin/rooms"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection