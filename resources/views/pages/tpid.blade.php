<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPID - SETDA Kota Sukabumi</title>
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

        /* TPID Item Styling */
        .tpid-card {
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .tpid-card:hover {
            background-color: #fcfcfc;
            border-color: #333;
        }

        .tpid-icon {
            font-size: 1.4rem;
            color: #333;
            margin-right: 15px;
        }

        .tpid-title {
            font-weight: 700;
            color: #000;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .tpid-desc {
            margin-top: 8px;
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 0;
            padding-left: 35px;
        }

        .info-tag {
            background-color: #f8f9fa;
            border-left: 3px solid #333;
            padding: 15px 20px;
            margin-top: 30px;
            font-size: 0.9rem;
            font-style: italic;
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
        <h2 class="header-title">Tim Pengendalian Inflasi Daerah (TPID)</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan Tim Pengendalian Inflasi Daerah (TPID) Setda Kota Sukabumi berfokus pada stabilitas harga bahan pokok dan ketersediaan pasokan untuk menjaga inflasi tetap rendah. Berdasarkan data 2025-2026, TPID aktif melakukan intervensi langsung dan pemantauan pasar untuk menghadapi potensi kenaikan harga kebutuhan pokok.
        </p>

        <h5 class="fw-bold mb-4">Langkah Strategis Pengendalian Inflasi:</h5>

        <!-- Gerakan Pangan Murah -->
        <div class="tpid-card">
            <div class="tpid-title">
                <i class="bi bi-cart-check tpid-icon"></i> Gerakan Pangan Murah (GPM)
            </div>
            <p class="tpid-desc">Menyelenggarakan GPM secara rutin di tujuh kecamatan untuk menyediakan kebutuhan pokok dengan harga terjangkau bagi masyarakat.</p>
        </div>

        <!-- Monitoring Harga -->
        <div class="tpid-card">
            <div class="tpid-title">
                <i class="bi bi-graph-up tpid-icon"></i> Monitoring Harga Harian (Bapokting)
            </div>
            <p class="tpid-desc">Pemantauan dan pelaporan harian harga Bahan Pokok Penting (Bapokting) melalui Diskumindag untuk deteksi dini gejolak harga.</p>
        </div>

        <!-- Analisa Tekanan -->
        <div class="tpid-card">
            <div class="tpid-title">
                <i class="bi bi-search tpid-icon"></i> Analisa Tekanan Inflasi
            </div>
            <p class="tpid-desc">Melakukan analisa berkala terhadap potensi tekanan inflasi pada kelompok makanan, minuman, tembakau, dan pendidikan.</p>
        </div>

        <!-- Penguatan Sinergi -->
        <div class="tpid-card">
            <div class="tpid-title">
                <i class="bi bi-people tpid-icon"></i> Penguatan Sinergi (High Level Meeting)
            </div>
            <p class="tpid-desc">Koordinasi dengan TPID Jawa Barat dan lembaga terkait untuk menyamakan kebijakan pengendalian melalui pemantauan berbasis digital.</p>
        </div>

        <!-- Penggunaan Data SP2KP -->
        <div class="tpid-card">
            <div class="tpid-title">
                <i class="bi bi-database-check tpid-icon"></i> Penggunaan Data SP2KP
            </div>
            <p class="tpid-desc">Pemanfaatan sistem informasi SP2KP (Sistem Pemantauan Pasar dan Kebutuhan Pokok) dan neraca pangan untuk memantau ketersediaan stok.</p>
        </div>

        <div class="info-tag">
            <i class="bi bi-info-circle me-2"></i> Data diperbarui secara berkala berdasarkan koordinasi sektoral di lingkungan Pemerintah Kota Sukabumi.
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>