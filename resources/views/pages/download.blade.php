<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Dokumen - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #ffffff; 
            font-family: 'Inter', -apple-system, sans-serif; 
            color: #333;
        }

        /* Navbar Style */
        .navbar-custom {
            background-color: #ffffff !important;
            border-bottom: 2px solid #0056b3;
            padding: 12px 0;
        }

        .navbar-brand-text {
            font-weight: 800;
            color: #0056b3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 1rem;
        }

        .btn-kembali {
            border: 2px solid #212529;
            color: #212529;
            font-weight: 700;
            border-radius: 0;
            padding: 6px 18px;
            text-transform: uppercase;
            font-size: 0.75rem;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-kembali:hover {
            background-color: #212529;
            color: #ffffff;
        }

        .main-content {
            margin-top: 40px;
            padding-bottom: 60px;
        }

        .header-title {
            border-left: 4px solid #0056b3;
            padding-left: 15px;
            margin-bottom: 30px;
        }

        .header-title h1 {
            font-size: 1.75rem;
            letter-spacing: -0.5px;
        }

        /* Download List Style - Minimalis */
        .download-container {
            max-width: 900px;
        }

        .download-item {
            padding: 8px 12px; /* Jarak lebih rapat */
            border-radius: 4px;
            display: flex;
            align-items: center;
            transition: background 0.2s;
        }

        .download-item:hover {
            background-color: #f8f9fa;
        }

        .item-number {
            min-width: 30px;
            font-weight: 500;
            color: #999;
            font-size: 0.9rem;
        }

        .item-text {
            flex-grow: 1;
            color: #444;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .btn-download-link {
            color: #0056b3;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            padding: 4px 8px;
            transition: 0.2s;
        }

        .btn-download-link:hover {
            background-color: #0056b3;
            color: #fff;
            border-radius: 2px;
        }

        footer {
            padding: 20px 0;
            background: #f8f9fa;
            color: #aaa;
            font-size: 0.8rem;
            border-top: 1px solid #eee;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar-custom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="40" class="me-3">
            <span class="navbar-brand-text">SETDA KOTA SUKABUMI</span>
        </div>
        
        <a href="{{ url('/') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</nav>

<main class="main-content">
    <div class="container download-container">
        <div class="header-title">
            <h1 class="fw-bold m-0 text-uppercase">Download Dokumen</h1>
            <p class="text-muted m-0 small">Pusat unduhan materi dan regulasi resmi.</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="download-item">
                    <span class="item-number">01</span>
                    <span class="item-text">Logo Hari Jadi Kota Sukabumi ke-112</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">02</span>
                    <span class="item-text">Rencana Strategis (Renstra) SETDA 2023-2026</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">03</span>
                    <span class="item-text">Pedoman Peringatan Hari Lahir Pancasila</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">04</span>
                    <span class="item-text">Sambutan Wali Kota Upacara HUT RI ke-78</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">05</span>
                    <span class="item-text">Materi Sosialisasi Warung Hukum 2024</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">06</span>
                    <span class="item-text">Struktur Organisasi SETDA Terbaru</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">07</span>
                    <span class="item-text">Formulir Laporan Gratifikasi Pemerintah Kota</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">08</span>
                    <span class="item-text">Layout Buku Sistematika Pedoman Kerja ASN</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">09</span>
                    <span class="item-text">Panduan Penggunaan Portal SAPA KERDA</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>

                <div class="download-item">
                    <span class="item-number">10</span>
                    <span class="item-text">Road Map Reformasi Birokrasi Kota Sukabumi</span>
                    <a href="#" class="btn-download-link"><i class="bi bi-download me-1"></i> Unduh</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-center">
    <div class="container">
        <p class="mb-0">SETDA KOTA SUKABUMI &copy; 2026</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>