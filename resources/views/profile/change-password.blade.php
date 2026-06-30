@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="text-center mb-4">

                    <i
                        class="bi bi-shield-lock text-warning"
                        style="font-size:70px;"
                    ></i>

                    <h3 class="fw-bold mt-3">
                        Ganti Password
                    </h3>

                    <p class="text-muted">

                        Demi keamanan akun,
                        silakan ganti password bawaan.

                    </p>

                </div>

                <form
                    method="POST"
                    action="/change-password"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Simpan Password
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection