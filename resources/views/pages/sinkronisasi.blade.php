<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinkronisasi Program - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 40px;
            font-size: 1.05rem;
        }

        .sync-item {
            padding: 25px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .sync-item:last-child {
            border-bottom: none;
        }

        .sync-badge {
            background-color: #333;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 10px;
            display: inline-block;
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
        <h2 class="header-title">Sinkronisasi Program & Kebijakan</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <p class="intro-text">
            Sinkronisasi Sekretariat Daerah Kota Sukabumi berfokus pada penyelarasan program pembangunan dengan pemerintah pusat dan provinsi (Jawa Barat), terutama dalam penyusunan RKPD dan APBD 2025 untuk mendukung visi wali kota baru. Langkah ini melibatkan koordinasi intensif antar-SKPD melalui Rakor Pimpinan untuk optimalisasi pelayanan publik.
        </p>

        <h5 class="fw-bold mb-4">Poin Penting Sinkronisasi Setda 2024-2025:</h5>

        <div class="sync-item">
            <span class="sync-badge">KEBIJAKAN</span>
            <h5 class="fw-bold">Penyelarasan Kebijakan Daerah</h5>
            <p>Melakukan penyesuaian APBD dan program pembangunan daerah agar sejalan dengan arah kebijakan Gubernur Jawa Barat serta target pembangunan nasional.</p>
        </div>

        <div class="sync-item">
            <span class="sync-badge">STRATEGIS</span>
            <h5 class="fw-bold">Fokus Rencana Strategis (Renstra)</h5>
            <p>Pelaksanaan Renstra Setda 2024-2026 yang ditujukan untuk meningkatkan kualitas tata kelola pemerintahan yang responsif dan akuntabel.</p>
        </div>

        <div class="sync-item">
            <span class="sync-badge">KOORDINASI</span>
            <h5 class="fw-bold">Koordinasi Administrasi & SKPD</h5>
            <p>Sekretaris Daerah memaksimalkan peran sebagai pengoordinasi administrasi pemerintahan, perekonomian, dan pembangunan guna memastikan sinergi antar-SKPD.</p>
        </div>

        <div class="sync-item">
            <span class="sync-badge">SEKTORAL</span>
            <h5 class="fw-bold">Sinkronisasi Program Sektoral</h5>
            <p>Berkolaborasi dengan instansi sektoral seperti Diskumindag dalam sinkronisasi program pusat dan daerah, termasuk dalam upaya pemberdayaan UMKM lokal.</p>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>