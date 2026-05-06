<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilu & Pilkada - SETDA Kota Sukabumi</title>
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

        /* Election Service Styling */
        .election-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            background: #fdfdfd;
            border: 1px solid #f0f0f0;
            transition: transform 0.2s;
        }

        .election-item:hover {
            transform: scale(1.01);
            border-color: #333;
        }

        .icon-box {
            min-width: 50px;
            height: 50px;
            background: #333;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 20px;
        }

        .item-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: #000;
        }

        .item-desc {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 0;
        }

        .date-badge {
            display: inline-block;
            background: #eee;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 20px;
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
        <h2 class="header-title">Fasilitasi Pemilu & Pilkada</h2>
        <div class="date-badge">Data Per April 2026</div>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan Pemilu dan Pilkada oleh Sekretariat Daerah Kota Sukabumi difokuskan pada fasilitasi, koordinasi, dan penguatan sinergitas. Melalui Bagian Pemerintahan, kami memastikan setiap tahapan pemilihan berjalan lancar demi tegaknya demokrasi di Kota Sukabumi.
        </p>

        <!-- List Pelayanan -->
        <div class="election-item">
            <div class="icon-box">
                <i class="bi bi-person-gear"></i>
            </div>
            <div>
                <div class="item-title">Pembentukan Tim Desk Pilkada</div>
                <p class="item-desc">Memimpin Rapat Koordinasi Tim Desk Pilkada untuk memantau, mengantisipasi, dan menyelesaikan berbagai potensi masalah teknis selama tahapan pemilihan berjalan.</p>
            </div>
        </div>

        <div class="election-item">
            <div class="icon-box">
                <i class="bi bi-file-earmark-check"></i>
            </div>
            <div>
                <div class="item-title">Perjanjian Kerja Sama (PKS) dengan KPU</div>
                <p class="item-desc">Memperkuat kolaborasi melalui PKS untuk penggunaan sarana dan prasarana pemerintah, mencakup dukungan dari tingkat kota hingga kecamatan.</p>
            </div>
        </div>

        <div class="election-item">
            <div class="icon-box">
                <i class="bi bi-boxes"></i>
            </div>
            <div>
                <div class="item-title">Dukungan Logistik & Infrastruktur</div>
                <p class="item-desc">Memfasilitasi kebutuhan sarana perkantoran, tempat pertemuan, hingga hibah logistik untuk memastikan operasional penyelenggara pemilu tetap optimal.</p>
            </div>
        </div>

        <div class="election-item">
            <div class="icon-box">
                <i class="bi bi-megaphone"></i>
            </div>
            <div>
                <div class="item-title">Sosialisasi & Simulasi Teknis</div>
                <p class="item-desc">Mendukung penuh kegiatan simulasi pemungutan suara bersama KPU guna memastikan kesiapan dan profesionalisme petugas di lapangan.</p>
            </div>
        </div>

        <div class="election-item">
            <div class="icon-box">
                <i class="bi bi-diagram-3"></i>
            </div>
            <div>
                <div class="item-title">Sinergitas Penguatan Demokrasi</div>
                <p class="item-desc">Menyelaraskan langkah strategis baik pada tahapan utama maupun non-tahapan Pemilu dan Pilkada demi menjaga stabilitas politik daerah.</p>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>