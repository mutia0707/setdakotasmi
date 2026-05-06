<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Perlengkapan & Rumah Tangga - SETDA Kota Sukabumi</title>
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

        /* Service List Styling */
        .service-item {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.2s;
        }

        .service-item:hover {
            background-color: #f9f9f9;
            transform: translateX(5px);
        }

        .service-icon {
            font-size: 1.5rem;
            color: #333;
            margin-right: 20px;
            margin-top: 2px;
        }

        .service-title {
            font-weight: 700;
            display: block;
            margin-bottom: 3px;
        }

        .service-desc {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 0;
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
        <h2 class="header-title">Pelayanan Perlengkapan dan Rumah Tangga</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan terkait perlengkapan dan rumah tangga di Sekretariat Daerah (Setda) Kota Sukabumi dikelola oleh Bagian Umum, yang mencakup penyiapan perumusan kebijakan, pengkoordinasian, serta pemantauan dan evaluasi di bidang tersebut.
        </p>

        <h5 class="fw-bold mb-4">Poin-Poin Pelayanan (Tupoksi):</h5>

        <!-- Daftar Layanan -->
        <div class="service-list">
            <div class="service-item">
                <i class="bi bi-building service-icon"></i>
                <div>
                    <span class="service-title">Pelayanan Rumah Tangga Perkantoran</span>
                    <p class="service-desc">Meliputi pengaturan operasional rumah tangga gedung kantor.</p>
                </div>
            </div>

            <div class="service-item">
                <i class="bi bi-cart-plus service-icon"></i>
                <div>
                    <span class="service-title">Pengadaan Perlengkapan</span>
                    <p class="service-desc">Pelayanan pengadaan perlengkapan rumah jabatan, gedung kantor, meubelair, hingga barang bercorak kesenian/kebudayaan.</p>
                </div>
            </div>

            <div class="service-item">
                <i class="bi bi-clipboard-data service-icon"></i>
                <div>
                    <span class="service-title">Inventarisasi & Analisis Kebutuhan</span>
                    <p class="service-desc">Subbagian yang menangani pendataan dan analisis kebutuhan sarana prasarana.</p>
                </div>
            </div>

            <div class="service-item">
                <i class="bi bi-tools service-icon"></i>
                <div>
                    <span class="service-title">Pemeliharaan Barang</span>
                    <p class="service-desc">Pelayanan pemeliharaan barang perlengkapan Sekretariat.</p>
                </div>
            </div>

            <div class="service-item">
                <i class="bi bi-box-seam service-icon"></i>
                <div>
                    <span class="service-title">Distribusi Perlengkapan</span>
                    <p class="service-desc">Subbagian yang mengelola distribusi barang pengadaan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>