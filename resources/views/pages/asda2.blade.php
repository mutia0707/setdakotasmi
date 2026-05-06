<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASDA II - SETDA Kota Sukabumi</title>
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
                        <img src="{{ asset('img/asda2.jpg') }}" alt="Foto Asda II" class="profile-img shadow-sm">
                        <div class="pejabat-name">MOHAMMAD HASAN ASARI</div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Bagian Tugas Pokok dan Fungsi -->
                <div class="info-row">
                    <div class="info-label">Tugas Pokok dan Fungsi</div>
                    <div class="info-content">
                        Asisten Daerah (Asda) II Bidang Perekonomian dan Pembangunan Setda Kota Sukabumi adalah salah satu unsur pimpinan di Sekretariat Daerah Kota Sukabumi yang membantu Sekretaris Daerah. Jabatan ini bertanggung jawab atas koordinasi perumusan kebijakan, pelayanan administratif, dan pelaksanaan program di bidang ekonomi, pembangunan, dan pengadaan barang/jasa.
                        <br><br>
                        <strong>Informasi Utama:</strong>
                        <ul class="ps-3 mt-2">
                            <li><strong>Tugas Pokok:</strong> Membantu Sekretaris Daerah dalam menyusun kebijakan serta mengoordinasikan pelaksanaan tugas perangkat daerah di bidang perekonomian dan pembangunan.</li>
                            <li><strong>Fungsi:</strong> Mengoordinasikan Bagian Administrasi Perekonomian, Bagian Pembangunan, dan Bagian Pengadaan Barang dan Jasa.</li>
                        </ul>
                        <br>
                        <strong>Contoh Lingkup Kerja:</strong>
                        <ul class="ps-3 mt-2">
                            <li>Memimpin atau menghadiri rapat-rapat terkait pembangunan infrastruktur, evaluasi anggaran pembangunan, dan kebijakan ekonomi.</li>
                            <li>Pelaksanaan fungsi teknis administratif pemerintahan di bidang ekonomi.</li>
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