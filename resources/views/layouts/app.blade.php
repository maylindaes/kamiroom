@php

$jumlahNotif = \App\Models\Notification::where(
    'user_id',
    auth()->id()
)
->where(
    'dibaca',
    false
)
->count();

@endphp

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>KamiRoom</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet"
>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

<style>

body{
    background:#f5f7fb;
}

.navbar-brand{
    font-weight:bold;
}

.content-wrapper{
    min-height:calc(100vh - 140px);
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

    <a
        class="navbar-brand d-flex align-items-center"
        href="/dashboard"
    >
        <img
            src="{{ asset('images/logo.putih.png') }}"
            alt="Logo"
            width="35"
            height="35"
            class="me-2"
        >

        <span class="fw-bold">
            KamiRoom
        </span>
    </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarMain"
        >

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/rooms">
                        Ruangan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/my-borrowings">
                        Pengajuan Saya
                    </a>
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="/notifications">

                        Notifikasi

                        @if($jumlahNotif > 0)

                            <span class="badge bg-danger">
                                {{ $jumlahNotif }}
                            </span>

                        @endif

                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/about">
                        About
                    </a>
                </li>

            </ul>

            <a
                href="/profile"
                class="btn btn-light btn-sm"
            >
                <i class="bi bi-person-circle"></i>
                Profil
            </a>

        </div>

    </div>

</nav>

<div class="container py-4 content-wrapper">

    @yield('content')

</div>

<footer
class="bg-white border-top py-3 mt-5"
>

    <div class="container text-center text-muted">

        KamiRoom © {{ date('Y') }}

        <br>

        Universitas Amikom Purwokerto

    </div>

</footer>

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>