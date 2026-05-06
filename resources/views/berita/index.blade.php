@extends('layouts.app') 

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Berita Kota Terbaru</h2>
        <span class="badge bg-primary">{{ count($berita) }} Berita</span>
    </div>

    <div class="row">
        @forelse($berita as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span>No Image</span>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <small class="text-muted mb-2">
                            {{ $item->created_at ? $item->created_at->format('d M Y') : 'Tanggal tidak tersedia' }} | Oleh: {{ $item->pejabat ?? 'Admin' }}
                        </small>
                        
                        <h5 class="card-title fw-bold text-dark">{{ $item->judul }}</h5>
                        
                        <p class="card-text text-muted">
                            {{ Str::limit($item->isi, 100) }}
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-outline-primary w-100">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4">
                    <i class="bi bi-info-circle mb-2"></i>
                    <div>Belum ada berita hari ini dalam database <strong>setdakotasukabumi</strong>.</div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection 