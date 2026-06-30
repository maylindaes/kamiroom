<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>KamiRoom Login</title>

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
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:
                linear-gradient(
                    135deg,
                    #0d6efd,
                    #0a58ca
                );
        }

        .login-card{
            width:100%;
            max-width:450px;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:
                0 15px 40px rgba(0,0,0,.15);
        }

        .login-header{
            text-align:center;
            padding:30px;
            background:white;
        }

        .logo{
            text-align:center;
            margin-top:20px;
            margin-bottom:20px;
        }

        .logo-img{
            width:80px;
            height:80px;
            object-fit:contain;
        }

        .brand-title{
            color:#0d6efd;
            font-weight:700;
        }

        .logo i{
            font-size:40px;
            color:#0d6efd;
        }

        .form-area{
            padding:30px;
        }

        .btn-login{
            padding:12px;
            font-weight:600;
        }

        .footer-text{
            text-align:center;
            font-size:13px;
            color:#777;
            margin-top:20px;
        }

    </style>

</head>

<body>

<div class="card login-card">

    <div class="login-header">

    <div class="logo">
        <img
            src="{{ asset('images/logo.biru.png') }}"
            alt="Logo KamiRoom"
            class="logo-img"
        >
    </div>
        <h2 class="fw-bold mb-1 brand-title">
            KamiRoom
        </h2>

        <p class="text-muted mb-0">
            Sistem Peminjaman Ruangan
        </p>

        <small class="text-secondary">
            Universitas Amikom Purwokerto
        </small>

    </div>

    <div class="form-area">

        @if(session('error'))

            <div class="alert alert-danger">

                <i class="bi bi-exclamation-triangle-fill"></i>

                {{ session('error') }}

            </div>

        @endif

        <form
            method="POST"
            action="{{ route('login.submit') }}"
        >

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Nomor Identitas

                </label>

                <input
                    type="text"
                    name="nomor_identitas"
                    class="form-control"
                    placeholder="Masukkan NIM / NIDN"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Password

                </label>

                <div class="input-group">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword()"
                    >
                        <i
                            id="eyeIcon"
                            class="bi bi-eye"
                        ></i>
                    </button>

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100 btn-login"
            >

                <i class="bi bi-box-arrow-in-right"></i>

                Masuk

            </button>

        </form>

        <div class="footer-text">

            KamiRoom © {{ date('Y') }}

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let password =
        document.getElementById(
            'password'
        );

    let icon =
        document.getElementById(
            'eyeIcon'
        );

    if(password.type === 'password'){

        password.type = 'text';

        icon.classList.remove(
            'bi-eye'
        );

        icon.classList.add(
            'bi-eye-slash'
        );

    }else{

        password.type = 'password';

        icon.classList.remove(
            'bi-eye-slash'
        );

        icon.classList.add(
            'bi-eye'
        );

    }
}

</script>

</body>
</html>