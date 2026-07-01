<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1"
>

<title>KamiRoom Admin</title>

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

.wrapper{
    min-height:100vh;
    display:flex;
}

.sidebar{
    width:260px;
    background:#0d6efd;
    color:white;
    min-height:100vh;
}

.sidebar .brand{
    padding:25px;
    font-size:24px;
    font-weight:bold;
}

.sidebar .brand img{
    object-fit:contain;
}

.brand-text{
    font-size:24px;
    font-weight:700;
}

.admin-text{
    display:block;
    margin-left:50px;
    font-size:13px;
}


.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:14px 25px;
    transition:.2s;
}

.sidebar a:hover{
    background:rgba(255,255,255,.15);
}

.sidebar a.active{
    background:rgba(255,255,255,.25);
    border-left:4px solid white;
    font-weight:bold;
}

.sidebar a i{
    margin-right:10px;
}

.main-content{
    flex:1;
    display:flex;
    flex-direction:column;
    min-height:100vh;
}

.topbar{
    background:white;
    padding:15px 25px;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
}

.page-content{
    flex:1;
    padding:30px;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
    transition:.2s;
}

.card:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 18px rgba(0,0,0,.08);
}

.footer{
    text-align:center;
    padding:20px;
    color:#777;
}

@media(max-width:768px){

    .sidebar{
        width:80px;
    }

    .sidebar a{
        font-size:0;
        text-align:center;
        padding:15px 0;
    }

    .sidebar a i{
        font-size:20px;
        margin-right:0;
    }

    .brand-text{
        display:none;
    }

    .sidebar .brand small{
        display:none;
    }

}



</style>

</head>

<body>

<div class="wrapper">

    <div class="sidebar">

        <div class="brand">

            <div
                class="d-flex align-items-center mb-2"
            >

                <img
                    src="{{ asset('images/logo.putih.png') }}"
                    alt="Logo"
                    width="40"
                    height="40"
                    class="me-2"
                >

                <span class="brand-text">
                    KamiRoom
                </span>

            </div>

            <small class="admin-text">
                Administrator
            </small>

        </div>

        <a
            href="/admin/dashboard"
            class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"
        >
            <i class="bi bi-house"></i>
            Dashboard
        </a>

        <a
            href="/admin/announcements"
            class="{{ request()->is('admin/announcements*') ? 'active' : '' }}"
        >
            <i class="bi bi-megaphone"></i>
            Kelola Informasi
        </a>

        <a
            href="/admin/rules"
            class="{{ request()->is('admin/rules*') ? 'active' : '' }}"
        >
            <i class="bi bi-journal-text"></i>
            Kelola Tata Tertib
        </a>

        <a
            href="/admin/calendar"
            class="{{ request()->is('admin/calendar*') ? 'active' : '' }}"
        >
            <i class="bi bi-calendar-event"></i>
            Kelola Kalender
        </a>

        <a
            href="/admin/users"
            class="{{ request()->is('admin/users*') ? 'active' : '' }}"
        >
            <i class="bi bi-people"></i>
            Kelola User
        </a>

        <a
            href="/admin/faculties"
            class="{{ request()->is('admin/faculties*') ? 'active' : '' }}"
        >
            <i class="bi bi-building"></i>
            Kelola Fakultas
        </a>

        <a
            href="/admin/rooms"
            class="{{ request()->is('admin/rooms*') ? 'active' : '' }}"
        >
            <i class="bi bi-door-open"></i>
            Kelola Ruangan
        </a>

        <a
            href="/admin/borrowings"
            class="{{ request()->is('admin/borrowings*') ? 'active' : '' }}"
        >
            <i class="bi bi-file-earmark-text"></i>
            Kelola Pengajuan
        </a>

    </div>

    <div class="main-content">

        <div class="topbar">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Panel Admin
                </h5>

                <div>

                    <span class="me-3">

                        <i class="bi bi-person-circle"></i>

                        {{ auth()->user()->name }}

                    </span>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf

                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

            <div class="page-content">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @yield('content')

            </div>

        <div class="footer">

            KamiRoom Admin © {{ date('Y') }}

        </div>

    </div>

</div>

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>