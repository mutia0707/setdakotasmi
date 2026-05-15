@extends('layouts.app')

@section('content')
<style>
    .header-title {
        border-left: 5px solid #0056b3;
        padding-left: 15px;
        margin-bottom: 40px;
    }
    .card { 
        border: none; 
        border-radius: 10px; 
        overflow: hidden;
        transition: all 0.4s ease;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .card:hover { 
        transform: translateY(-10px); 
        box-shadow: 0 20px 30px rgba(0,0,0,0.1); 
    }
    .card-img-container {
        overflow: hidden;
        height: 230px;
    }
    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .category-tag {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 700;
        color: #0056b3;
        margin-bottom: 10px;
        display: block;
    }
    .card-title {
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 15px;
        height: 55px;
        overflow: hidden;
    }
    .btn-read-more {
        background-color: #0056b3;
        color: white;
        border-radius: 5px;
        font-weight: 600;
        padding: 8px 15px;
        transition: 0.3s;
        text-decoration: none;
    }
    .btn-read-more:hover {
        background-color: #004494;
        color: white;
    }
</style>

<div class="container mt-5">
    <div class="header-title d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold m-0">Berita Kota</h1>
            <p class="text-muted m-0">Menyajikan informasi resmi dari Pemerintah Kota Sukabumi</p>
        </div>
        <span class="badge bg-primary px-3 py-2">{{ count($beritas) }} Total Berita</span>
    </div>

    <div class="row">
        @forelse($beritas as $item)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-img-container">
                        @if($item["gambar"])
                            <img src="{{ asset('storage/'.$item["gambar"]) }}" class="card-img-top" alt="{{ $item["judul"] }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <span class="category-tag">
                            <i class="bi bi-person-fill me-1"></i> {{ $item["pejabat"] ?? 'Admin Kota' }}
                        </span>
                        <h5 class="card-title text-dark">{{ $item["judul"] }}</h5>
                        <p class="card-text text-secondary small mb-4">
                            {{ Str::limit($item["isi"], 120) }}
                        </p>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> 
                                {{ isset($item["created_at"]) ? \Carbon\Carbon::parse($item["created_at"])->format('d M Y') : '-' }}
                            </small>
                            <a href="{{ route('berita.show', $item['id']) }}" class="btn btn-read-more btn-sm">SELENGKAPNYA</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white shadow-sm rounded">
                    <i class="bi bi-newspaper text-muted" style="font-size: 4rem;"></i>
                    <h3 class="mt-3 fw-bold">Belum Ada Berita</h3>
                    <p class="text-muted">Data berita saat ini belum tersedia di database.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection