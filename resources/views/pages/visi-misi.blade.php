<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Roboto, sans-serif; 
            color: #000000; 
            line-height: 1.5;
        }

        /* Navbar */
        .navbar { 
            background-color: #ffffff !important; 
            border-bottom: 3px solid #0056b3; 
            padding: 10px 0; 
        }
        .navbar-brand span {
            font-weight: 800;
            color: #0056b3;
        }

        /* Header */
        .header-section {
            padding: 30px 0 20px;
            text-align: center;
        }
        .header-section h1 {
            font-weight: 800;
            color: #000000;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-size: 1.8rem;
        }
        .header-section .divider {
            width: 50px;
            height: 3px;
            background: #000000;
            margin: 15px auto;
        }

        /* Card Styling */
        .content-card { 
            background: #ffffff;
            border-radius: 4px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); 
            padding: 30px 40px; 
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: 800;
            color: #000000;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 1.2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        /* Grid Visi */
        .visi-grid-item {
            padding: 15px;
            border-radius: 4px;
            background: #fdfdfd;
            border: 1px solid #f0f0f0;
            height: 100%;
        }
        .label-iman {
            display: block;
            font-weight: 800;
            font-size: 1.1rem;
            color: #000000;
            margin-bottom: 2px;
        }
        .visi-text {
            color: #000000;
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        /* List Misi Menggunakan Angka */
        .misi-list {
            list-style-type: decimal; /* Menggunakan Angka */
            padding-left: 20px;
        }
        .misi-list li {
            margin-bottom: 8px;
            font-size: 1rem;
            color: #000000;
            font-weight: 500;
        }

        footer {
            padding: 20px 0;
            color: #666;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="35" class="me-3"> 
            <span>SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-4">
            <i class="bi bi-arrow-left me-1"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container">
    <div class="header-section">
        <h1>Visi & Misi</h1>
        <p class="text-muted m-0">Sekretariat Daerah Kota Sukabumi</p>
        <div class="divider"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <div class="content-card">
                <h2 class="section-title text-center">Visi Kota Sukabumi (IMAN)</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="visi-grid-item">
                            <span class="label-iman">Inovatif</span>
                            <p class="visi-text">Menciptakan ide baru dan solusi kreatif dalam pelayanan publik.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="visi-grid-item">
                            <span class="label-iman">Mandiri</span>
                            <p class="visi-text">Kemampuan daerah dalam meningkatkan dan mengelola potensi lokal.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="visi-grid-item">
                            <span class="label-iman">Agamis</span>
                            <p class="visi-text">Memperkuat nilai-nilai agama dalam setiap sendi kehidupan masyarakat.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="visi-grid-item">
                            <span class="label-iman">Nasionalis</span>
                            <p class="visi-text">Menjunjung tinggi semangat persatuan, kesatuan, dan kebangsaan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-card">
                <h2 class="section-title">Misi Pendukung (Setda)</h2>
                <ol class="misi-list"> <li>Meningkatkan kualitas sumber daya manusia (SDM) ASN yang profesional dan berintegritas.</li>
                    <li>Mengembangkan sistem tata kelola pemerintahan yang transparan, efektif, dan akuntabel.</li>
                    <li>Meningkatkan efisiensi dan efektivitas pelayanan administrasi perkantoran.</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<footer class="text-center">
    <p class="mb-0">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    <p class="small text-uppercase m-0">Bagian Organisasi Sekretariat Daerah</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>