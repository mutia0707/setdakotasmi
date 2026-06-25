<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ strtoupper($jenis) }} - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        
        /* Header Biru Seragam */
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        
        /* Main Content "Menggantung" */
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #0056b3; }
        
        /* Card Download (Khusus LAKIP) */
        .download-card { padding: 20px; border: 1px solid #eee; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px; transition: all 0.2s; }
        .download-card:hover { border-color: #0056b3; background-color: #fcfcfc; }
        .drive-icon { font-size: 1.8rem; color: #1a73e8; margin-right: 15px; }
        
        footer { margin-top: 20px; color: #999; font-size: 0.85rem; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4" alt="Logo">
            <div>
                <h2 class="fw-bold m-0 text-white">{{ strtoupper($jenis) }}</h2>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold"><i class="bi bi-house-door me-2"></i> BERANDA</a>
    </div>
</div>

<div class="container">
    <div class="main-content">
        <h4 class="fw-bold text-primary mb-4 border-bottom pb-2">{{ strtoupper($jenis) }}</h4>

        @if($jenis == 'lkip')
            <p class="mb-4">Silakan akses dokumen LAKIP melalui folder Google Drive resmi SETDA Kota Sukabumi berikut:</p>
            @forelse($data as $item)
                <div class="download-card shadow-sm">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-google-drive drive-icon"></i>
                        <div>
                            <h6 class="mb-0 fw-bold">LAKIP SETDA TAHUN {{ $item->tahun ?? '-' }}</h6>
                        </div>
                    </div>
                    <a href="{{ $item->link_drive ?? '#' }}" target="_blank" class="btn btn-primary btn-sm px-3">Buka Link</a>
                </div>
            @empty
                <p class="text-muted">Belum ada data dokumen LAKIP tersedia.</p>
            @endforelse

        @else
            <div class="content-body">
                @if($data && $data->konten)
                    {!! nl2br(e($data->konten)) !!}
                @else
                    <p class="text-muted">Konten {{ strtoupper($jenis) }} belum tersedia.</p>
                @endif
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