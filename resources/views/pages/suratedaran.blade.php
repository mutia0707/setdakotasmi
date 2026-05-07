<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Edaran Wali Kota - SETDA Kota Sukabumi</title>
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

        /* Tombol Kembali Solid Kotak Sesuai Request */
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
            margin-top: 80px;
            padding-bottom: 100px;
        }

        .header-title {
            border-left: 5px solid #0056b3;
            padding-left: 20px;
            margin-bottom: 50px;
        }

        /* Card Link External */
        .external-link-card {
            background: #fff;
            border: none;
            border-radius: 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 50px 40px;
            text-align: center;
            border-top: 5px solid #0056b3;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: #f0f7ff;
            color: #0056b3;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 25px;
            font-size: 1.8rem;
        }

        .btn-link-eksternal {
            background-color: #0056b3;
            color: white;
            border-radius: 0;
            padding: 14px 40px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-link-eksternal:hover {
            background-color: #003d80;
            color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        footer {
            padding: 30px 0;
            background: #212529;
            color: #888;
            margin-top: auto;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar-custom">
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
            <h1 class="fw-bold m-0 text-uppercase">Surat Edaran Wali Kota</h1>
            <p class="text-muted m-0">Informasi regulasi dan dokumen resmi pemerintah</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="external-link-card">
                    <div class="icon-box">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Portal JDIH Kota Sukabumi</h3>
                    <p class="text-muted mb-4">
                        Seluruh daftar dan dokumen Surat Edaran Wali Kota Sukabumi dapat diakses secara lengkap melalui website JDIH (Jaringan Dokumentasi dan Informasi Hukum).
                    </p>
                    
                    <a href="https://jdih.sukabumikota.go.id/dokumentasi-informasi?p=1&c=a84934b4-ccd0-4e52-8103-a73531e1a037&sc=5f12bb3f-cb84-4633-8ee3-efbddcfbbde7&q=&n=" target="_blank" class="btn-link-eksternal">
                        Lihat Daftar Surat Edaran <i class="bi bi-box-arrow-up-right ms-2"></i>
                    </a>
                </div>
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