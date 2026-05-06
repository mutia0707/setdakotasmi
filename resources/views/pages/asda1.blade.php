<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASDA I - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Roboto, sans-serif; 
            color: #000000; 
        }

        .navbar { 
            background-color: #ffffff !important; 
            border-bottom: 3px solid #0056b3; 
            padding: 10px 0; 
        }

        .content-card { 
            background: #ffffff;
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); 
            padding: 50px; 
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .profile-img {
            width: 250px;
            height: 320px;
            object-fit: cover;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .pejabat-name {
            font-weight: 800;
            font-size: 1.2rem;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .info-row {
            display: flex;
            margin-bottom: 20px;
        }

        .info-label {
            width: 180px;
            font-weight: 700;
            flex-shrink: 0;
            text-transform: capitalize;
        }

        .info-content {
            flex-grow: 1;
            text-align: justify;
            line-height: 1.8;
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
            <span style="font-weight: 800; color: #0056b3;">SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-4">
            <i class="bi bi-arrow-left me-1"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="content-card">
                <!-- Bagian Foto Pejabat -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="info-label">Nama Pejabat</p>
                    </div>
                    <div class="col-md-8 text-center">
                        <!-- Gunakan file image_1e0dd3.jpg atau sesuaikan dengan path foto Fajar Rajasa -->
                        <img src="{{ asset('img/image_1e0dd3.jpg') }}" alt="Foto Asda I" class="profile-img shadow-sm">
                        <div class="pejabat-name">FAJAR RAJASA, S.STP., M.Si.</div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Bagian Tugas Pokok dan Fungsi -->
                <div class="info-row">
                    <div class="info-label">Tugas Pokok dan Fungsi</div>
                    <div class="info-content">
                        Asisten Daerah Bidang Pemerintahan dan Kesejahteraan Rakyat (Asda I) Setda Kota Sukabumi adalah jabatan strategis yang membawahi bidang pemerintahan, hukum, dan kesra. Berdasarkan data per 2025, posisi ini fokus pada koordinasi kebijakan daerah, pemutakhiran data pemilih, serta pelayanan kemasyarakatan.
                        <br><br>
                        <strong>Rincian Peran:</strong>
                        <ul class="ps-3 mt-2">
                            <li><strong>Pemerintahan & Hukum:</strong> Membantu Sekretaris Daerah dalam menyusun kebijakan bidang pemerintahan dan hukum, termasuk sosialisasi produk hukum daerah.</li>
                            <li><strong>Kesejahteraan Rakyat (Kesra):</strong> Mengoordinasikan perangkat daerah terkait untuk pelayanan masyarakat dan peningkatan kesejahteraan.</li>
                            <li><strong>Koordinasi Khusus:</strong> Sering bertindak dalam kunjungan kerja KPU, peninjauan hasil kerja pemda, serta membuka kegiatan komunitas maupun pendidikan.</li>
                        </ul>
                    </div>
                </div>
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