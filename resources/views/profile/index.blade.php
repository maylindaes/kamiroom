@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="text-center mb-4">

                    <i class="bi bi-person-circle text-primary"
                       style="font-size:80px;"></i>

                    <h2 class="fw-bold mt-2">
                        Profil Saya
                    </h2>

                </div>

                <div class="table-responsive">

                    <table class="table">

                        <tr>
                            <th width="35%">
                                Nomor Identitas
                            </th>
                            <td>
                                {{ $user->nomor_identitas }}
                            </td>
                        </tr>

                        <tr>
                            <th>Nama</th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>
                                {{ $user->tanggal_lahir }}
                            </td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <span class="badge bg-primary">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                @if($user->status_aktif)

                                    <span class="badge bg-success">
                                        Aktif
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>
                        </tr>

                    </table>

                </div>

                <div class="text-end">

                    <a
                        href="/change-password"
                        class="btn btn-warning"
                    >
                        <i class="bi bi-key"></i>
                        Ganti Password
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection