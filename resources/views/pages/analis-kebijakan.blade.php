<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analis Kebijakan - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Roboto, sans-serif; 
            color: #000000; 
            line-height: 1.6;
        }

        .navbar { 
            background-color: #ffffff !important; 
            border-bottom: 3px solid #0056b3; 
            padding: 10px 0; 
        }
        .navbar-brand span {
            font-weight: 800;
            color: #0056b3;
        }

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
            margin-bottom: 15px;
            text-transform: uppercase;
            font-size: 1.2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .tupoksi-list {
            list-style-type: decimal;
            padding-left: 20px;
        }
        .tupoksi-list li {
            margin-bottom: 12px;
            font-size: 1rem;
            color: #000000;
        }
        .tupoksi-list li strong {
            color: #000000;
            font-weight: 700;
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
        <h1>Analis Kebijakan</h1>
        <p class="text-muted m-0">Jabatan Fungsional Sekretariat Daerah</p>
        <div class="divider"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <div class="content-card">
                <h2 class="section-title">Tugas Pokok Analis Kebijakan</h2>
                <p class="mb-4">
                    Melaksanakan kajian dan analisis kebijakan yang mencakup identifikasi masalah, penyusunan rekomendasi, serta pemantauan dan evaluasi kebijakan daerah.
                </p>

                <h2 class="section-title">Rincian Tugas & Peran</h2>
                <ol class="tupoksi-list">
                    <li>
                        <strong>Penyusunan Bahan Kebijakan:</strong> Mengumpulkan data dan mengolah informasi sebagai bahan perumusan kebijakan strategis daerah.
                    </li>
                    <li>
                        <strong>Kajian Riset & Analisis:</strong> Melakukan penelitian mendalam terhadap isu-isu krusial yang memerlukan penanganan kebijakan dari Walikota atau Sekretaris Daerah.
                    </li>
                    <li>
                        <strong>Penyusunan Rekomendasi Kebijakan:</strong> Membuat naskah akademik atau memo kebijakan (policy brief) untuk memberikan solusi atas permasalahan daerah.
                    </li>
                    <li>
                        <strong>Monitoring & Evaluasi:</strong> Memantau sejauh mana kebijakan yang telah diambil berjalan efektif dan memberikan dampak positif bagi masyarakat.
                    </li>
                    <li>
                        <strong>Konsultasi & Advokasi:</strong> Memberikan saran teknis kebijakan kepada Perangkat Daerah terkait guna sinkronisasi program kerja.
                    </li>
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