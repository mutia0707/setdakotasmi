<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul }} - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #0056b3; }
        .download-card { padding: 20px; border: 1px solid #eee; border-radius: 8px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px; transition: all 0.2s; }
        .download-card:hover { border-color: #0056b3; background-color: #fcfcfc; }
        .drive-icon { font-size: 1.8rem; color: #1a73e8; margin-right: 15px; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4" alt="Logo">
            <div>
                <h2 class="fw-bold m-0 text-white">{{ $judul }}</h2>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="main-content">
        @if($data)
            @if($data->konten)
                <div class="mb-4">{!! nl2br(e($data->konten)) !!}</div>
            @endif

            @if(!empty($data->file_pdf))
                <div class="download-card">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf-fill drive-icon"></i>
                        <span>File Lampiran (PDF)</span>
                    </div>
                    <a href="{{ asset($data->file_pdf) }}" target="_blank" class="btn btn-primary btn-sm">Download</a>
                </div>
            @endif
            @if(!empty($data->gambar))
    <div class="mb-4">
        <img src="{{ asset($data->gambar) }}" class="img-fluid rounded shadow-sm" alt="Dokumentasi">
    </div>
@endif

            @if(!$data->konten && empty($data->file_pdf))
                <p class="text-muted">Konten untuk bagian ini belum diisi oleh Admin.</p>
            @endif
        @else
            <p class="text-muted">Konten untuk bagian ini belum diisi oleh Admin.</p>
        @endif
    </div>
</div>

</body>
</html>