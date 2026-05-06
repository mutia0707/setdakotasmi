<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunjungan Pimpinan - SETDA Kota Sukabumi</title>
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

        /* Kunjungan Card Styling */
        .visit-card {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 25px;
            height: 100%;
            background: #fff;
            transition: all 0.3s ease;
        }

        .visit-card:hover {
            border-color: #333;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .visit-icon {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 15px;
            display: inline-block;
        }

        .visit-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 12px;
            color: #000;
        }

        .visit-list {
            padding-left: 0;
            list-style: none;
            font-size: 0.95rem;
            color: #555;
        }

        .visit-list li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        .visit-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #333;
            font-weight: bold;
        }

        .eval-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
            text-align: center;
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
        <h2 class="header-title">Pelayanan Kunjungan Pimpinan</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan kunjungan kerja pimpinan Sekretariat Daerah (Setda) Kota Sukabumi fokus pada pemantauan pelayanan publik, koordinasi pemerintahan, dan penguatan hubungan antarlembaga. Penjabat (Pj) Walikota dan Sekda melakukan kunjungan lapangan secara rutin guna memastikan kinerja optimal dan profesionalisme aparatur.
        </p>

        <div class="row g-4">
            <!-- Pemantauan Pelayanan -->
            <div class="col-md-6">
                <div class="visit-card">
                    <i class="bi bi-eye visit-icon"></i>
                    <div class="visit-title">Pemantauan Pelayanan Publik</div>
                    <ul class="visit-list">
                        <li>Pengecekan langsung dedikasi aparatur di awal tahun.</li>
                        <li>Memantau operasional Satuan Pelayanan Pemenuhan Gizi (SPPG).</li>
                    </ul>
                </div>
            </div>

            <!-- Koordinasi & Audiensi -->
            <div class="col-md-6">
                <div class="visit-card">
                    <i class="bi bi-people visit-icon"></i>
                    <div class="visit-title">Koordinasi & Audiensi</div>
                    <ul class="visit-list">
                        <li>Penerimaan kunjungan spesifik dari Komisi II DPR RI atau DPRD.</li>
                        <li>Penguatan kerja sama dengan lembaga eksternal.</li>
                    </ul>
                </div>
            </div>

            <!-- Pembinaan Wilayah -->
            <div class="col-12">
                <div class="visit-card">
                    <i class="bi bi-building visit-icon"></i>
                    <div class="visit-title">Pembinaan Wilayah</div>
                    <p class="small text-muted mb-0">Dilakukan pembinaan ke kecamatan dan dinas-dinas untuk membahas kendala administratif serta meningkatkan kualitas pelayanan langsung kepada warga Kota Sukabumi.</p>
                </div>
            </div>
        </div>

        <!-- Evaluasi -->
        <div class="eval-box">
            <h6 class="fw-bold mb-2"><i class="bi bi-clipboard-check me-2"></i>Evaluasi Berkala</h6>
            <p class="mb-0 small">Kunjungan dirancang sebagai bentuk evaluasi rutin terhadap optimalisasi peran pemerintah kota dalam melayani masyarakat.</p>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>