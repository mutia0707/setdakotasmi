<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPPD - SETDA Kota Sukabumi</title>
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

        /* Styling Poin Kunci */
        .key-point-row {
            padding: 20px 0;
            border-bottom: 1px solid #f2f2f2;
        }

        .key-point-row:last-child {
            border-bottom: none;
        }

        .label-text {
            font-weight: 700;
            color: #000;
        }

        .desc-text {
            color: #555;
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
        
        <!-- Satu Tombol Kembali dengan Panah -->
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
        <h2 class="header-title">Laporan Penyelenggaraan Pemerintahan Daerah (LPPD)</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten -->
    <div class="content-section">
        <p class="intro-text">
            Laporan Penyelenggaraan Pemerintahan Daerah (LPPD) Kota Sukabumi merupakan kewajiban tahunan kepala daerah yang disusun oleh Sekretariat Daerah untuk melaporkan capaian kinerja dan realisasi anggaran kepada pemerintah pusat. Dokumen ini menjadi indikator keberhasilan penyelenggaraan pemerintahan, yang mencakup Standar Pelayanan Minimal (SPM) dan LAKIP.
        </p>

        <h5 class="fw-bold mb-4">Poin Kunci LPPD Kota Sukabumi:</h5>

        <div class="container-fluid px-0">
            <!-- Penyusunan -->
            <div class="row key-point-row mx-0">
                <div class="col-md-3 px-0">
                    <p class="label-text mb-1 mb-md-0">Penyusunan:</p>
                </div>
                <div class="col-md-9 px-0">
                    <p class="desc-text mb-0">Bagian Hukum Setda Kota Sukabumi berperan dalam menghimpun dokumen ini.</p>
                </div>
            </div>

            <!-- Isi -->
            <div class="row key-point-row mx-0">
                <div class="col-md-3 px-0">
                    <p class="label-text mb-1 mb-md-0">Isi:</p>
                </div>
                <div class="col-md-9 px-0">
                    <p class="desc-text mb-0">LPPD memuat capaian kinerja pemerintah daerah dalam satu tahun anggaran, termasuk ringkasan laporan (RLPPD).</p>
                </div>
            </div>

            <!-- Evaluasi -->
            <div class="row key-point-row mx-0">
                <div class="col-md-3 px-0">
                    <p class="label-text mb-1 mb-md-0">Evaluasi:</p>
                </div>
                <div class="col-md-9 px-0">
                    <p class="desc-text mb-0">Pemerintah Kota Sukabumi rutin melakukan evaluasi terhadap LPPD untuk mendorong penguatan pembangunan.</p>
                </div>
            </div>

            <!-- Tujuan -->
            <div class="row key-point-row mx-0">
                <div class="col-md-3 px-0">
                    <p class="label-text mb-1 mb-md-0">Tujuan:</p>
                </div>
                <div class="col-md-9 px-0">
                    <p class="desc-text mb-0">Sebagai bahan evaluasi pusat terhadap kinerja pemerintah daerah serta meningkatkan transparansi dan akuntabilitas.</p>
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