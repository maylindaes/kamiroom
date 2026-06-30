@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Edit Event Kalender
    </h2>

    <form
        method="POST"
        action="/admin/calendar/{{ $event->id }}"
    >

        <div class="mb-3">

            <label class="form-label">
                Judul Event
            </label>

            <input
                type="text"
                name="judul"
                value="{{ $event->judul }}"
                class="form-control"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">
                Keterangan
            </label>

            <textarea
                name="keterangan"
                class="form-control"
                rows="4"
            >{{ $event->keterangan }}</textarea>

        </div>

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Tanggal
            </label>

            <input
                type="date"
                name="tanggal"
                value="{{ $event->tanggal }}"
                class="form-control"
                required
            >

        </div>

        <div class="mb-4">

            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-select"
            >
                <option
                    value="dibuka"
                    {{ $event->status == 'dibuka' ? 'selected' : '' }}
                >
                    Dibuka
                </option>

                <option
                    value="terbatas"
                    {{ $event->status == 'terbatas' ? 'selected' : '' }}
                >
                    Terbatas
                </option>

                <option
                    value="ditutup"
                    {{ $event->status == 'ditutup' ? 'selected' : '' }}
                >
                    Ditutup
                </option>

            </select>

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a
            href="/admin/calendar"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </form>

</div>

@endsection