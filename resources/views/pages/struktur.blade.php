<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Roboto, sans-serif; 
            color: #333; 
        }

        .navbar { 
            background-color: #ffffff !important; 
            border-bottom: 3px solid #0056b3; 
            padding: 10px 0; 
        }

        .header-section {
            background: #ffffff;
            padding: 30px 0;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 30px;
        }

        .content-card { 
            background: #ffffff;
            border-radius: 12px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
            padding: 40px; 
            margin-bottom: 50px;
        }

        .title-line {
            height: 4px;
            width: 80px;
            background-color: #0056b3;
            margin: 15px auto;
        }

        .img-container {
            background: #fdfdfd;
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 20px;
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }

        .img-container:hover {
            transform: scale(1.01);
        }

        .struktur-img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .legend-box {
            background: #f1f8ff;
            border-left: 5px solid #0056b3;
            padding: 15px;
            margin-top: 25px;
            font-size: 0.95rem;
        }

        footer {
            padding: 30px 0;
            color: #666;
            font-size: 0.85rem;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="35" class="me-3"> 
            <span style="font-weight: 800; color: #0056b3;">SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-4">
            <i class="bi bi-arrow-left me-1"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="header-section text-center">
    <div class="container">
        <h2 class="fw-bold text-uppercase mb-0">Struktur Organisasi</h2>
        <div class="title-line"></div>
        <p class="text-muted">Sekretariat Daerah Kota Sukabumi</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            
            <div class="content-card">
                <div class="text-center mb-4">
                    <p class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Klik gambar untuk memperbesar tampilan bagan</p>
                </div>

                <!-- Pastikan nama file gambar sesuai dengan yang ada di folder public/img -->
                <div class="img-container">
                    <a href="{{ asset('img/struktur_organisasi.png') }}" target="_blank">
                        <img src="{{ asset('img/struktur_organisasi.png') }}" alt="Bagan Struktur Organisasi SETDA" class="struktur-img">
                    </a>
                </div>

                <div class="legend-box mt-5">
                    <h5 class="fw-bold"><i class="bi bi-journal-text me-2"></i>Keterangan Struktur:</h5>
                    <p class="mb-0">Berdasarkan bagan di atas, Sekretariat Daerah dipimpin oleh <strong>Sekretaris Daerah</strong> yang membawahi:</p>
                    <ul class="mt-2">
                        <li><strong>Asisten Pemerintahan dan Kesejahteraan Rakyat (Asda I)</strong></li>
                        <li><strong>Asisten Perekonomian dan Pembangunan (Asda II)</strong></li>
                        <li><strong>Asisten Administrasi Umum (Asda III)</strong></li>
                        <li>Serta berbagai Bagian dan Kelompok Jabatan Fungsional lainnya.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<footer class="text-center bg-white">
    <p class="mb-0">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    <p class="small text-uppercase m-0">Bagian Organisasi Sekretariat Daerah</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>