<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Perlengkapan & Rumah Tangga - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        
        /* Header Biru Seragam */
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        
        /* Main Content "Menggantung" */
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #0056b3; }
        
        /* Button Style */
        .btn-sop { padding: 15px 40px; font-weight: 600; border-radius: 50px; transition: all 0.3s; }
        .btn-sop:hover { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        
        footer { margin-top: 20px; color: #999; font-size: 0.85rem; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4" alt="Logo">
            <div>
                <h2 class="fw-bold m-0 text-white">PELAYANAN</h2>
                <small class="text-white-50 text-uppercase">Perlengkapan & Rumah Tangga</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold"><i class="bi bi-house-door me-2"></i> BERANDA</a>
    </div>
</div>

<div class="container">
    <div class="main-content text-center">
        <h4 class="fw-bold text-primary mb-4 border-bottom pb-2">Dokumen SOP Perlengkapan & Rumah Tangga</h4>
        
        @if(isset($data) && $data && $data->file_pdf)
            <p class="mb-4 text-muted">Klik tombol di bawah untuk mengunduh dokumen SOP Pelayanan Perlengkapan dan Rumah Tangga secara resmi.</p>
            <a href="{{ asset($data->file_pdf) }}" target="_blank" class="btn btn-primary btn-sop">
                <i class="bi bi-file-pdf me-2"></i> Download SOP Perlengkapan (PDF)
            </a>
        @else
            <div class="py-5">
                <i class="bi bi-folder-x fs-1 text-secondary"></i>
                <p class="mt-3 text-muted">Dokumen SOP belum tersedia saat ini.</p>
            </div>
        @endif
    </div>
    
    <footer class="text-center">
        <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>