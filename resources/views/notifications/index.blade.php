@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Notifikasi
        </h2>

        <p class="text-muted mb-0">
            Daftar pemberitahuan sistem KamiRoom
        </p>

    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        @if($notifications->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Judul</th>

                            <th>Pesan</th>

                            <th>Tanggal</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($notifications as $notification)

                        <tr>

                            <td>

                                <strong>
                                    {{ $notification->judul }}
                                </strong>

                            </td>

                            <td>
                                {{ $notification->pesan }}
                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y H:i') }}

                            </td>

                            <td>

                                @if(!$notification->dibaca)

                                    <form
                                        action="/notifications/{{ $notification->id }}/read"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-primary"
                                        >
                                            <i class="bi bi-check-circle"></i>
                                            Tandai Dibaca
                                        </button>

                                    </form>

                                @else

                                    <span class="badge bg-success">
                                        Sudah Dibaca
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-5">

                <i
                    class="bi bi-bell fs-1 text-muted"
                ></i>

                <h5 class="mt-3 text-muted">
                    Belum ada notifikasi
                </h5>

            </div>

        @endif

    </div>

</div>

@endsection