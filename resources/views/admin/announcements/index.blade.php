@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Kelola Informasi
        </h2>

        <p class="text-muted mb-0">
            Informasi yang ditampilkan pada dashboard pengguna
        </p>

    </div>

    <a
        href="/admin/announcements/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Informasi
    </a>

</div>

<div class="card">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Judul
                        </th>

                        <th>
                            Isi Informasi
                        </th>

                        <th width="180">
                            Dibuat
                        </th>

                        <th width="170">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($announcements as $announcement)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <strong>
                                    {{ $announcement->judul }}
                                </strong>

                            </td>

                            <td>

                                {{ Str::limit(
                                    $announcement->isi,
                                    120
                                ) }}

                            </td>

                            <td>

                                {{ $announcement->created_at
                                    ->format('d M Y H:i') }}

                            </td>

                            <td>

                                <div class="btn-group">

                                    <a
                                        href="/admin/announcements/{{ $announcement->id }}/edit"
                                        class="btn btn-warning btn-sm"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                        
                                    </a>

                                    <form
                                        action="/admin/announcements/{{ $announcement->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus informasi ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="text-center text-muted py-4"
                            >

                                Belum ada informasi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection