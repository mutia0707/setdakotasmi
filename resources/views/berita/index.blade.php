<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kota - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif; 
            color: #333;
        }

        /* Navbar Style (Sama dengan halaman lain agar konsisten) */
        .navbar-custom {
            background-color: #ffffff !important;
            border-bottom: 3px solid #0056b3;
            padding: 15px 0;
        }

        .navbar-brand-text {
            font-weight: 800;
            color: #0056b3;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        /* Tombol Kembali Solid Kotak */
        .btn-kembali {
            border: 2px solid #212529;
            color: #212529;
            font-weight: 700;
            border-radius: 0;
            padding: 8px 24px;
            text-transform: uppercase;
            font-size: 0.85rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-kembali:hover {
            background-color: #212529;
            color: #ffffff;
        }

        .main-content {
            margin-top: 50px;
            padding-bottom: 80px;
        }

        .header-title {
            border-left: 5px solid #0056b3;
            padding-left: 20px;
            margin-bottom: 40px;
        }

        /* Card Berita */
        .card-berita {
            border: none;
            border-radius: 0;
            transition: transform 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            background: #fff;
        }

        .card-berita:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-radius: 0;
            height: 200px;
            object-fit: cover;
        }

        .btn-baca {
            border: 1px solid #0056b3;
            color: #0056b3;
            border-radius: 0;
            font-weight: 600;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-baca:hover {
            background-color: #0056b3;
            color: white;
        }

        footer {
            padding: 25px 0;
            background: #212529;
            color: #888;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar-custom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="45" class="me-3">
            <span class="navbar-brand-text">SETDA KOTA SUKABUMI</span>
        </div>
        
        <a href="{{ url('/') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</nav>

<main class="main-content">
    <div class="container">
        <div class="header-title d-flex justify-content-between align-items-end">
            <div>
                <h1 class="fw-bold m-0 text-uppercase">Berita Kota</h1>
                <p class="text-muted m-0">Informasi terbaru seputar Kota Sukabumi</p>
            </div>
            <span class="badge bg-primary px-3 py-2" style="border-radius:0;">{{ count($beritas) }} BERITA</span>
        </div>

        <div class="row g-4">
            @forelse($beritas as $item)
                <div class="col-md-4">
                    <div class="card card-berita h-100">
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <small class="text-primary fw-bold mb-2">
                                <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                            </small>
                            <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                            <p class="card-text text-muted small">
                                {{ Str::limit($item->isi, 100) }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('berita.show', $item->id) }}" class="btn btn-baca w-100">BACA SELENGKAPNYA</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-light border shadow-sm">
                        <i class="bi bi-info-circle fs-2 text-muted"></i>
                        <p class="mt-2 mb-0">Belum ada berita yang diterbitkan saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</main>

<footer class="text-center">
    <div class="container">
        <p class="mb-0 small">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>