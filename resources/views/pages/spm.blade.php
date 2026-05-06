<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM - SETDA Kota Sukabumi</title>
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
            margin-bottom: 50px;
            font-size: 1.05rem;
            color: #444;
        }

        /* Styling Kartu Download */
        .download-card {
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            transition: all 0.2s ease-in-out;
        }

        .download-card:hover {
            background-color: #fcfcfc;
            border-color: #ccc;
            transform: translateY(-2px);
        }

        .file-info {
            display: flex;
            align-items: center;
        }

        .drive-icon {
            font-size: 2rem;
            color: #1a73e8;
            margin-right: 15px;
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
        <h2 class="header-title">Standar Pelayanan Minimal (SPM)</h2>
        <div class="divider"></div>
    </div>

    <!-- Konten -->
    <div class="content-section">
        <p class="intro-text">
            Pemerintah Kota Sukabumi, melalui Sekretariat Daerah, menerapkan Standar Pelayanan Minimal (SPM) berdasarkan Rencana Aksi Daerah (RAD) Penerapan SPM Kota Sukabumi Tahun 2024-2029. Fokus utamanya adalah meningkatkan capaian pelayanan dasar, dan Kota Sukabumi aktif dalam evaluasi regional maupun nasional, termasuk menghadiri SPM Awards 2025 untuk memastikan kualitas layanan publik.
        </p>

        <h5 class="fw-bold mb-4">Arsip Dokumen SPM:</h5>

        <div class="download-list">
            <!-- SPM 2024 -->
            <div class="download-card">
                <div class="file-info">
                    <i class="bi bi-google-drive drive-icon"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">SPM KOTA SUKABUMI TAHUN 2024</h6>
                        <small class="text-muted">Akses Folder Google Drive</small>
                    </div>
                </div>
                <a href="https://drive.google.com/..." target="_blank" class="btn btn-sm btn-dark">Buka Link</a>
            </div>

            <!-- SPM 2023 -->
            <div class="download-card">
                <div class="file-info">
                    <i class="bi bi-google-drive drive-icon"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">SPM KOTA SUKABUMI TAHUN 2023</h6>
                        <small class="text-muted">Akses Folder Google Drive</small>
                    </div>
                </div>
                <a href="https://drive.google.com/..." target="_blank" class="btn btn-sm btn-dark">Buka Link</a>
            </div>

            <!-- SPM 2022 -->
            <div class="download-card">
                <div class="file-info">
                    <i class="bi bi-google-drive drive-icon"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">SPM KOTA SUKABUMI TAHUN 2022</h6>
                        <small class="text-muted">Akses Folder Google Drive</small>
                    </div>
                </div>
                <a href="https://drive.google.com/..." target="_blank" class="btn btn-sm btn-dark">Buka Link</a>
            </div>

            <!-- SPM 2021 -->
            <div class="download-card">
                <div class="file-info">
                    <i class="bi bi-google-drive drive-icon"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">SPM KOTA SUKABUMI TAHUN 2021</h6>
                        <small class="text-muted">Akses Folder Google Drive</small>
                    </div>
                </div>
                <a href="https://drive.google.com/..." target="_blank" class="btn btn-sm btn-dark">Buka Link</a>
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