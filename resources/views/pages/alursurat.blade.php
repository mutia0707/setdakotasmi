<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alur Pelayanan Surat - SETDA Kota Sukabumi</title>
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

        /* Timeline / Step Styling */
        .timeline {
            position: relative;
            padding-left: 40px;
            margin-bottom: 50px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #ebebeb;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-dot {
            position: absolute;
            left: -33px;
            top: 5px;
            width: 18px;
            height: 18px;
            background: #fff;
            border: 3px solid #333;
            border-radius: 50%;
            z-index: 1;
        }

        .category-header {
            background-color: #fcfcfc;
            border-left: 4px solid #333;
            padding: 12px 20px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .step-title {
            font-weight: 700;
            color: #000;
            margin-bottom: 2px;
            display: block;
        }

        .step-desc {
            color: #666;
            font-size: 0.95rem;
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
    <div class="text-center">
        <h2 class="header-title">Alur Pelayanan Administrasi Surat</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <p class="intro-text">
            Alur pelayanan surat di Sekretariat Daerah (Setda) Kota Sukabumi umumnya mengikuti prosedur tata naskah dinas, meliputi penerimaan, pencatatan, pendistribusian, hingga tindak lanjut surat oleh Bagian Umum/Tata Usaha. Surat masuk dicatat dan diarahkan melalui lembar disposisi, sementara surat keluar melalui proses paraf berjenjang untuk memastikan legalitas sebelum ditandatangani.
        </p>

        <!-- 1. Alur Surat Masuk -->
        <div class="category-header">1. ALUR SURAT MASUK</div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Penerimaan</span>
                <p class="step-desc">Surat masuk diterima oleh bagian persuratan/agenda (Bagian Umum Setda).</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Pencatatan & Agenda</span>
                <p class="step-desc">Surat dicatat dalam buku agenda atau sistem aplikasi persuratan.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Disposisi</span>
                <p class="step-desc">Surat disampaikan kepada pimpinan (Sekda/Asisten) melalui lembar disposisi untuk mendapatkan arahan.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Pendistribusian</span>
                <p class="step-desc">Surat yang telah didisposisi diteruskan ke bagian/bidang teknis terkait untuk ditindaklanjuti.</p>
            </div>
        </div>

        <!-- 2. Alur Surat Keluar -->
        <div class="category-header">2. ALUR SURAT KELUAR</div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Konsep Surat</span>
                <p class="step-desc">Penyusunan konsep surat oleh staf teknis.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Paraf Berjenjang</span>
                <p class="step-desc">Konsep surat melalui verifikasi dan paraf berjenjang dari pejabat teknis hingga kepala bagian terkait untuk memastikan keabsahan.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Penandatanganan</span>
                <p class="step-desc">Surat ditandatangani oleh pejabat yang berwenang (Sekda/Asisten/Wali Kota).</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Pencatatan & Pengiriman</span>
                <p class="step-desc">Surat yang sudah ditandatangani diberi nomor, dicap, dicatat dalam agenda surat keluar, dan dikirimkan ke tujuan.</p>
            </div>
        </div>

        <!-- 3. Layanan Informasi -->
        <div class="category-header">3. LAYANAN INFORMASI / PERMOHONAN PUBLIK</div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Registrasi</span>
                <p class="step-desc">Mengisi formulir permohonan informasi, baik di kantor PPID atau via online di ppid.sukabumikota.go.id.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <span class="step-title">Proses</span>
                <p class="step-desc">PPID Setda akan memproses surat permohonan sesuai ketentuan yang berlaku.</p>
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