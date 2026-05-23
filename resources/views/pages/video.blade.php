@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark text-uppercase tracking-wide display-5 mb-2">
                🎥 Galeri Video Kegiatan
            </h1>
            <p class="text-muted fs-6 shadow-sm d-inline-block px-4 py-2 bg-white rounded-pill border border-light">
                Dokumentasi Video Resmi Sekretariat Daerah Kota Sukabumi
            </p>
        </div>

        <div class="row g-4">
            @forelse($videos as $video)
                <div class="col-12 col-md-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-4 bg-white">
                        
                        <div class="ratio ratio-16x9 bg-dark">
                            <video controls preload="metadata" class="w-100 h-100">
                                <source src="{{ asset('video_galeri/' . $video->sumber) }}" type="video/mp4">
                                Browser kamu tidak mendukung pemutar video HTML5.
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
                    <div class="text-muted mb-3"><i class="bi bi-film display-1 opacity-50"></i></div>
                    <h4 class="fw-bold text-secondary">Belum Ada Dokumentasi Video</h4>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection