<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghargaan - SETDA Kota Sukabumi</title>
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
        .award-card { background: #fff; border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: 0.3s; height: 100%; overflow: hidden; }
        .award-card:hover { transform: translateY(-8px); box-shadow: 0 12px 30px rgba(0,0,0,0.15); }
        .img-container { padding: 25px; background: #f8f9fa; text-align: center; border-bottom: 1px solid #eee; }
        .img-container img { max-width: 100%; height: 200px; object-fit: cover; border-radius: 6px; border: 1px solid #ddd; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .img-placeholder { height: 200px; display: flex; align-items: center; justify-content: center; color: #ccc; font-size: 4rem; }
        .award-info { padding: 20px; text-align: center; }
        .award-tahun { font-size: 0.8rem; color: #0066cc; font-weight: 700; text-transform: uppercase; margin-bottom: 8px; display: block; background: #eaf2ff; border-radius: 20px; padding: 3px 12px; display: inline-block; }
        .award-name { font-weight: 700; font-size: 1rem; color: #222; line-height: 1.5; margin-top: 8px; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4">
            <div>
                <h2 class="fw-bold m-0 text-white">PENGHARGAAN</h2>
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
            <span class="badge-jenis"><i class="bi bi-trophy-fill me-1"></i> Prestasi & Penghargaan</span>
            <h2 class="header-title">Dokumentasi Penghargaan</h2>
            <div class="divider"></div>
        </div>

        @if($data->count() > 0)
        <div class="row g-4">
            @foreach($data as $item)
            <div class="col-md-6 col-lg-4">
                <div class="award-card">
                    <div class="img-container">
                        @if($item->foto)
                            <img src="{{ asset('img/penghargaan/' . $item->foto) }}" alt="{{ $item->nama }}">
                        @else
                            <div class="img-placeholder">
                                <i class="bi bi-trophy"></i>
                            </div>
                        @endif
                    </div>
                    <div class="award-info">
                        <span class="award-tahun">Tahun {{ $item->tahun }}</span>
                        <h5 class="award-name">{{ $item->nama }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-trophy" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Belum ada penghargaan yang tersedia.</p>
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