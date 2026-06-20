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

<div class="container">
    <div class="main-content">
        @if($data)
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Pejabat" class="profile-img mb-3">
                    <h4 class="fw-bold text-primary">{{ $data->nama_pejabat }}</h4>
                </div>
                <div class="col-md-8 content-body">
                    <h5 class="fw-bold border-bottom pb-2">Tugas Pokok & Fungsi</h5>
                    <div class="mt-3">
                        {!! nl2br(e($data->tugas_fungsi)) !!}
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">Data belum tersedia.</p>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>