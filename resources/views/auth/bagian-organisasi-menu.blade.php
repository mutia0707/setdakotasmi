<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Bagian Organisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
        .card-menu { border-radius: 16px; border: none; transition: 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .card-menu:hover { transform: translateY(-6px); box-shadow: 0 12px 30px rgba(0,0,0,0.15); }
        .icon-circle { width: 70px; height: 70px; border-radius: 50%; background: #0066cc; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.8rem; color: white; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold"><i class="bi bi-building-gear me-2"></i> KELOLA BAGIAN ORGANISASI</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">KEMBALI</a>
    </div>
</nav>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row g-4 justify-content-center">
        @foreach([
            ['spbe', 'SPBE', 'laptop'],
            ['rb', 'Reformasi Birokrasi', 'arrow-repeat'],
            ['kelembagaan', 'Kelembagaan', 'diagram-3'],
        ] as $item)
        <div class="col-md-3">
            <div class="card card-menu p-4 text-center">
                <div class="icon-circle"><i class="bi bi-{{ $item[2] }}"></i></div>
                <h5 class="fw-bold mb-3">{{ $item[1] }}</h5>
                <a href="{{ route('admin.bagian-organisasi.edit', $item[0]) }}" class="btn btn-primary fw-bold w-100">Kelola</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>