<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->judul }} - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }

        /* Header Biru Khas */
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 50px 0 90px 0; color: #ffffff; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }

        /* Konten Utama */
        .main-content { background: #ffffff; border-radius: 12px; padding: 40px; margin-top: -60px; margin-bottom: 60px; box-shadow: 0 5px 20px rgba(0,0,0,0.07); border-top: 4px solid #0056b3; }

        .badge-bagian { background-color: #e7f1ff; color: #0056b3; font-weight: 600; font-size: 0.75rem; padding: 5px 12px; border-radius: 50px; }

        .berita-gambar { width: 100%; max-height: 450px; object-fit: cover; border-radius: 12px; margin-bottom: 30px; }

        .berita-isi { font-size: 1.05rem; line-height: 1.9; color: #333; white-space: pre-line; }

        .btn-kembali { background-color: #0056b3; color: white; border-radius: 50px; font-weight: 600; padding: 8px 20px; }
        .btn-kembali:hover { background-color: #004494; color: white; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" alt="Logo" class="logo-img me-3">
            <div>
                <h3 class="fw-bold m-0 text-white">BERITA KOTA</h3>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="main-content">

                <a href="{{ route('berita.index') }}" class="btn btn-kembali mb-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
                </a>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <small class="text-primary fw-bold">
                        <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                    </small>
                    @if($item->bagian)
                        <span class="badge-bagian">
                            <i class="bi bi-person-badge me-1"></i>{{ $item->bagian }}
                        </span>
                    @endif
                </div>

                <h2 class="fw-bold text-dark mb-4">{{ $item->judul }}</h2>

                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="berita-gambar" alt="{{ $item->judul }}">
                @endif

                <div class="berita-isi">
                    {{ $item->isi_berita }}
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>