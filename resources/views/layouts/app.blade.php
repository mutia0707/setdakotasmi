<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary-color: #0056b3; --bg-light: #f4f7fa; }
        body { background-color: var(--bg-light); font-family: 'Inter', sans-serif; }
        .navbar { background-color: #ffffff !important; border-bottom: 3px solid var(--primary-color); }
        footer { background: #212529; color: #dee2e6; padding: 40px 0; margin-top: 80px; }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold text-primary text-uppercase" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="45" class="me-3"> 
            <span>SETDA KOTA SUKABUMI</span>
        </a>

        <div class="ms-auto">
            <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-3">
                <i class="bi bi-arrow-left"></i> KEMBALI
            </a>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="container text-center">
        <p class="mb-0 small">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>