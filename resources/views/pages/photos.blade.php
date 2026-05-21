<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffffff; font-family: 'Segoe UI', sans-serif; }
        .page-header { background: #f8f9fa; padding: 40px 0 30px 0; border-bottom: 1px solid #eee; margin-bottom: 40px; }
        .header-top { display: flex; justify-content: flex-end; margin-bottom: 10px; }
        .btn-back { display: inline-flex; align-items: center; gap: 8px; color: #666; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; padding: 5px 15px; border-radius: 8px; }
        .btn-back:hover { color: #222; background: #eee; transform: translateX(5px); }
        .header-title { font-weight: 800; color: #222; text-transform: uppercase; letter-spacing: 1px; }
        .filter-btn { border: none; background: none; padding: 8px 25px; font-weight: 600; color: #666; border-radius: 20px; transition: all 0.3s; cursor: pointer; }
        .filter-btn.active, .filter-btn:hover { background: #222; color: #fff; }
        .gallery-item { transition: all 0.4s ease; }
        .photo-item { position: relative; border-radius: 12px; overflow: hidden; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .photo-img-container { aspect-ratio: 1/1; background: #eee; }
        .photo-img-container img { width: 100%; height: 100%; object-fit: cover; }
        .photo-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); padding: 15px; color: white; opacity: 0; transition: 0.3s; }
        .photo-item:hover .photo-overlay { opacity: 1; }
        .photo-caption { font-size: 0.85rem; font-weight: 600; margin: 0; }
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
            <h1 class="header-title">Galeri Foto Kegiatan</h1>
            <p class="text-muted">Dokumentasi resmi Sekretariat Daerah Kota Sukabumi</p>
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
        @forelse($fotos as $foto)
        <div class="col-6 col-md-4 col-lg-3 gallery-item" data-category="{{ $foto->kategori }}">
            <div class="photo-item">
                <div class="photo-img-container">
                    <img src="{{ asset('img_galeri/' . $foto->sumber) }}" alt="Foto">
                </div>
                <div class="photo-overlay">
                    <p class="photo-caption">{{ $foto->judul }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5 fw-bold">
            <i class="bi bi-image display-4 d-block mb-2"></i> Belum ada data foto kegiatan yang diunggah.
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