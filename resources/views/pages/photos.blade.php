<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        
        /* Header Biru Konsisten */
        .hero-header { background-color: #0056b3; padding: 50px 0; color: white; border-bottom: 5px solid #004494; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        
        /* Kartu Galeri */
        .custom-card { border-radius: 16px !important; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .custom-card:hover { transform: translateY(-6px); box-shadow: 0 1rem 2rem rgba(0,0,0,0.1) !important; }
        .object-fit-cover { object-fit: cover; }
    </style>
</head>
<body>

<div class="hero-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" 
                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                 alt="Logo" class="logo-img me-3">
            <h3 class="fw-bold m-0 text-uppercase">GALERI FOTO KEGIATAN</h3>
        </div>
        <a href="{{ url('/') }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</div>

<div class="container py-5">
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
        <button class="btn btn-dark rounded-pill px-4 filter-btn active" data-filter="all">Semua</button>
        <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn" data-filter="pelayanan">Pelayanan</button>
        <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn" data-filter="sosialisasi">Sosialisasi</button>
        <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn" data-filter="agenda">Agenda Pimpinan</button>
    </div>

    <div class="row g-4" id="gallery-wrapper">
        @forelse($fotos as $foto)
            <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="{{ strtolower($foto->kategori) }}">
                <div class="card h-100 border-0 shadow-sm custom-card bg-white overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height: 240px;">
                        <img src="{{ asset('img_galeri/' . $foto->sumber) }}" alt="{{ $foto->judul }}" class="w-100 h-100 object-fit-cover">
                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill px-3 py-2 text-uppercase fw-bold text-white
                            {{ $foto->kategori === 'pelayanan' ? 'bg-primary' : ($foto->kategori === 'sosialisasi' ? 'bg-success' : 'bg-warning text-dark') }}">
                            {{ $foto->kategori }}
                        </span>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3" style="font-size: 1.1rem; height: 3em; overflow: hidden;">{{ $foto->judul }}</h5>
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $foto->created_at ? $foto->created_at->format('d M Y') : date('d M Y') }}</small>
                            <a href="{{ asset('img_galeri/' . $foto->sumber) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px;">
                                <i class="bi bi-fullscreen"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h4 class="text-secondary">Belum Ada Dokumentasi Foto</h4>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.replace('btn-dark', 'btn-outline-secondary'));
            this.classList.replace('btn-outline-secondary', 'btn-dark');
            const filterValue = this.getAttribute('data-filter');
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.style.display = (filterValue === 'all' || item.getAttribute('data-category') === filterValue) ? 'block' : 'none';
            });
        });
    });
</script>
</body>
</html>