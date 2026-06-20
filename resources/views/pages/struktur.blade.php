<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        
        /* Header Formal */
        .page-header { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            padding: 50px 0 90px 0; 
            color: #ffffff; 
        }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        
        /* Kartu Konten */
        .main-content { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 40px; 
            margin-top: -60px; 
            margin-bottom: 60px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            border-top: 4px solid #0056b3; 
        }
        
        /* Ukuran Gambar yang Pas */
        .struktur-img { 
            max-width: 100%; 
            max-height: 400px; /* Dikecilkan sedikit agar proporsional */
            object-fit: contain;
            transition: 0.3s;
        }
        .img-container:hover .struktur-img { opacity: 0.9; }
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
                <h3 class="fw-bold m-0 text-white">STRUKTUR ORGANISASI</h3>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
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
                
                <div class="text-center mb-5">
                    <div class="img-container bg-light p-3 border rounded shadow-sm d-inline-block">
                        <a href="{{ $data && $data->gambar_struktur ? asset('storage/' . $data->gambar_struktur) : asset('img/struktur_organisasi.png') }}" target="_blank">
                            <img src="{{ $data && $data->gambar_struktur ? asset('storage/' . $data->gambar_struktur) : asset('img/struktur_organisasi.png') }}" 
                                 alt="Bagan Struktur" class="struktur-img">
                        </a>
                        <div class="mt-2 small text-muted fst-italic">
                            <i class="bi bi-zoom-in"></i> Klik gambar untuk memperbesar
                        </div>
                    </div>
                </div>

                <div class="border-start border-primary border-4 ps-4">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="bi bi-diagram-3 me-2"></i>Keterangan Struktur
                    </h5>
                    <div class="text-secondary lh-lg">
                        @if($data && $data->keterangan)
                            {!! nl2br(e($data->keterangan)) !!}
                        @else
                            <p>Berdasarkan bagan di atas, Sekretariat Daerah dipimpin oleh <strong>Sekretaris Daerah</strong> yang membawahi:</p>
                            <ul>
                                <li><strong>Asisten Pemerintahan dan Kesejahteraan Rakyat (Asda I)</strong></li>
                                <li><strong>Asisten Perekonomian dan Pembangunan (Asda II)</strong></li>
                                <li><strong>Asisten Administrasi Umum (Asda III)</strong></li>
                                <li>Serta berbagai Bagian dan Kelompok Jabatan Fungsional lainnya.</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>