<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tupoksi - SETDA Kota Sukabumi</title>
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

        .tupoksi-text {
            font-size: 1.05rem;
            margin-bottom: 25px;
            text-align: justify;
            font-weight: 500;
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
        <h1>Tugas Pokok & Fungsi</h1>
        <p class="text-muted m-0">Sekretariat Daerah Kota Sukabumi</p>
        <div class="divider"></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <div class="content-card">
                <h2 class="section-title">Tugas Pokok</h2>
                <p class="tupoksi-text">
                    Membantu Wali Kota dalam merumuskan kebijakan, mengoordinasikan dinas/lembaga teknis, serta memberikan pelayanan administratif pemerintahan di lingkungan Pemerintah Kota Sukabumi.
                </p>

                <h2 class="section-title">Fungsi Utama</h2>
                <ol class="tupoksi-list">
                    <li>
                        <strong>Pengorganisasian Kebijakan:</strong> Menyusun kebijakan daerah dan mengoordinasikan implementasinya secara menyeluruh.
                    </li>
                    <li>
                        <strong>Pelayanan Administrasi:</strong> Mengelola pelayanan administratif seperti tata naskah dinas, kearsipan, dan persuratan di lingkungan pemerintahan.
                    </li>
                    <li>
                        <strong>Pembinaan Aparatur:</strong> Melaksanakan pembinaan Aparatur Sipil Negara (ASN) di lingkungan Pemkot agar mematuhi peraturan perundang-undangan dan meningkatkan kinerja organisasi.
                    </li>
                    <li>
                        <strong>Tata Pemerintahan:</strong> Mengatur jalannya administrasi kewilayahan, pelaksanaan otonomi daerah, serta menjalin kerjasama antar daerah.
                    </li>
                    <li>
                        <strong>Pengoordinasian Perangkat Daerah:</strong> Menjadi jembatan integrasi tugas-tugas antara dinas, badan, hingga tingkat kecamatan agar selaras dengan visi misi kota.
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