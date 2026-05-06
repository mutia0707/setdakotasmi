<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kelembagaan - SETDA Kota Sukabumi</title>
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

        /* Institutional List Styling */
        .kelembagaan-item {
            padding: 20px;
            border-bottom: 1px solid #f2f2f2;
            transition: background-color 0.2s;
        }

        .kelembagaan-item:last-child {
            border-bottom: none;
        }

        .kelembagaan-item:hover {
            background-color: #fafafa;
        }

        .item-title {
            font-weight: 700;
            color: #000;
            display: block;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .item-desc {
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .contact-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 40px;
            border: 1px solid #eee;
        }

        .contact-link {
            color: #25d366;
            font-weight: 700;
            text-decoration: none;
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
        <h2 class="header-title">Pelayanan Kelembagaan</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan kelembagaan di Kota Sukabumi kini difokuskan pada peningkatan efisiensi melalui Mal Pelayanan Publik (MPP), transformasi digital, dan penguatan struktur perangkat daerah (SOTK) untuk mendukung tata kelola yang transparan dan cepat. Berbagai instansi vertikal dan daerah terintegrasi dalam satu atap untuk memberikan pelayanan publik yang lebih baik.
        </p>

        <h5 class="fw-bold mb-4">Poin-Poin Utama Pelayanan Kelembagaan:</h5>

        <div class="kelembagaan-list">
            <div class="kelembagaan-item">
                <span class="item-title">Mal Pelayanan Publik (MPP) Kota Sukabumi</span>
                <p class="item-desc">Pusat terpadu bagi berbagai jenis pelayanan publik, mulai dari perizinan hingga administrasi kependudukan.</p>
            </div>

            <div class="kelembagaan-item">
                <span class="item-title">Inovasi Digital</span>
                <p class="item-desc">Pengembangan Sistem Informasi Manajemen Pelayanan Online (SIMPONI) untuk mempercepat pelayanan berbasis digital.</p>
            </div>

            <div class="kelembagaan-item">
                <span class="item-title">Penguatan SOTK (Struktur Organisasi dan Tata Kerja)</span>
                <p class="item-desc">Penataan kelembagaan perangkat daerah, termasuk pembinaan tata pemerintahan oleh Setda Kota Sukabumi untuk meningkatkan kinerja aparatur.</p>
            </div>

            <div class="kelembagaan-item">
                <span class="item-title">Kelembagaan Posyandu</span>
                <p class="item-desc">Penguatan peran dan tata laksana kelembagaan Posyandu untuk mendukung penurunan stunting melalui kolaborasi Tim Pembina Pusat dan Daerah.</p>
            </div>

            <div class="kelembagaan-item">
                <span class="item-title">Evaluasi Kinerja</span>
                <p class="item-desc">Pemerintah kota secara rutin melakukan evaluasi dan inovasi kelembagaan untuk memberikan apresiasi pada dinas berprestasi.</p>
            </div>
        </div>

        <!-- Kontak Pelayanan -->
        <div class="contact-box">
            <h6 class="fw-bold mb-2">Kontak Pelayanan (DPMPTSP):</h6>
            <p class="mb-0">
                Layanan DPMPTSP dapat diakses melalui MPP atau WhatsApp: 
                <a href="https://wa.me/6282121215462" class="contact-link">
                    <i class="bi bi-whatsapp me-1"></i> 0821-2121-5462
                </a>
            </p>
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