<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1"
>

<title>
KamiRoom | Sistem Peminjaman Ruangan
</title>

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

font-family:'Segoe UI',sans-serif;

background:#f8f9fa;

overflow-x:hidden;

}

/*======================
NAVBAR
======================*/

.navbar{

transition:.4s;

padding:15px 0;

background:rgba(13,110,253,.92);

backdrop-filter:blur(10px);

}

.navbar-brand{

font-weight:700;

font-size:24px;

}

.navbar .nav-link{

color:white !important;

margin-left:15px;

font-weight:500;

}

.navbar .nav-link:hover{

opacity:.85;

}

/*======================
HERO
======================*/

.hero{

    padding-top:130px;

    padding-bottom:120px;

    background:linear-gradient(
        135deg,
        #0d6efd,
        #0b5ed7
    );

    color:white;

    position:relative;

}

.hero h1{

font-size:60px;

font-weight:800;

line-height:1.2;

}

.hero p{

font-size:20px;

opacity:.95;

margin-top:25px;

margin-bottom:35px;

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

transform:translateY(-18px);

}

100%{

transform:translateY(0);

}

}

.btn-main{

padding:14px 34px;

border-radius:50px;

font-weight:600;

}

.btn-outline-light{

border-width:2px;

}

/*======================
STAT CARD
======================*/

.stats{

    background:#fff;

    padding-bottom:90px;

}

.stats-title{

text-align:center;

margin-bottom:35px;

}

.stats-title h2{

font-size:38px;

font-weight:700;

color:#0d6efd;

}

.stats-title p{

color:#666;

max-width:650px;

margin:auto;

}

.stat-card{

padding:28px 20px;

border-radius:20px;

background:white;

box-shadow:0 15px 35px rgba(0,0,0,.08);

transition:.3s;

height:100%;

}

.stat-card:hover{

    transform:translateY(-12px);

    box-shadow:0 25px 45px rgba(0,0,0,.15);

}

.stat-card i{

font-size:48px;

color:#0d6efd;

margin-bottom:18px;

display:block;

}

.stat-card h2{

font-size:48px;

letter-spacing:1px;

font-weight:800;

margin-bottom:10px;

color:#0d6efd;

}

.stat-card p{

margin:0;

font-weight:600;

font-size:18px;

}

.stat-wrapper{

    margin-top:-120px;

    margin-bottom:45px;

    position:relative;

    z-index:10;

}

/*======================
SECTION
======================*/

.section{

padding:90px 0;

}

.section-title{

font-size:40px;

font-weight:700;

margin-bottom:20px;

}

.section-subtitle{

color:#666;

margin-bottom:60px;

}

/*======================
ABOUT
======================*/

.about{

    padding:100px 0;

    background:#f8f9fa;

}

.about-image{

    width:100%;

    max-width:500px;

}

.about-list{

    list-style:none;

    padding:0;

    margin-top:25px;

}

.about-list li{

    margin-bottom:15px;

    font-size:18px;

    font-weight:500;

}

.about-list i{

    color:#0d6efd;

    margin-right:10px;

}

/*======================
FEATURE
======================*/

.feature{

    padding:100px 0;

    background:white;

}

.feature-card{

    background:#fff;

    border-radius:20px;

    padding:35px 28px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

    transition:.3s;

    height:100%;

    text-align:center;

}

.feature-card:hover{

    transform:translateY(-10px);

    box-shadow:0 20px 40px rgba(0,0,0,.12);

}

.feature-icon{

    width:80px;

    height:80px;

    margin:auto;

    border-radius:50%;

    background:#eaf3ff;

    display:flex;

    justify-content:center;

    align-items:center;

    margin-bottom:20px;

}

.feature-icon i{

    font-size:34px;

    color:#0d6efd;

}

.feature-card h4{

    font-weight:700;

    margin-bottom:15px;

}

.feature-card p{

    color:#666;

    margin:0;

}

/*======================
FLOW
======================*/

.flow-box{

    background:white;

    padding:35px 20px;

    border-radius:20px;

    box-shadow:0 12px 30px rgba(0,0,0,.08);

    transition:.3s;

    height:100%;

}

.flow-box:hover{

    transform:translateY(-8px);

}

.flow-icon{

    width:80px;

    height:80px;

    border-radius:50%;

    background:#0d6efd;

    color:white;

    margin:auto;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;

    margin-bottom:20px;

}

.flow-box h5{

    font-weight:700;

    margin-bottom:10px;

}

.flow-box small{

    color:#666;

}

/*======================
ROOM PREVIEW
======================*/

.room-card{

    border:none;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 12px 30px rgba(0,0,0,.08);

    transition:.3s;

    height:100%;

}

.room-card:hover{

    transform:translateY(-10px);

}

.room-image{

    width:100%;

    height:220px;

    object-fit:cover;

    background:#eef2f7;

}

.room-card .card-body{

    padding:25px;

}

.room-card h5{

    font-weight:700;

    margin-bottom:15px;

}

.room-info{

    color:#666;

    margin-bottom:10px;

}

.room-info i{

    color:#0d6efd;

    margin-right:8px;

}

/*======================
FAQ
======================*/

.faq{

    background:#ffffff;

}

.accordion-item{

    border:none;

    border-radius:15px !important;

    overflow:hidden;

    margin-bottom:15px;

    box-shadow:0 8px 20px rgba(0,0,0,.06);

}

.accordion-button{

    font-weight:600;

    padding:20px;

}

.accordion-button:not(.collapsed){

    background:#0d6efd;

    color:white;

}

.accordion-button:focus{

    box-shadow:none;

}

.accordion-body{

    color:#555;

    line-height:1.8;

}

/*======================
CTA
======================*/

.cta-box{

    background:linear-gradient(135deg,#0d6efd,#0b5ed7);

    color:white;

    padding:80px 40px;

    border-radius:30px;

    text-align:center;

    box-shadow:0 20px 50px rgba(13,110,253,.25);

}

.cta-box h2{

    font-size:42px;

    font-weight:700;

    margin-bottom:20px;

}

.cta-box p{

    max-width:700px;

    margin:auto;

    font-size:18px;

    opacity:.95;

}

.cta-box .btn{

    font-weight:600;

    padding:14px 40px;

}

/*======================
FOOTER
======================*/

.footer{

    background:#0f172a;

    color:#cbd5e1;

    padding:70px 0 25px;

}

.footer-logo{

    width:55px;

    margin-bottom:15px;

}

.footer h5{

    color:white;

    font-weight:700;

    margin-bottom:20px;

}

.footer p{

    line-height:1.8;

    color:#cbd5e1;

}

.footer ul{

    list-style:none;

    padding:0;

}

.footer ul li{

    margin-bottom:12px;

}

.footer ul li a{

    color:#cbd5e1;

    text-decoration:none;

    transition:.3s;

}

.footer ul li a:hover{

    color:white;

    padding-left:6px;

}

.footer-contact i{

    color:#3b82f6;

    margin-right:10px;

}

.footer-social a{

    width:45px;

    height:45px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    border-radius:50%;

    background:#1e293b;

    color:white;

    font-size:20px;

    margin-right:10px;

    transition:.3s;

    text-decoration:none;

}

.footer-social a:hover{

    background:#2563eb;

    transform:translateY(-5px);

}

.footer hr{

    border-color:#334155;

    margin:40px 0 20px;

}

.footer-copy{

    text-align:center;

    color:#94a3b8;

}

/*======================
RESPONSIVE
======================*/

@media(max-width:768px){

.hero{

text-align:center;

}

.hero h1{

font-size:38px;

}

.hero p{

font-size:18px;

}

.hero-image{

margin-top:40px;

}

.section-title{

font-size:30px;

}

}

/Hover Animation/

.feature-card,
.stat-card,
.preview-card,
.timeline-item{
    transition:.35s ease;
}

.feature-card:hover,
.stat-card:hover,
.preview-card:hover,
.timeline-item:hover{
    transform:translateY(-10px);
}

/Animasi Tombol/

.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(13,110,253,.3);
}

/Smooth Navbar/

.navbar{
    transition:all .4s;
}



</style>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

</head>

<body>

<nav
class="navbar navbar-expand-lg fixed-top navbar-dark">

<div class="container">

<a
class="navbar-brand d-flex align-items-center"
href="/">

<img
src="{{ asset('images/logo.putih.png') }}"
width="42"
class="me-2"
>

KamiRoom

</a>

<button
class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span
class="navbar-toggler-icon">
</span>

</button>

<div
class="collapse navbar-collapse"
id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a
class="nav-link"
href="#about">

Tentang

</a>

</li>

<li class="nav-item">

<a
class="nav-link"
href="#feature">

Fitur

</a>

</li>

<li class="nav-item">

<a
class="nav-link"
href="#flow">

Alur

</a>

</li>

<li class="nav-item ms-lg-3">

<a
href="{{ route('login') }}"
class="btn btn-light rounded-pill px-4">

Masuk

</a>

</li>

</ul>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6"
     data-aos="fade-right">

<span class="badge bg-light text-primary px-3 py-2 mb-3">

Universitas Amikom Purwokerto

</span>

<h1>

Sistem Peminjaman
Ruangan Kampus
yang Cepat,
Mudah &
Terintegrasi

</h1>

<p>

KamiRoom membantu mahasiswa,
dosen, serta administrator
dalam mengelola peminjaman
ruangan secara digital,
transparan, dan efisien.

</p>

<a
href="{{ route('login') }}"
class="btn btn-light btn-main me-3">

<i class="bi bi-box-arrow-in-right"></i>

Masuk

</a>

<a
href="#about"
class="btn btn-outline-light btn-main">

Pelajari

</a>

</div>

<div class="col-lg-6 text-center"
     data-aos="fade-left">

<img
src="{{ asset('images/hero.svg') }}"
class="hero-image"
alt="KamiRoom">

</div>

</div>

</div>

</section>

<section class="stats">

    <div class="container">

        <div class="stat-wrapper">

            <div class="row g-4">

                <div class="col-lg-4"
                        data-aos="zoom-in">

                    <div class="stat-card">

                        <i class="bi bi-door-open-fill"></i>

                        <h2>

                            {{ $jumlahRuangan }}

                        </h2>

                        <p>

                            Ruangan Tersedia

                        </p>

                    </div>

                </div>

                <div class="col-lg-4"
                        data-aos="zoom-in"
                        data-aos-delay="150">

                    <div class="stat-card">

                        <i class="bi bi-building-fill"></i>

                        <h2>

                            {{ $jumlahFakultas }}

                        </h2>

                        <p>

                            Fakultas

                        </p>

                    </div>

                </div>

                <div class="col-lg-4"
                        data-aos="zoom-in"
                        data-aos-delay="150">

                    <div class="stat-card">

                        <i class="bi bi-file-earmark-text-fill"></i>

                        <h2>

                            {{ $jumlahPengajuan }}

                        </h2>

                        <p>

                            Total Pengajuan

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="stats-title">

            <h2>

                Statistik KamiRoom

            </h2>

            <p>

                KamiRoom mendukung pengelolaan peminjaman ruangan secara digital
                melalui sistem yang cepat, transparan, dan terintegrasi.

            </p>

        </div>

    </div>

</section>

<section
id="about"
class="about">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6"
     data-aos="fade-right">

<h2 class="section-title">

Tentang KamiRoom

</h2>

<p class="lead">

KamiRoom merupakan Sistem Informasi
Peminjaman Ruangan Universitas
Amikom Purwokerto yang dirancang
untuk mempermudah proses peminjaman
ruangan secara cepat, transparan,
dan terintegrasi.

</p>

<ul class="about-list">

<li>

<i class="bi bi-check-circle-fill"></i>

Proses peminjaman lebih cepat

</li>

<li>

<i class="bi bi-check-circle-fill"></i>

Status pengajuan dapat dipantau

</li>

<li>

<i class="bi bi-check-circle-fill"></i>

Mendukung sistem paperless

</li>

<li>

<i class="bi bi-check-circle-fill"></i>

Terintegrasi dengan administrator

</li>

</ul>

</div>

<div class="col-lg-6 text-center"
     data-aos="fade-left">

<img
src="{{ asset('images/about.svg') }}"
class="about-image"
alt="Tentang KamiRoom">

</div>

</div>

</div>

</section>

<section
id="feature"
class="feature">

<div class="container">

<div class="text-center mb-5">

<h2 class="section-title">

Fitur KamiRoom

</h2>

<p class="section-subtitle">

Seluruh proses peminjaman ruangan dapat dilakukan
secara digital melalui satu sistem yang terintegrasi.

</p>

</div>

<div class="row g-4">

<div class="col-md-6 col-lg-4"
     data-aos="fade-up">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-calendar-event"></i>

</div>

<h4>

Kalender Ruangan

</h4>

<p>

Melihat jadwal penggunaan ruangan secara real-time.

</p>

</div>

</div>

<div class="col-md-6 col-lg-4"
     data-aos="fade-up"
     data-aos-delay="100">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-pencil-square"></i>

</div>

<h4>

Pengajuan Online

</h4>

<p>

Mengajukan peminjaman ruangan secara digital.

</p>

</div>

</div>

<div class="col-md-6 col-lg-4"
     data-aos="fade-up"
     data-aos-delay="200">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-upload"></i>

</div>

<h4>

Upload Surat

</h4>

<p>

Unggah surat pengajuan langsung melalui sistem.

</p>

</div>

</div>

<div class="col-md-6 col-lg-4"
     data-aos="fade-up"
     data-aos-delay="300">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-check-circle"></i>

</div>

<h4>

Persetujuan Admin

</h4>

<p>

Status pengajuan diproses oleh administrator.

</p>

</div>

</div>

<div class="col-md-6 col-lg-4"
     data-aos="fade-up"
     data-aos-delay="400">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-bell"></i>

</div>

<h4>

Notifikasi

</h4>

<p>

Mendapatkan informasi perubahan status pengajuan.

</p>

</div>

</div>

<div class="col-md-6 col-lg-4"
     data-aos="fade-up"
     data-aos-delay="500">

<div class="feature-card">

<div class="feature-icon">

<i class="bi bi-qr-code"></i>

</div>

<h4>

QR Verification

</h4>

<p>

Verifikasi surat persetujuan menggunakan QR Code.

</p>

</div>

</div>

</div>

</div>

</section>

<section id="flow" class="section bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Alur Peminjaman Ruangan

            </h2>

            <p class="section-subtitle">

                Seluruh proses dilakukan secara digital mulai dari pengajuan hingga verifikasi.

            </p>

        </div>

        <div class="row text-center g-4">

            <div class="col-md"
                data-aos="fade-up">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <h5>Login</h5>

                    <small>Mahasiswa / Dosen / Staf</small>

                </div>

            </div>

            <div class="col-md"
                    data-aos="fade-up"
                    data-aos-delay="100">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-pencil-square"></i>

                    </div>

                    <h5>Isi Form</h5>

                    <small>Lengkapi data peminjaman</small>

                </div>

            </div>

            <div class="col-md"
                data-aos="fade-up"
                data-aos-delay="200">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-upload"></i>

                    </div>

                    <h5>Upload Surat</h5>

                    <small>Surat pengajuan</small>

                </div>

            </div>

            <div class="col-md"
                data-aos="fade-up"
                data-aos-delay="300">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-check-circle-fill"></i>

                    </div>

                    <h5>Verifikasi</h5>

                    <small>Admin melakukan review</small>

                </div>

            </div>

            <div class="col-md"
                data-aos="fade-up"
                data-aos-delay="400">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-download"></i>

                    </div>

                    <h5>Unduh Surat</h5>

                    <small>Surat persetujuan</small>

                </div>

            </div>

            <div class="col-md"
                data-aos="fade-up"
                data-aos-delay="500">

                <div class="flow-box">

                    <div class="flow-icon">

                        <i class="bi bi-qr-code"></i>

                    </div>

                    <h5>QR Verifikasi</h5>

                    <small>Validasi ruangan</small>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section bg-light">

    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">

            <h2 class="section-title">

                Preview Ruangan

            </h2>

            <p class="section-subtitle">

                Beberapa ruangan yang tersedia di KamiRoom.

            </p>

        </div>

        <div class="row g-4">

            @foreach($rooms as $room)

            <div class="col-lg-4" data-aos="zoom-in">

                <div class="card room-card">

                    <img
                        src="{{ asset('images/room-placeholder.png') }}"
                        class="room-image"
                        alt="Ruangan">

                    <div class="card-body">

                        <h5>

                            {{ $room->nama_ruangan }}

                        </h5>

                        <p class="room-info">

                            <i class="bi bi-building"></i>

                            {{ $room->faculty->nama_fakultas }}

                        </p>

                        <p class="room-info">

                            <i class="bi bi-people-fill"></i>

                            Kapasitas {{ $room->kapasitas }} Orang

                        </p>

                        <a
                            href="/rooms/{{ $room->id }}"
                            class="btn btn-primary rounded-pill mt-3">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<section class="section faq">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Pertanyaan yang Sering Diajukan

            </h2>

            <p class="section-subtitle">

                Beberapa pertanyaan yang sering ditanyakan pengguna KamiRoom.

            </p>

        </div>

        <div class="accordion"
                id="faqAccordion"
                data-aos="fade-up">

            <div class="accordion-item"
                data-aos="fade-up"
                data-aos-delay="100">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button"
                        data-bs-toggle="collapse"
                        data-bs-target="#q1">

                        Siapa yang dapat meminjam ruangan?

                    </button>

                </h2>

                <div
                    id="q1"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#faq">

                    <div class="accordion-body">

                        Mahasiswa, dosen, maupun tenaga kependidikan Universitas Amikom Purwokerto yang memiliki akun aktif.

                    </div>

                </div>

            </div>

            <div class="accordion-item"
                data-aos="fade-up"
                data-aos-delay="200">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#q2">

                        Bagaimana proses persetujuan peminjaman?

                    </button>

                </h2>

                <div
                    id="q2"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faq">

                    <div class="accordion-body">

                        Setelah pengajuan dikirim, administrator akan memverifikasi data dan surat pengajuan sebelum memberikan persetujuan.

                    </div>

                </div>

            </div>

            <div class="accordion-item"
                data-aos="fade-up"
                data-aos-delay="300">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#q3">

                        Apakah surat persetujuan dapat diunduh?

                    </button>

                </h2>

                <div
                    id="q3"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faq">

                    <div class="accordion-body">

                        Ya. Surat persetujuan dapat diunduh setelah pengajuan disetujui oleh administrator.

                    </div>

                </div>

            </div>

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#q4">

                        Bagaimana keaslian surat diverifikasi?

                    </button>

                </h2>

                <div
                    id="q4"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faq">

                    <div class="accordion-body">

                        Setiap surat persetujuan dilengkapi QR Code yang dapat dipindai untuk memverifikasi keaslian dokumen.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-5">

    <div class="container" data-aos="zoom-in">

        <div class="cta-box text-center">

            <h2>

                Siap Menggunakan KamiRoom?

            </h2>

            <p>

                Masuk ke sistem untuk mengajukan peminjaman ruangan,
                memantau status pengajuan, serta mengelola jadwal
                ruangan secara digital.

            </p>

            <a
                href="{{ route('login') }}"
                class="btn btn-light btn-lg px-5 rounded-pill mt-3">

                <i class="bi bi-box-arrow-in-right me-2"></i>

                Login Sekarang

            </a>

        </div>

    </div>

</section>

<footer class="footer" data-aos="fade-up">

    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-4">

                <img
                    src="{{ asset('images/logo.putih.png') }}"
                    class="footer-logo"
                    alt="KamiRoom">

                <h5>

                    KamiRoom

                </h5>

                <p>

                    Sistem Informasi Peminjaman Ruangan
                    Universitas Amikom Purwokerto yang
                    membantu proses peminjaman ruangan
                    menjadi lebih cepat, transparan,
                    dan terintegrasi.

                </p>

            </div>

            <div class="col-lg-3">

                <h5>

                    Navigasi

                </h5>

                <ul>

                    <li>

                        <a href="#about">

                            Tentang

                        </a>

                    </li>

                    <li>

                        <a href="#feature">

                            Fitur

                        </a>

                    </li>

                    <li>

                        <a href="#flow">

                            Alur

                        </a>

                    </li>

                    <li>

                        <a href="#faq">

                            FAQ

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-lg-3 footer-contact">

                <h5>

                    Kontak

                </h5>

                <p>

                    <i class="bi bi-envelope-fill"></i>

                    admin@kamiroom.ac.id

                </p>

                <p>

                    <i class="bi bi-geo-alt-fill"></i>

                    Universitas Amikom Purwokerto

                </p>

            </div>

            <div class="col-lg-2">

                <h5>

                    Ikuti Kami

                </h5>

                <div class="footer-social">

                    <a href="#">

                        <i class="bi bi-github"></i>

                    </a>

                    <a href="#">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="#">

                        <i class="bi bi-facebook"></i>

                    </a>

                </div>

            </div>

        </div>

        <hr>

        <div class="footer-copy">

            © {{ date('Y') }}

            KamiRoom |

            Sistem Peminjaman Ruangan

            Universitas Amikom Purwokerto

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration:900,
    once:true,
    offset:80
});
</script>

<script>

window.addEventListener('scroll',function(){

const nav=document.querySelector('.navbar');

if(window.scrollY>80){

nav.style.padding="8px 0";
nav.style.background="rgba(13,110,253,.98)";

}else{

nav.style.padding="15px 0";
nav.style.background="rgba(13,110,253,.92)";

}

});

</script>

</body>
</html>