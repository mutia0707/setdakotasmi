<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pokok & Fungsi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; }
        
        /* Header Formal */
        .page-header { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            padding: 60px 0 110px 0; 
            color: #ffffff; 
        }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        
        /* Konten dengan aksen formal */
        .main-content { 
            background: #ffffff; 
            border-radius: 8px; 
            padding: 60px; 
            margin-top: -70px; 
            margin-bottom: 60px; 
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            border-top: 4px solid #0056b3; /* Aksen resmi */
        }
        
        /* Typography */
        .content-body { line-height: 2; font-size: 1.1rem; color: #444; }
        .section-title { color: #0056b3; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 25px; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" 
                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                 alt="Logo" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">TUGAS POKOK & FUNGSI</h2>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    @if(isset($data) && $data)
        {{-- Jika data ada, tampilkan --}}
        <div>{!! $data->tupoksi !!}</div>
    @else
        {{-- Jika data kosong di database --}}
        <p>Data masih kosong.</p>
    @endif
</div>
        
        <!-- Tambahan Footer Dokumen -->
        <div class="mt-5 pt-4 border-top text-center text-muted">
            <small>© 2026 Sekretariat Daerah Kota Sukabumi. Dokumen Resmi Instansi.</small>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>