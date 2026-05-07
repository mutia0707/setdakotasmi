<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <span class="navbar-brand fw-bold">STAFF SETDA</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light btn-sm">LOGOUT</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="card shadow-sm border-0 p-4">
            <h2 class="fw-bold">Form Agenda Pimpinan</h2>
            <p class="text-muted small">Silahkan isi jadwal pimpinan di sini.</p>
            <hr>
            <div class="alert alert-info">Dashboard khusus penginputan agenda.</div>
        </div>
    </div>
</body>
</html>