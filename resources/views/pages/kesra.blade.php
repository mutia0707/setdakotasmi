<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagian Kesejahteraan Rakyat - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #004a99; }
        .header-title { font-size: 1.6rem; font-weight: 700; color: #004a99; text-transform: uppercase; margin-bottom: 10px; }
        .divider { width: 60px; height: 4px; background: #004a99; margin: 0 auto 30px; border-radius: 2px; }
        .badge-jenis { background-color: #004a99; color: white; padding: 5px 16px; border-radius: 20px; font-size: 0.85rem; display: inline-block; margin-bottom: 20px; }
        .dokumen-card { border: none; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); transition: 0.3s; margin-bottom: 15px; }
        .dokumen-card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
        .dokumen-icon { font-size: 2rem; color: #dc3545; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">BAGIAN KESEJAHTERAAN RAKYAT</h2>
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
        <div class="text-center mb-5">
            <span class="badge-jenis"><i class="bi bi-heart-pulse-fill me-1"></i> Kesejahteraan Rakyat</span>
            <h2 class="header-title">Dokumen & Informasi</h2>
            <div class="divider"></div>
        </div>

        @if($dokumens->count() > 0)
            <div class="row">
                @foreach($dokumens as $dok)
                <div class="col-md-6">
                    <div class="card dokumen-card p-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-file-earmark-pdf dokumen-icon"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">{{ $dok->judul }}</h6>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($dok->created_at)->format('d M Y') }}</small>
                            </div>
                            <div>
                                <a href="{{ asset('berkas_dokumen/' . $dok->file_pdf) }}"
                                   target="_blank"
                                   class="btn btn-danger btn-sm rounded-pill px-3">
                                    <i class="bi bi-download me-1"></i> Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-folder2-open" style="font-size: 3rem; color: #ccc;"></i>
                <p class="text-muted mt-3">Belum ada dokumen yang tersedia.</p>
            </div>
        @endif
    </div>
</div>

<footer class="text-center mt-5 py-4 border-top">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>