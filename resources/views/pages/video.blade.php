<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        
        /* Header Biru Konsisten */
        .hero-header { background-color: #0056b3; padding: 50px 0; color: white; border-bottom: 5px solid #004494; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        
        /* Kartu Video */
        .custom-card { border-radius: 16px !important; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .custom-card:hover { transform: translateY(-5px); box-shadow: 0 1rem 2rem rgba(0,0,0,0.1) !important; }
        .ratio { border-radius: 16px 16px 0 0; overflow: hidden; }
    </style>
</head>
<body>

<div class="hero-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" 
                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                 alt="Logo" class="logo-img me-3">
            <h3 class="fw-bold m-0 text-uppercase">GALERI VIDEO KEGIATAN</h3>
        </div>
        <a href="{{ url('/') }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @forelse($videos as $video)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card h-100 border-0 shadow-sm custom-card bg-white overflow-hidden">
                    <div class="ratio ratio-16x9 bg-dark">
                        <video controls preload="metadata" class="w-100 h-100">
                            <source src="{{ asset('video_galeri/' . $video->sumber) }}" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    </div>
                    <div class="card-body p-4">
                        <span class="badge bg-danger rounded-pill px-3 py-2 text-uppercase mb-2 fw-bold" style="font-size: 0.75rem;">
                            {{ $video->kategori }}
                        </span>
                        <h5 class="card-title text-dark fw-bold mb-0 mt-1" style="font-size: 1.1rem; line-height: 1.4;">
                            {{ $video->judul }}
                        </h5>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h4 class="text-secondary">Belum Ada Dokumentasi Video</h4>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>