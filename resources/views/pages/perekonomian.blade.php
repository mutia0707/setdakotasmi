<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pejabat - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #0056b3; }
        .profile-img { width: 220px; height: 280px; object-fit: cover; border-radius: 5px; border: 3px solid #eee; }
        .content-body { line-height: 1.8; font-size: 1.1rem; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">PROFIL PEJABAT</h2>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold"><i class="bi bi-house-door me-2"></i> BERANDA</a>
    </div>
</div>

<div class="container py-5">
    <div class="text-center">
        <h2 class="header-title">PELAYANAN {{ $judul }}</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <div class="intro-text mb-4">
            {!! $data->konten ?? 'Konten untuk bagian ini belum diisi oleh Admin.' !!}
        </div>

        @if(isset($data->file_pdf))
            <div class="mt-4 text-center">
                <a href="{{ asset('storage/' . $data->file_pdf) }}" class="btn btn-danger" target="_blank">
                    <i class="bi bi-file-pdf"></i> Download Dokumen PDF
                </a>
            </div>
        @endif
    </div>
</div>

<footer class="text-center mt-5 py-4 border-top">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>