<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Kebijakan - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        
        /* Header Formal (Seragam) */
        .page-header { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            padding: 50px 0 90px 0; 
            color: #ffffff; 
        }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        
        /* Main Content Card (Seragam) */
        .main-content { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 40px; 
            margin-top: -60px; 
            margin-bottom: 60px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            border-top: 4px solid #0056b3; 
        }
        .section-title { 
            color: #0056b3; 
            font-weight: 800; 
            text-transform: uppercase; 
            border-left: 5px solid #0056b3; 
            padding-left: 15px;
            margin: 30px 0 15px 0;
        }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" 
                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                 alt="Logo" class="logo-img me-3">
            <div>
                <h3 class="fw-bold m-0 text-white">ANALISIS KEBIJAKAN</h3>
                <small class="text-white-50 text-uppercase">Jabatan Fungsional Sekretariat Daerah</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="main-content">
                @if(isset($data))
                    <h4 class="section-title">Tugas Pokok Analis Kebijakan</h4>
                    <p class="text-secondary lh-lg mb-4">
                        {{ $data->tupoksi_utama }}
                    </p>

                    <h4 class="section-title">Rincian Tugas & Peran</h4>
                    <div class="text-secondary lh-lg mt-3">
                        {!! $data->rincian_tugas !!}
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-info-circle fs-1 d-block mb-3"></i>
                        <p>Data Analisis Kebijakan belum diatur.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<footer class="text-center pb-4 text-muted">
    <p class="mb-0">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    <p class="small text-uppercase m-0">Bagian Organisasi Sekretariat Daerah</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>