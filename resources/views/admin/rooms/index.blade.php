@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-0">
            Kelola Ruangan
        </h2>

        <small class="text-muted">
            Manajemen data ruangan kampus
        </small>

    </div>

    <a
        href="/admin/rooms/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Ruangan
    </a>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Total Ruangan
                </h6>

                <h2>
                    {{ $rooms->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Tersedia
                </h6>

                <h2>
                    {{ $rooms->where('status','tersedia')->count() }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    Ditutup
                </h6>

                <h2>
                    {{ $rooms->where('status','ditutup')->count() }}
                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row">

                <div class="col-md-12">

                    <input
                        type="text"
                        name="search"
                        class="form-control auto-search"
                        placeholder="Cari nama ruangan..."
                        value="{{ request('search') }}"
                    >

                </div>

            </div>

        </form>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Gambar</th>
                        <th>Ruangan</th>
                        <th>Fakultas</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($rooms as $room)

                    <tr>

                        <td width="110">

                            @if($room->gambar)

                                <img
                                    src="{{ asset('storage/'.$room->gambar) }}"
                                    width="90"
                                    height="70"
                                    style="
                                        object-fit:cover;
                                        border-radius:10px;
                                    "
                                >

                            @else

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="
                                        width:90px;
                                        height:70px;
                                        border-radius:10px;
                                    "
                                >

                                    <i class="bi bi-image text-secondary fs-3"></i>

                                </div>

                            @endif

                        </td>

                        <td>

                            <strong>
                                {{ $room->nama_ruangan }}
                            </strong>

                        </td>

                        <td>

                            {{ $room->faculty->nama_fakultas }}

                        </td>

                        <td>

                            {{ $room->kapasitas }}
                            Orang

                        </td>

                        <td>

                            @if($room->status == 'tersedia')

                                <span class="badge bg-success">
                                    Tersedia
                                </span>

                            @elseif($room->status == 'dipinjam')

                                <span class="badge bg-warning text-dark">
                                    Dipinjam
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Ditutup
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $room->alasan_ditutup ?: '-' }}

                        </td>

                        <td>

                            <a
                                href="/admin/rooms/{{ $room->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>

                            <form
                                action="/admin/rooms/{{ $room->id }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus ruangan ini?')"
                                >
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7">

                            <div class="text-center py-4">

                                Tidak ada data ruangan

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection