<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan dan Hukum - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        .page-header { background: linear-gradient(135deg, #1a3a6b 0%, #1f5c9e 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #1a3a6b; }
        .content-body { line-height: 1.8; font-size: 1.1rem; }
        .header-title { font-size: 1.6rem; font-weight: 700; color: #1a3a6b; text-transform: uppercase; margin-bottom: 10px; }
        .divider { width: 60px; height: 4px; background: #1a3a6b; margin: 0 auto 30px; border-radius: 2px; }
        .badge-jenis { background-color: #1a3a6b; color: white; padding: 5px 16px; border-radius: 20px; font-size: 0.85rem; display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">BAGIAN PELAYANAN DAN HUKUM</h2>
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
        <div class="text-center mb-4">
            <span class="badge-jenis"><i class="bi bi-shield-check me-1"></i> Pelayanan dan Hukum</span>
            <h2 class="header-title">{{ str_replace('_', ' ', strtoupper($jenis)) }}</h2>
            <div class="divider"></div>
        </div>

        <div class="content-body">
            @if($data)
                <div class="intro-text mb-4">
                    {!! $data->deskripsi ?? 'Konten untuk bagian ini belum diisi oleh Admin.' !!}
                </div>

                @if(!empty($data->file_pdf))
                    <div class="mt-4 text-center">
                        <a href="{{ asset('storage/' . $data->file_pdf) }}" class="btn btn-danger px-4" target="_blank">
                            <i class="bi bi-file-pdf me-2"></i> Download Dokumen PDF
                        </a>
                    </div>
                @endif
            @else
                <p class="text-muted text-center">Data masih kosong.</p>
            @endif
        </div>
    </div>
</div>

<footer class="text-center mt-5 py-4 border-top">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>