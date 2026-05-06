<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberdayaan UMKM - SETDA Kota Sukabumi</title>
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

        /* UKM Program Styling */
        .program-item {
            border-left: 3px solid #eee;
            padding: 10px 25px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .program-item:hover {
            border-left-color: #333;
            background-color: #fcfcfc;
        }

        .program-tag {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #888;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 5px;
        }

        .program-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: #000;
            margin-bottom: 8px;
        }

        .program-desc {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 0;
        }

        .info-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            margin-top: 40px;
            border: 1px solid #eee;
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
        <h2 class="header-title">Pemberdayaan UMKM</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan pemberdayaan UMKM di Kota Sukabumi berfokus pada penguatan ekosistem ekonomi kreatif dan peningkatan kelas usaha. Program ini merupakan kolaborasi antara Sekretariat Daerah dan dinas teknis terkait untuk mendorong pelaku usaha agar lebih produktif dan kompetitif.
        </p>

        <!-- List Program -->
        <div class="program-list">
            <div class="program-item">
                <span class="program-tag">Fokus Utama</span>
                <div class="program-title">Program UMKM Naik Kelas</div>
                <p class="program-desc">Memberikan pendampingan intensif agar UMKM lokal dapat berkembang menjadi lebih produktif serta memiliki daya saing yang lebih tinggi.</p>
            </div>

            <div class="program-item">
                <span class="program-tag">Kapasitas SDM</span>
                <div class="program-title">Pelatihan & Inkubator Bisnis 2025</div>
                <p class="program-desc">Penyelenggaraan pelatihan terstruktur yang bertujuan meningkatkan kapasitas pengurus koperasi serta pelaku UMKM dalam mengelola bisnis.</p>
            </div>

            <div class="program-item">
                <span class="program-tag">Manajemen</span>
                <div class="program-title">Literasi Keuangan & Perkoperasian</div>
                <p class="program-desc">Kegiatan edukasi yang ditujukan untuk memperkuat manajemen keuangan dan operasional bagi para pelaku UMKM di Kota Sukabumi.</p>
            </div>

            <div class="program-item">
                <span class="program-tag">Legalitas & Digital</span>
                <div class="program-title">Pemasaran Digital & Fasilitasi Legalitas</div>
                <p class="program-desc">Pendampingan dalam pembuatan Nomor Induk Berusaha (NIB) dan sertifikasi halal untuk memperkuat aspek legalitas usaha di era digital.</p>
            </div>
        </div>

        <!-- Info Tambahan -->
        <div class="info-card">
            <h6 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Update Strategis 2026:</h6>
            <p class="mb-0 small">
                Pada Januari 2026, Pemkot Sukabumi melakukan kunjungan ke Kementerian Perindustrian untuk menyelaraskan program strategis pembangunan ekonomi daerah. Pemerintah terus mengoptimalkan ekonomi kreatif sebagai upaya pemberdayaan UMKM yang berkelanjutan.
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