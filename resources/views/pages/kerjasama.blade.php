<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerja Sama Daerah - SETDA Kota Sukabumi</title>
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

        /* SAPA KERDA Styling */
        .kerda-card {
            background: #fdfdfd;
            border: 1px solid #eee;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .icon-square {
            min-width: 45px;
            height: 45px;
            background: #333;
            color: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-right: 20px;
        }

        .feature-title {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 3px;
            color: #000;
        }

        .feature-desc {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 0;
        }

        .sapa-brand {
            background-color: #333;
            color: #fff;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 15px;
        }

        .cta-box {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            border: 1px dashed #ccc;
            text-align: center;
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
        <h2 class="header-title">Kerja Sama Daerah</h2>
        <div class="sapa-brand">SAPA KERDA</div>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan kerja sama daerah Setda Kota Sukabumi kini difasilitasi melalui <strong>SAPA KERDA</strong> (Sarana Pelayanan Kerja Sama Daerah). Layanan ini merupakan pusat terpadu yang dirancang untuk menyederhanakan alur birokrasi serta mempercepat proses koordinasi dengan pihak ketiga maupun pemerintah lainnya.
        </p>

        <div class="kerda-card">
            <h5 class="fw-bold mb-4">Fitur Utama Pelayanan:</h5>
            
            <div class="feature-item">
                <div class="icon-square">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <p class="feature-title">Lokasi Fisik</p>
                    <p class="feature-desc">Tersedia desk khusus di lobi Balai Kota Sukabumi untuk pelayanan tatap muka secara langsung.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="icon-square">
                    <i class="bi bi-qr-code-scan"></i>
                </div>
                <div>
                    <p class="feature-title">Layanan Digital</p>
                    <p class="feature-desc">Konsultasi mudah menggunakan QR WA Bisnis SAPA KERDA tanpa harus datang langsung ke lokasi.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="icon-square">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <p class="feature-title">Tim Pengelola (TKKSD)</p>
                    <p class="feature-desc">Didukung oleh Tim Koordinasi Kerja Sama Daerah yang bertugas mempersiapkan dan mengelola seluruh aspek kerja sama.</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="icon-square">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div>
                    <p class="feature-title">Efisiensi & Transparansi</p>
                    <p class="feature-desc">Proses kerja sama dilaksanakan berdasarkan Standar Operasional Prosedur (SOP) resmi untuk menjamin transparansi.</p>
                </div>
            </div>
        </div>

        <div class="cta-box">
            <p class="mb-0 small text-muted">
                SAPA KERDA: Mempermudah koordinasi, mempercepat konsultasi, dan mengoptimalkan proses kerja sama daerah demi pembangunan Kota Sukabumi yang lebih baik.
            </p>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>