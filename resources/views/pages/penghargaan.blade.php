<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghargaan - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif; 
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Style */
        .navbar-custom {
            background-color: #ffffff !important;
            border-bottom: 3px solid #0056b3;
            padding: 15px 0;
            position: fixed; /* Tetap di atas */
            width: 100%;
            top: 0;
            z-index: 1000;
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
            border-radius: 0; /* Kotak solid */
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

        /* Jarak utama agar konten turun ke bawah (karena navbar fixed) */
        .main-content {
            margin-top: 120px; /* Jarak dari navbar */
            padding-bottom: 60px;
            flex: 1;
        }

        .header-title {
            border-left: 5px solid #0056b3;
            padding-left: 20px;
            margin-bottom: 50px;
        }

        /* Style Card Sertifikat */
        .award-card {
            background: #fff;
            border: none;
            border-radius: 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .award-card:hover {
            transform: translateY(-10px);
        }

        .img-container {
            padding: 30px;
            background: #f1f1f1;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            background-color: white;
        }

        .award-info {
            padding: 25px;
            text-align: center;
        }

        .award-category {
            font-size: 0.75rem;
            color: #0056b3;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        .award-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #222;
            line-height: 1.4;
        }

        footer {
            padding: 30px 0;
            background: #212529;
            color: #888;
        }
    </style>
</head>
<body>

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
        <div class="header-title">
            <h1 class="fw-bold m-0">Penghargaan</h1>
            <p class="text-muted m-0">Dokumentasi prestasi resmi Pemerintah Kota Sukabumi</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="award-card">
                    <div class="img-container">
                        <img src="{{ asset('img/sertifikat1.jpg') }}" alt="Sertifikat">
                    </div>
                    <div class="award-info">
                        <span class="award-category">Tahun 2024</span>
                        <h5 class="award-name">Penghargaan Peringkat I Tim Koordinasi Kerjasama Daerah</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="award-card">
                    <div class="img-container">
                        <img src="{{ asset('img/sertifikat2.jpg') }}" alt="Sertifikat">
                    </div>
                    <div class="award-info">
                        <span class="award-category">Tahun 2023</span>
                        <h5 class="award-name">Penghargaan Bidang Pengadaan Barang dan Jasa</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="award-card">
                    <div class="img-container">
                        <img src="{{ asset('img/sertifikat3.jpg') }}" alt="Sertifikat">
                    </div>
                    <div class="award-info">
                        <span class="award-category">Tahun 2023</span>
                        <h5 class="award-name">Apresiasi Kinerja Keterbukaan Informasi Publik</h5>
                    </div>
                </div>
            </div>
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