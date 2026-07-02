@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Kelola Kalender
        </h2>

        <p class="text-muted mb-0">
            Atur status peminjaman pada tanggal tertentu
        </p>

    </div>

    <a
        href="/admin/calendar/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Event
    </a>

</div>

<div class="card">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover mb-0">

                <thead class="table-light">

                    <tr>
                        <th width="70">
                            No
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th width="170">
                            Aksi
                        </th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($events as $event)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </td>

                        <td>

                            @if($event->status == 'dibuka')

                                <span class="badge bg-success">
                                    Dibuka
                                </span>

                            @elseif($event->status == 'terbatas')

                                <span class="badge bg-warning text-dark">
                                    Terbatas
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Ditutup
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $event->keterangan }}
                        </td>

                        <td>

                            <a
                                href="/admin/calendar/{{ $event->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-muted py-4"
                        >
                            Belum ada event kalender
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection