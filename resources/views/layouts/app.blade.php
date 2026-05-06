<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #6c757d;
            --bg-light: #f4f7fa;
        }

        body { 
            background-color: var(--bg-light);
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        /* Navbar Solid & Elegant */
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 3px solid var(--primary-color);
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--primary-color) !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        /* Header Section */
        .header-title {
            border-left: 5px solid var(--primary-color);
            padding-left: 15px;
            margin-bottom: 40px;
        }

        /* Card Styling */
        .card { 
            border: none; 
            border-radius: 0; 
            overflow: hidden;
            transition: all 0.4s ease;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 20px 30px rgba(0,0,0,0.1); 
        }

        .card-img-container {
            overflow: hidden;
            height: 230px;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .card-body {
            padding: 25px;
        }

        .category-tag {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
            display: block;
        }

        .card-title {
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 15px;
            height: 55px;
            overflow: hidden;
        }

        .btn-read-more {
            background-color: var(--primary-color);
            color: white;
            border-radius: 0;
            font-weight: 600;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .btn-read-more:hover {
            background-color: #004494;
            color: white;
        }

        footer {
            background: #212529;
            color: #dee2e6;
            padding: 40px 0;
            margin-top: 80px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="45" class="me-3"> 
            
            <span>SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-4">
            <i class="bi bi-arrow-left me-1"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container mt-5">
    <div class="header-title">
        <h1 class="fw-bold m-0">Berita Kota</h1>
        <p class="text-muted m-0">Menyajikan informasi resmi dari Pemerintah Kota Sukabumi</p>
    </div>

    <div class="row">
        @forelse($berita as $item)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-img-container">
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <span class="category-tag">
                            <i class="bi bi-person-fill me-1"></i> {{ $item->pejabat ?? 'Admin Kota' }}
                        </span>
                        
                        <h5 class="card-title text-dark">{{ $item->judul }}</h5>
                        
                        <p class="card-text text-secondary small mb-4">
                            {{ Str::limit($item->isi, 120) }}
                        </p>
                        
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d M Y') }}
                            </small>
                            
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-read-more btn-sm">
                                SELENGKAPNYA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white shadow-sm border-top border-primary">
                    <i class="bi bi-newspaper text-muted" style="font-size: 4rem;"></i>
                    <h3 class="mt-3 fw-bold">Belum Ada Berita</h3>
                    <!-- <p class="text-muted">Data di tabel <code>berita_kota</code> masih kosong.</p> -->
                </div>
            </div>
        @endforelse
    </div>
</div>

<footer>
    <div class="container text-center">
        <p class="mb-0 small">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
        <p class="text-secondary" style="font-size: 0.7rem;">Dikelola oleh Bagian Organisasi Setda</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>