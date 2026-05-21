<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffffff; font-family: 'Segoe UI', sans-serif; }
        .page-header { background: #f8f9fa; padding: 40px 0 30px 0; border-bottom: 1px solid #eee; margin-bottom: 40px; }
        .header-top { display: flex; justify-content: flex-end; margin-bottom: 10px; }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; color: #666; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; padding: 5px 15px; }
        .btn-back:hover { color: #222; transform: translateX(5px); }
        .header-title { font-weight: 800; color: #222; text-transform: uppercase; letter-spacing: 1px; }
        .filter-btn { border: none; background: none; padding: 8px 25px; font-weight: 600; color: #666; border-radius: 20px; transition: all 0.3s; cursor: pointer; }
        .filter-btn.active, .filter-btn:hover { background: #222; color: #fff; }
        .video-item { position: relative; border-radius: 12px; overflow: hidden; margin-bottom: 20px; background: #000; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .video-container { position: relative; width: 100%; padding-bottom: 56.25%; height: 0; }
        .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
        .video-info { padding: 12px; background: #fff; border-top: 1px solid #eee; }
        .video-title { font-size: 0.9rem; font-weight: 600; color: #333; margin-bottom: 5px; }
        .video-tag { font-size: 0.75rem; color: #007bff; font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>

<header class="page-header">
    <div class="container">
        <div class="header-top">
            <a href="{{ url('/') }}" class="btn-back">
                Kembali ke Beranda <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="text-center">
            <h1 class="header-title">Galeri Video Kegiatan</h1>
            <p class="text-muted">Dokumentasi Video Dokumenter Pemerintah Kota Sukabumi</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="text-center mb-5">
        <button class="filter-btn active" data-filter="semua">Semua</button>
        <button class="filter-btn" data-filter="pelayanan">Pelayanan</button>
        <button class="filter-btn" data-filter="sosialisasi">Sosialisasi</button>
        <button class="filter-btn" data-filter="agenda">Agenda Pimpinan</button>
    </div>

    <div class="row g-4" id="gallery-wrapper">
        @forelse($videos as $video)
        <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="{{ $video->kategori }}">
            <div class="video-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/{{ $video->sumber }}" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <span class="video-tag text-primary">{{ $video->kategori }}</span>
                    <div class="video-title">{{ $video->judul }}</div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5 fw-bold">
            <i class="bi bi-play-circle display-4 d-block mb-2"></i> Belum ada data link video dokumentasi yang diunggah.
        </div>
        @endforelse
    </div>
</div>

<footer class="text-center mt-5 mb-4 text-muted">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const selectedFilter = this.getAttribute('data-filter');
                galleryItems.forEach(item => {
                    if (selectedFilter === 'semua' || item.getAttribute('data-category') === selectedFilter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
</body>
</html>