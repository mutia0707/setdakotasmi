@extends('layouts.app') {{-- Menarik template utama agar tidak duplikat asset --}}

@section('content')
<div class="bg-light py-5">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark text-uppercase tracking-wide display-5 mb-2">
                📸 Galeri Foto Kegiatan
            </h1>
            <p class="text-muted fs-6 shadow-sm d-inline-block px-4 py-2 bg-white rounded-pill border border-light">
                Dokumentasi Resmi Sekretariat Daerah Kota Sukabumi
            </p>
        </div>

        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
            <button class="btn btn-dark rounded-pill px-4 filter-btn active shadow-sm" data-filter="all">Semua</button>
            <button class="btn btn-outline-secondary bg-white text-dark border-light rounded-pill px-4 filter-btn shadow-sm" data-filter="pelayanan">Pelayanan</button>
            <button class="btn btn-outline-secondary bg-white text-dark border-light rounded-pill px-4 filter-btn shadow-sm" data-filter="sosialisasi">Sosialisasi</button>
            <button class="btn btn-outline-secondary bg-white text-dark border-light rounded-pill px-4 filter-btn shadow-sm" data-filter="agenda">Agenda Pimpinan</button>
        </div>

        <div class="row g-4" id="gallery-wrapper">
            @forelse($fotos as $foto)
                <div class="col-12 col-md-6 col-lg-4 gallery-item" data-category="{{ strtolower($foto->kategori) }}">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden custom-card bg-white">
                        
                        <div class="position-relative overflow-hidden img-hover-container" style="height: 240px;">
                            <img src="{{ asset('img_galeri/' . $foto->sumber) }}" 
                                 alt="{{ $foto->judul }}" 
                                 class="w-100 h-100 object-fit-cover transition-all">
                            
                            <span class="position-absolute top-0 start-0 m-3 badge rounded-pill shadow-sm px-3 py-2 text-uppercase fw-bold text-white
                                {{ $foto->kategori === 'pelayanan' ? 'bg-primary' : ($foto->kategori === 'sosialisasi' ? 'bg-success' : 'bg-warning text-dark') }}">
                                {{ $foto->kategori }}
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <h5 class="card-title text-dark fw-bold mb-3 text-line-clamp" style="font-size: 1.1rem; line-height: 1.5;">
                                {{ $foto->judul }}
                            </h5>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top border-light">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i> {{ $foto->created_at ? $foto->created_at->format('d M Y') : date('d M Y') }}
                                </small>
                                <a href="{{ asset('img_galeri/' . $foto->sumber) }}" target="_blank" class="btn btn-sm btn-light text-dark rounded-circle border shadow-sm p-2 d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" title="Lihat Ukuran Penuh">
                                    <i class="bi bi-fullscreen" style="font-size: 0.85rem;"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted mb-3">
                        <i class="bi bi-image display-1 opacity-50"></i>
                    </div>
                    <h4 class="fw-bold text-secondary">Belum Ada Dokumentasi Foto</h4>
                    <p class="text-muted">Foto kegiatan yang di-upload oleh admin akan ditampilkan di sini.</p>
                </div>
            @endforelse
        </div>

    </div>
</div>

<style>
    .transition-all {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .custom-card {
        border-radius: 16px !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.08) !important;
    }
    .img-hover-container img {
        transform: scale(1);
    }
    .custom-card:hover .img-hover-container img {
        transform: scale(1.06);
    }
    .text-line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Atur toggle class aktif tombol saringan
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('btn-dark', 'active');
                    btn.classList.add('btn-outline-secondary', 'bg-white', 'text-dark', 'border-light');
                });
                
                this.classList.remove('btn-outline-secondary', 'bg-white', 'text-dark', 'border-light');
                this.classList.add('btn-dark', 'active');

                const filterValue = this.getAttribute('data-filter');
                const items = document.querySelectorAll('.gallery-item');

                items.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.setProperty('display', 'block', 'important');
                    } else {
                        item.style.setProperty('display', 'none', 'important');
                    }
                });
            });
        });
    });
</script>
@endsection