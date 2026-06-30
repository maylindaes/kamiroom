@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Kelola Tata Tertib
        </h2>

        <p class="text-muted mb-0">
            Daftar tata tertib penggunaan ruangan
        </p>

    </div>

    <a
        href="/admin/rules/create"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-circle"></i>
        Tambah Tata Tertib
    </a>

</div>

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th width="80">
                            No
                        </th>

                        <th>
                            Isi Tata Tertib
                        </th>

                        <th width="180">
                            Aksi
                        </th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($rules as $rule)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $rule->isi }}
                            </td>

                            <td>

                                <a
                                    href="/admin/rules/{{ $rule->id }}/edit"
                                    class="btn btn-warning btn-sm"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <form
                                    action="/admin/rules/{{ $rule->id }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus tata tertib ini?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="3"
                                class="text-center text-muted py-4"
                            >
                                Belum ada data tata tertib
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection