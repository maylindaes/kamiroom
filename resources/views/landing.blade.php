<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>KamiRoom | Sistem Peminjaman Ruangan</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        html{
            scroll-behavior:smooth;
        }

        body{
            font-family:Segoe UI,sans-serif;
            background:#f8f9fa;
        }

        .navbar{
            transition:.3s;
        }

        .hero{

            min-height:100vh;

            display:flex;

            align-items:center;

            background:
            linear-gradient(
                135deg,
                #0d6efd,
                #0a58ca
            );

            color:white;

        }

        .hero h1{

            font-size:55px;

            font-weight:700;

        }

        .hero p{

            font-size:20px;

            opacity:.95;

        }

        .hero-image{

            width:100%;

            animation:float 4s ease-in-out infinite;

        }

        @keyframes float{

            0%{
                transform:translateY(0);
            }

            50%{
                transform:translateY(-15px);
            }

            100%{
                transform:translateY(0);
            }

        }

        .btn-custom{

            padding:12px 28px;

            border-radius:50px;

            font-weight:600;

        }

        .stat-card{

            background:white;

            color:#0d6efd;

            border-radius:18px;

            text-align:center;

            padding:25px;

            box-shadow:
                0 10px 25px rgba(0,0,0,.08);

            transition:.3s;

        }

        .stat-card:hover{

            transform:translateY(-8px);

        }

    </style>

</head>

<body>

<nav
class="navbar navbar-expand-lg navbar-dark fixed-top"
>

<div class="container">

<a
class="navbar-brand fw-bold"
href="/"
>

KamiRoom

</a>

<button
class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#menu"
>

<span class="navbar-toggler-icon"></span>

</button>

<div
class="collapse navbar-collapse"
id="menu"
>

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a
class="nav-link"
href="#home"
>

Beranda

</a>

</li>

<li class="nav-item">

<a
class="nav-link"
href="#about"
>

Tentang

</a>

</li>

<li class="nav-item">

<a
class="nav-link"
href="#feature"
>

Fitur

</a>

</li>

<li class="nav-item">

<a
class="nav-link"
href="#flow"
>

Alur

</a>

</li>

<li class="nav-item ms-lg-3">

<a
href="/login"
class="btn btn-light rounded-pill px-4"
>

Masuk

</a>

</li>

</ul>

</div>

</div>

</nav>

<section
id="home"
class="hero"
>

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1>

Sistem Peminjaman Ruangan Kampus

</h1>

<p class="my-4">

KamiRoom membantu mahasiswa,
dosen, dan administrator
melakukan peminjaman ruangan
secara cepat, mudah,
dan transparan.

</p>

<a
href="/login"
class="btn btn-light btn-custom me-3"
>

Masuk

</a>

<a
href="#about"
class="btn btn-outline-light btn-custom"
>

Pelajari

</a>

</div>

<div class="col-lg-6 text-center">

<img
src="https://undraw.co/api/illustrations/online-calendar.svg"
class="hero-image img-fluid"
>

</div>

</div>

<div class="row mt-5">

<div class="col-md-4 mb-3">

<div class="stat-card">

<h2>

{{ $jumlahRuangan }}

</h2>

Ruangan

</div>

</div>

<div class="col-md-4 mb-3">

<div class="stat-card">

<h2>

{{ $jumlahFakultas }}

</h2>

Fakultas

</div>

</div>

<div class="col-md-4 mb-3">

<div class="stat-card">

<h2>

{{ $jumlahPengajuan }}

</h2>

Pengajuan

</div>

</div>

</div>

</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>