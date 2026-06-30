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
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    class="form-control"
                    value="{{ $room->lokasi }}"
                    required
                >
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
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                >
                    <option
                        value="dibuka"
                        {{ $room->status == 'dibuka' ? 'selected' : '' }}
                    >
                        Dibuka
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