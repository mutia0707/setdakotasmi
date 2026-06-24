<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ strtoupper($jenis) }} - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffffff; font-family: 'Segoe UI', sans-serif; color: #333; }
        .navbar { border-bottom: 1px solid #eee; padding: 15px 0; }
        .header-title { margin-top: 40px; margin-bottom: 10px; font-weight: 700; text-transform: uppercase; }
        .divider { height: 2px; width: 60px; background: #333; margin: 0 auto 40px auto; }
        .content-section { max-width: 900px; margin: 0 auto; line-height: 1.8; }
        footer { margin-top: 80px; padding: 20px 0; border-top: 1px solid #eee; color: #999; font-size: 0.85rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="30" class="me-2">
            <span style="font-weight:700;font-size:1.1rem;">SETDA KOTA SUKABUMI</span>
        </a>
        <div class="ms-auto">
            <a href="/" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center">
        <h2 class="header-title">{{ strtoupper($jenis) }}</h2>
        <div class="divider"></div>
    </div>
    <div class="content-section">
        @if($data && $data->konten)
            {!! nl2br(e($data->konten)) !!}
        @else
            <p class="text-muted text-center">Data masih kosong.</p>
        @endif
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>
</body>
</html>