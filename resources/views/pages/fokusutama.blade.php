<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fokus Utama - SETDA Kota Sukabumi</title>
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
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 40px;
            font-size: 1.05rem;
        }

        .fokus-item {
            padding: 25px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .fokus-item:last-child {
            border-bottom: none;
        }

        .fokus-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: #444;
            margin-right: 20px;
            min-width: 40px;
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
        <h2 class="header-title">Fokus Utama Sekretariat Daerah</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <p class="intro-text">
            Fokus utama Sekretariat Daerah (Setda) Kota Sukabumi adalah membantu Wali Kota dalam penyusunan kebijakan, pengoordinasian administrasi, serta pelayanan administratif di lingkungan Pemerintah Kota Sukabumi. Hal ini mencakup peningkatan kualitas produk hukum, penguatan tata kelola pemerintahan, fiskal, dan pelayanan publik.
        </p>

        <h5 class="fw-bold mb-4">Berdasarkan prioritas terupdate, fokus utamanya meliputi:</h5>

        <div class="fokus-item d-flex align-items-start">
            <span class="fokus-number">01</span>
            <div>
                <h5 class="fw-bold">Penguatan Tata Kelola & Kebijakan</h5>
                <p>Meningkatkan kualitas produk hukum daerah melalui harmonisasi dan penguatan tata kelola keuangan serta fiskal.</p>
            </div>
        </div>

        <div class="fokus-item d-flex align-items-start">
            <span class="fokus-number">02</span>
            <div>
                <h5 class="fw-bold">Optimalisasi Layanan Publik</h5>
                <p>Memperkuat kerja sama daerah, meningkatkan transparansi layanan melalui SOP yang jelas, serta mempercepat fasilitasi layanan kerja sama.</p>
            </div>
        </div>

        <div class="fokus-item d-flex align-items-start">
            <span class="fokus-number">03</span>
            <div>
                <h5 class="fw-bold">Koordinasi Strategis</h5>
                <p>Mengkoordinasikan berbagai kegiatan Perangkat Daerah agar selaras dengan visi pemerintah daerah dan mendukung pelayanan publik yang efektif.</p>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>