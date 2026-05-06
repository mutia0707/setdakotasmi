<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPD 2024-2026 - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #ffffff; 
            font-family: 'Segoe UI', sans-serif; 
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
            text-align: justify;
        }

        .rpd-banner {
            width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 30px;
        }

        footer {
            margin-top: 80px;
            padding: 20px 0;
            border-top: 1px solid #eee;
            color: #999;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="30" class="me-2"> 
            <span style="font-weight: 700; font-size: 1.1rem;">SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-sm btn-outline-secondary">Kembali</a>
    </div>
</nav>

<div class="container">
    <div class="text-center">
        <h2 class="header-title">Rencana Pembangunan Daerah (RPD) 2024-2026</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <!-- Gambar Banner RPD (Gunakan file image_0f0df6.png atau banner RPD Sukabumi) -->
        <img src="{{ asset('img/banner_rpd.png') }}" alt="Banner RPD 2024-2026" class="rpd-banner">

        <p>
            Rencana Pembangunan Daerah (RPD) Kota Sukabumi Tahun 2024-2026 merupakan dokumen perencanaan pembangunan menengah daerah transisi yang disusun sebagai pedoman penyelenggaraan pemerintahan dan pembangunan daerah bagi Pemerintah Kota Sukabumi.
        </p>

        <h5 class="fw-bold mt-4">Fokus Utama RPD:</h5>
        <ol class="mt-2">
            <li>Peningkatan kualitas SDM yang berdaya saing dan berakhlak mulia.</li>
            <li>Pemantapan pertumbuhan ekonomi daerah berbasis potensi lokal dan ekonomi kreatif.</li>
            <li>Peningkatan kualitas infrastruktur wilayah yang terintegrasi dan berwawasan lingkungan.</li>
            <li>Transformasi tata kelola pemerintahan yang dinamis dan inovatif.</li>
        </ol>

        <div class="mt-5 border-top pt-4">
            <p class="fw-bold text-center">Unduh Dokumen Lengkap:</p>
            <div class="text-center">
                <a href="#" class="btn btn-dark px-4 py-2">
                    <i class="bi bi-download me-2"></i> Download Dokumen RPD (.pdf)
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>