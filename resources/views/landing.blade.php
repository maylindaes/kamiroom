<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>KamiRoom</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

<div class="container py-5">

    <h1>Landing Page KamiRoom</h1>

    <hr>

    <p>

        Jumlah Ruangan :
        {{ $roomCount }}

    </p>

    <p>

        Fakultas :
        {{ $facultyCount }}

    </p>

    <p>

        Pengajuan :
        {{ $borrowingCount }}

    </p>

    <p>

        Pengumuman :
        {{ $announcementCount }}

    </p>

    <a href="{{ route('login') }}"
       class="btn btn-primary">

        Login

    </a>

</div>

</body>
</html>