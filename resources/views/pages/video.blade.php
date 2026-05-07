<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video - SETDA Kota Sukabumi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffffff; font-family: 'Segoe UI', sans-serif; }
        
        .page-header { 
            background: #f8f9fa; 
            padding: 40px 0 30px 0; 
            border-bottom: 1px solid #eee; 
            margin-bottom: 40px; 
        }

        .header-top {
            display: flex;
            justify-content: flex-end; 
            margin-bottom: 10px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #666;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            padding: 5px 15px;
        }
        .btn-back:hover { color: #222; transform: translateX(5px); }

        .header-title { font-weight: 800; color: #222; text-transform: uppercase; letter-spacing: 1px; }
        
        /* Filter Style */
        .filter-btn { border: none; background: none; padding: 8px 25px; font-weight: 600; color: #666; border-radius: 20px; transition: all 0.3s; cursor: pointer; }
        .filter-btn.active, .filter-btn:hover { background: #222; color: #fff; }

        /* Video Item */
        .video-item { position: relative; border-radius: 12px; overflow: hidden; margin-bottom: 20px; background: #000; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .video-container { position: relative; width: 100%; padding-bottom: 56.25%; /* 16:9 Aspect Ratio */ height: 0; }
        .video-container iframe, .video-container video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
        
        .video-info { padding: 12px; background: #fff; border-top: 1px solid #eee; }
        .video-title { font-size: 0.9rem; font-weight: 600; color: #333; margin-bottom: 5px; }
        .video-tag { font-size: 0.75rem; color: #007bff; font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>

<header class="page-header">
    <div class="container">
        <div class="header-top">
            <a href="{{ url()->previous() }}" class="btn-back">
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
    <!-- Filter -->
    <div class="text-center mb-5">
        <button class="filter-btn active" data-filter="semua">Semua</button>
        <button class="filter-btn" data-filter="pelayanan">Pelayanan</button>
        <button class="filter-btn" data-filter="sosialisasi">Sosialisasi</button>
        <button class="filter-btn" data-filter="agenda">Agenda Pimpinan</button>
    </div>

    <div class="row g-4" id="gallery-wrapper">
        
        <!-- PELAYANAN (5 VIDEO) -->
        @for ($i = 1; $i <= 5; $i++)
        <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="pelayanan">
            <div class="video-item">
                <div class="video-container">
                    <!-- Ganti src dengan link video asli kamu -->
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <span class="video-tag">Pelayanan</span>
                    <div class="video-title">Dokumentasi Layanan Publik Ke-{{ $i }}</div>
                </div>
            </div>
        </div>
        @endfor

        <!-- SOSIALISASI (5 VIDEO) -->
        @for ($i = 1; $i <= 5; $i++)
        <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="sosialisasi">
            <div class="video-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <span class="video-tag">Sosialisasi</span>
                    <div class="video-title">Sosialisasi Program Kerja Ke-{{ $i }}</div>
                </div>
            </div>
        </div>
        @endfor

        <!-- AGENDA PIMPINAN (5 VIDEO) -->
        @for ($i = 1; $i <= 5; $i++)
        <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="agenda">
            <div class="video-item">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <span class="video-tag">Agenda Pimpinan</span>
                    <div class="video-title">Liputan Kegiatan Pimpinan Ke-{{ $i }}</div>
                </div>
            </div>
        </div>
        @endfor

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