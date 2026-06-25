<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Edaran Wali Kota - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 60px 0 110px 0; color: #ffffff; }
        .logo-img { width: 60px; height: 60px; object-fit: contain; }
        .main-content { background: #ffffff; border-radius: 8px; padding: 50px; margin-top: -70px; margin-bottom: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); border-top: 4px solid #004a99; }
        .header-title { font-size: 1.6rem; font-weight: 700; color: #004a99; text-transform: uppercase; margin-bottom: 10px; }
        .divider { width: 60px; height: 4px; background: #004a99; margin: 0 auto 40px; border-radius: 2px; }
        .badge-jenis { background-color: #004a99; color: white; padding: 5px 16px; border-radius: 20px; font-size: 0.85rem; display: inline-block; margin-bottom: 20px; }
        .surat-card { border: none; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); transition: 0.3s; margin-bottom: 15px; }
        .surat-card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
        .badge-tahun { background: #eaf2ff; color: #0066cc; padding: 3px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; }
        .nomor-surat { font-size: 0.82rem; color: #888; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">SURAT EDARAN WALI KOTA</h2>
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
            <span class="badge-jenis"><i class="bi bi-envelope-paper-fill me-1"></i> Surat Edaran</span>
            <h2 class="header-title">Surat Edaran Wali Kota Sukabumi</h2>
            <div class="divider"></div>
        </div>

        @if($data->count() > 0)
            @foreach($data as $item)
            <div class="card surat-card p-3">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-file-earmark-text" style="font-size: 2rem; color: #0066cc;"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">{{ $item->judul }}</h6>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            @if($item->nomor_surat)
                                <span class="nomor-surat"><i class="bi bi-hash me-1"></i>{{ $item->nomor_surat }}</span>
                            @endif
                           <span class="badge-tahun">{{ date('Y', strtotime($item->tanggal)) }}</span>
                        </div>
                    </div>
                    <div>
                        @if($item->file_pdf)
                            <a href="{{ asset('storage/surat_edaran/' . $item->file_pdf) }}"
                               target="_blank"
                               class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        @else
                            <span class="text-muted small">Tidak ada file</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <i class="bi bi-envelope-paper" style="font-size: 3rem; color: #ccc;"></i>
                <p class="text-muted mt-3">Belum ada surat edaran yang tersedia.</p>
            </div>
        @endif
    </div>
</div>

<footer class="text-center mt-5 py-4 border-top">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>