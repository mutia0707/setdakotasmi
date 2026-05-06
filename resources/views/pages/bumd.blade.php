<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan BUMD - SETDA Kota Sukabumi</title>
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

        /* BUMD Card Styling */
        .bumd-card {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 25px;
            height: 100%;
            transition: all 0.3s ease;
            background: #fff;
        }

        .bumd-card:hover {
            border-color: #333;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .bumd-icon {
            font-size: 2.2rem;
            color: #333;
            margin-bottom: 15px;
            display: block;
        }

        .bumd-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #000;
        }

        .strategy-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            font-size: 0.9rem;
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
        <h2 class="header-title">Pelayanan BUMD</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan BUMD (Badan Usaha Milik Daerah) di bawah Setda Kota Sukabumi pada 2026 difokuskan pada peningkatan profesionalisme, efisiensi layanan, dan profitabilitas. Perumda Tirta Bumi Wibawa (PDAM) dan PD Waluya didorong untuk melayani sekaligus berbisnis sehat dengan strategi berkelanjutan.
        </p>

        <div class="row g-4 mb-5">
            <!-- Perumda Tirta Bumi Wibawa -->
            <div class="col-md-6">
                <div class="bumd-card">
                    <i class="bi bi-droplet bumd-icon"></i>
                    <div class="bumd-name">Perumda Tirta Bumi Wibawa (PDAM)</div>
                    <p class="small text-muted mb-3">Memiliki 4 cabang pelayanan di berbagai kecamatan.</p>
                    <p class="mb-0 small">Fokus pada perbaikan kinerja teknis dan manajemen untuk melayani kebutuhan air bersih masyarakat secara optimal.</p>
                </div>
            </div>

            <!-- PD Waluya -->
            <div class="col-md-6">
                <div class="bumd-card">
                    <i class="bi bi-capsule bumd-icon"></i>
                    <div class="bumd-name">PD Waluya</div>
                    <p class="small text-muted mb-3">Layanan Kesehatan & Apotek Waluya.</p>
                    <p class="mb-0 small">Berfokus pada peningkatan peluang bisnis serta pelayanan profesional di sektor farmasi dan kesehatan.</p>
                </div>
            </div>

            <!-- BLUD RSUD R. Syamsudin, SH -->
            <div class="col-12">
                <div class="bumd-card">
                    <i class="bi bi-hospital bumd-icon"></i>
                    <div class="bumd-name">BLUD RSUD R. Syamsudin, SH</div>
                    <p class="mb-0">Memberikan layanan kesehatan komprehensif sebagai Badan Layanan Umum Daerah dengan penguatan sinergi layanan antar instansi.</p>
                </div>
            </div>
        </div>

        <!-- Strategi & Target -->
        <div class="strategy-box border">
            <h6 class="fw-bold mb-3"><i class="bi bi-lightbulb me-2"></i>Strategi 5M & Target Profitabilitas:</h6>
            <div class="row text-center">
                <div class="col"><strong>Man</strong></div>
                <div class="col"><strong>Management</strong></div>
                <div class="col"><strong>Material</strong></div>
                <div class="col"><strong>Machine</strong></div>
                <div class="col"><strong>Money</strong></div>
            </div>
            <hr>
            <p class="mb-0 text-center">Target Profitabilitas: <strong>Rp15 Miliar</strong> (Proyeksi akhir 2025/2026).</p>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>