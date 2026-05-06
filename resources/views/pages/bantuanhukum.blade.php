<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan Hukum - SETDA Kota Sukabumi</title>
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

        /* Legal Card Styling */
        .legal-card {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 25px;
            height: 100%;
            background: #fff;
            transition: all 0.3s ease;
        }

        .legal-card:hover {
            border-color: #333;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .legal-icon {
            font-size: 2rem;
            color: #333;
            margin-bottom: 15px;
            display: inline-block;
        }

        .legal-title {
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 12px;
            color: #000;
        }

        .legal-list {
            padding-left: 0;
            list-style: none;
            font-size: 0.95rem;
            color: #555;
        }

        .legal-list li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        .legal-list li::before {
            content: "→";
            position: absolute;
            left: 0;
            color: #333;
        }

        .wargi-badge {
            background-color: #333;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #333;
            padding: 20px;
            margin-top: 30px;
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
        <h2 class="header-title">Pelayanan Bantuan Hukum</h2>
        <div class="wargi-badge">WARGI HUKUM & POSBAKUM</div>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Bagian Hukum Setda Kota Sukabumi menyediakan layanan bantuan hukum gratis bagi warga kurang mampu melalui program **Wargi Hukum** (Warung Bagian Hukum) dan **Posbakum**. Layanan ini mencakup konsultasi hingga pendampingan perkara untuk menjamin keadilan bagi seluruh lapisan masyarakat.
        </p>

        <div class="row g-4">
            <!-- Program Utama -->
            <div class="col-md-6">
                <div class="legal-card">
                    <i class="bi bi-house-door legal-icon"></i>
                    <div class="legal-title">Layanan Kewilayahan</div>
                    <ul class="legal-list">
                        <li>**Wargi Hukum**: Sosialisasi produk hukum dan tempat konsultasi terkait Peraturan Daerah (Perda).</li>
                        <li>**Posbakum**: Tersedia di 33 kelurahan untuk pendampingan hukum terdekat bagi warga.</li>
                    </ul>
                </div>
            </div>

            <!-- Jenis Bantuan -->
            <div class="col-md-6">
                <div class="legal-card">
                    <i class="bi bi-balance legal-icon"></i>
                    <div class="legal-title">Cakupan Bantuan</div>
                    <ul class="legal-list">
                        <li>Layanan gratis bagi masyarakat kurang mampu (miskin).</li>
                        <li>Pendampingan perkara perdata, pidana, dan tata usaha negara.</li>
                        <li>Fokus pada penetapan akta kelahiran dan administrasi kependudukan.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Info Tambahan -->
        <div class="info-box">
            <h6 class="fw-bold"><i class="bi bi-cash-stack me-2"></i>Dukungan Anggaran & Prodeo</h6>
            <p class="mb-0 small text-muted">
                Pemerintah Kota Sukabumi mengalokasikan anggaran khusus untuk bantuan hukum, termasuk opsi pembebasan biaya perkara (prodeo) hasil kerja sama dengan Pengadilan Negeri Sukabumi.
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