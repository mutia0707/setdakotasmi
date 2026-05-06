<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan SPBE - SETDA Kota Sukabumi</title>
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

        /* SPBE Card Styling */
        .spbe-card {
            background: #f8f9fa;
            border: none;
            border-left: 4px solid #0d6efd;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .spbe-card:hover {
            background: #fff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transform: translateY(-3px);
        }

        .card-icon {
            font-size: 1.8rem;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .card-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #212529;
        }

        .portal-link {
            text-decoration: none;
            font-weight: 600;
            color: #0d6efd;
        }

        .portal-link:hover {
            text-decoration: underline;
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
        <h2 class="header-title">Layanan SPBE</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan SPBE (Sistem Pemerintahan Berbasis Elektronik) Setda Kota Sukabumi, yang dikelola melalui Diskominfo, berfokus pada integrasi layanan digital dan transformasi digital untuk meningkatkan efisiensi dan transparansi. Target utamanya adalah mencapai predikat SPBE "Sangat Baik" pada tahun 2029 dengan memperkuat infrastruktur fisik dan perangkat lunak.
        </p>

        <h5 class="fw-bold mb-4">Poin Penting Pelayanan (Per April 2026):</h5>

        <div class="row">
            <!-- Portal Utama -->
            <div class="col-12">
                <div class="spbe-card">
                    <i class="bi bi-cpu card-icon"></i>
                    <div class="card-title">Pusat Informasi & Layanan</div>
                    <p class="mb-2">Simpan SPBE - Kota Sukabumi menjadi portal utama yang memuat data layanan pemerintahan, lokasi perangkat daerah, dan dokumen terkait SPBE.</p>
                    <a href="https://simpan-spbe.sukabumikota.go.id" target="_blank" class="portal-link">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Kunjungi simpan-spbe.sukabumikota.go.id
                    </a>
                </div>
            </div>

            <!-- SPLP -->
            <div class="col-md-6">
                <div class="spbe-card h-100">
                    <i class="bi bi-diagram-3 card-icon"></i>
                    <div class="card-title">Integrasi SPLP</div>
                    <p class="mb-0">Penggunaan Sistem Penghubung Layanan Pemerintah (SPLP) untuk interopabilitas data antar instansi agar layanan publik lebih cepat dan terpadu.</p>
                </div>
            </div>

            <!-- Pengaduan -->
            <div class="col-md-6">
                <div class="spbe-card h-100">
                    <i class="bi bi-chat-left-dots card-icon"></i>
                    <div class="card-title">Pengaduan Online</div>
                    <p class="mb-0">Dukungan integrasi pengaduan publik melalui sistem SP4N-LAPOR! untuk transparansi layanan.</p>
                </div>
            </div>

            <!-- Tata Kelola -->
            <div class="col-12 mt-3">
                <div class="spbe-card">
                    <i class="bi bi-shield-check card-icon"></i>
                    <div class="card-title">Penguatan Tata Kelola</div>
                    <p class="mb-0">Pembenahan pengelolaan aset daerah, revisi hukum SPBE, dan optimalisasi fungsi Forum Satu Data oleh Diskominfo.</p>
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