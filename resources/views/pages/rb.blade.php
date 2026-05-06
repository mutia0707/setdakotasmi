<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reformasi Birokrasi - SETDA Kota Sukabumi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #ffffff; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            color: #333;
        }

        .navbar { 
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .header-title {
            margin-top: 40px;
            margin-bottom: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .divider {
            height: 2px;
            width: 60px;
            background: #333;
            margin: 0 auto 40px auto;
        }

        .content-section {
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 40px;
            font-size: 1.05rem;
            color: #444;
        }

        /* RB Section Styling */
        .rb-card {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 25px;
            height: 100%;
            transition: all 0.3s ease;
            background: #fff;
        }

        .rb-card:hover {
            border-color: #333;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .rb-icon {
            font-size: 2rem;
            color: #333;
            margin-bottom: 15px;
        }

        .rb-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .rb-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .rb-list li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 10px;
            font-size: 0.95rem;
            color: #555;
        }

        .rb-list li::before {
            content: "→";
            position: absolute;
            left: 0;
            color: #333;
        }

        .badge-rb {
            background-color: #333;
            color: #fff;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            display: inline-block;
        }

        footer {
            margin-top: 80px;
            padding: 30px 0;
            border-top: 1px solid #eee;
            color: #999;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="30" class="me-2"> 
            <span style="font-weight: 700; font-size: 1.1rem;">SETDA KOTA SUKABUMI</span>
        </a>
        
        <div class="ms-auto">
            <a href="/" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Judul -->
    <div class="text-center">
        <h2 class="header-title">Reformasi Birokrasi (RB)</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan Reformasi dan Birokrasi Setda Kota Sukabumi pada 2026 fokus pada peningkatan kinerja, digitalisasi layanan, dan percepatan birokrasi, dengan nilai RB general mencapai 66,11 (2024) dan komitmen kuat pada Sistem Pemerintahan Berbasis Elektronik (SPBE). Langkah strategis mencakup perampingan struktur, rotasi jabatan, dan percepatan pelayanan publik.
        </p>

        <div class="row g-4">
            <!-- Peningkatan Kualitas -->
            <div class="col-md-6">
                <div class="rb-card">
                    <i class="bi bi-graph-up-arrow rb-icon"></i>
                    <div class="rb-title">Kualitas & Kinerja 2026</div>
                    <ul class="rb-list">
                        <li>Birokrasi lincah dan berdampak langsung ke masyarakat.</li>
                        <li>Rotasi/Promosi Mei 2026 untuk penyegaran organisasi.</li>
                        <li>Pemetaan ulang tupoksi asisten daerah.</li>
                    </ul>
                </div>
            </div>

            <!-- Digitalisasi -->
            <div class="col-md-6">
                <div class="rb-card">
                    <i class="bi bi-laptop rb-icon"></i>
                    <div class="rb-title">Digitalisasi & SPBE</div>
                    <ul class="rb-list">
                        <li>Penerapan SPBE untuk tata kelola transparan.</li>
                        <li>Fokus pada layanan publik yang cepat dan modern.</li>
                    </ul>
                </div>
            </div>

            <!-- Area Perubahan -->
            <div class="col-md-6">
                <div class="rb-card">
                    <i class="bi bi-gear-wide-connected rb-icon"></i>
                    <div class="rb-title">8 Area Perubahan</div>
                    <ul class="rb-list">
                        <li>Manajemen Perubahan & Tata Laksana.</li>
                        <li>Penguatan Pengawasan & Kualitas Layanan.</li>
                    </ul>
                </div>
            </div>

            <!-- Target & Evaluasi -->
            <div class="col-md-6">
                <div class="rb-card">
                    <i class="bi bi-journal-check rb-icon"></i>
                    <div class="rb-title">Target & Evaluasi</div>
                    <div class="badge-rb">PERWAL No. 52 Tahun 2023</div>
                    <ul class="rb-list">
                        <li>Road Map Reformasi Birokrasi hingga 2026.</li>
                        <li>Pemantauan rutin untuk efisiensi birokrasi.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>