<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengusul Penerima Hibah - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif; 
            color: #333;
        }

        /* Navbar Style */
        .navbar-custom {
            background-color: #ffffff !important;
            border-bottom: 3px solid #0056b3;
            padding: 15px 0;
        }

        .navbar-brand-text {
            font-weight: 800;
            color: #0056b3;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        /* Tombol Kembali Solid Kotak sesuai desain sebelumnya */
        .btn-kembali {
            border: 2px solid #212529;
            color: #212529;
            font-weight: 700;
            border-radius: 0;
            padding: 8px 24px;
            text-transform: uppercase;
            font-size: 0.85rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-kembali:hover {
            background-color: #212529;
            color: #ffffff;
        }

        .main-content {
            margin-top: 60px;
            padding-bottom: 80px;
        }

        .header-title {
            border-left: 5px solid #0056b3;
            padding-left: 20px;
            margin-bottom: 40px;
        }

        /* Container PDF Viewer */
        .pdf-viewer-container {
            background: #fff;
            padding: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
        }

        .pdf-frame {
            width: 100%;
            height: 900px; /* Tinggi viewer disesuaikan agar nyaman dibaca */
            border: none;
        }

        @media (max-width: 768px) {
            .pdf-frame {
                height: 550px;
            }
        }

        footer {
            padding: 25px 0;
            background: #212529;
            color: #888;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar-custom shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="45" class="me-3">
            <span class="navbar-brand-text">SETDA KOTA SUKABUMI</span>
        </div>
        
        <a href="{{ url('/') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</nav>

<main class="main-content">
    <div class="container">
        <div class="header-title">
            <h1 class="fw-bold m-0 text-uppercase">Pengusul Penerima Hibah</h1>
            <p class="text-muted m-0">Daftar Rekapitulasi Pengusul Hibah Tahun Anggaran 2025</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="pdf-viewer-container">
                    <iframe 
                        src="https://portal.sukabumikota.go.id/wp-content/uploads/2025/12/DAFTAR-REKAP-PENGUSUL-HIBAH-TAHUN-2025.pdf" 
                        class="pdf-frame">
                    </iframe>
                </div>
                <p class="text-center mt-3 text-muted small italic">
                    * Dokumen resmi Sekretariat Daerah Kota Sukabumi.
                </p>
            </div>
        </div>
    </div>
</main>

<footer class="text-center">
    <div class="container">
        <p class="mb-0 small">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>