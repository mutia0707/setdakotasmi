@extends('layouts.app')

@section('content')
<style>
    .header-title {
        border-left: 5px solid #0056b3;
        padding-left: 15px;
        margin-bottom: 40px;@extends('layouts.app')

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
    
    @auth
    <div class="card shadow-sm border-0 mb-5 bg-white">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0 fw-bold"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Upload Berita Hari Ini</h5>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="form-label fw-bold small text-secondary">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" required placeholder="Ketik judul berita...">
                    </div>
                    <div class="col-md-5 mb-3 mb-md-0">
                        <label class="form-label fw-bold small text-secondary">Isi Berita</label>
                        <textarea name="isi" class="form-control" rows="1" required placeholder="Tulis rincian berita hari ini..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-secondary">Foto Pendukung</label>
                        <div class="input-group">
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">UPLOAD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth

    <div class="header-title d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold m-0">Berita Kota</h1>
            <p class="text-muted m-0">Menyajikan informasi resmi dari Pemerintah Kota Sukabumi</p>
        </div>
        {{-- Menggunakan total() karena data ditarik menggunakan pagination dari controller --}}
        <span class="badge bg-primary px-3 py-2">{{ $beritas->total() }} Total Berita</span>
    </div>

    <div class="row">
        @forelse($beritas as $item)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-img-container">
                        @if($item->gambar)
                            <img src="/img_berita/{{ $item->gambar }}" class="card-img-top" alt="{{ $item->judul }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <span class="category-tag">
                            <i class="bi bi-person-fill me-1"></i> {{ $item->pejabat ?? 'Admin Kota' }}
                        </span>
                        <h5 class="card-title text-dark">{{ $item->judul }}</h5>
                        <p class="card-text text-secondary small mb-4">
                            {{-- PENYESUAIAN: Menggunakan field 'isi_berita' digabung dengan strip_tags agar tag HTML hilang bersih --}}
                            {{ Str::limit(strip_tags($item->isi_berita ?? $item->isi ?? ''), 120) }}
                        </p>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> 
                                {{ isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
                            </small>
                            {{-- Mengarahkan link detail berita ke parameter 'slug' agar SEO friendly --}}
                            <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" class="btn btn-read-more btn-sm">SELENGKAPNYA</a>
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

    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
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
    
    @auth
    <div class="card shadow-sm border-0 mb-5 bg-white">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0 fw-bold"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Upload Berita Hari Ini</h5>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="form-label fw-bold small text-secondary">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" required placeholder="Ketik judul berita...">
                    </div>
                    <div class="col-md-5 mb-3 mb-md-0">
                        <label class="form-label fw-bold small text-secondary">Isi Berita</label>
                        <textarea name="isi" class="form-control" rows="1" required placeholder="Tulis rincian berita hari ini..."></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-secondary">Foto Pendukung</label>
                        <div class="input-group">
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            <button type="submit" class="btn btn-primary px-4 fw-bold">UPLOAD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth

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
                        {{-- PERBAIKAN STRUKTUR: Sekarang sudah dipisah rapi pakai @else --}}
                        @if($item->gambar)
                            <img src="/img_berita/{{ $item->gambar }}" class="card-img-top" alt="{{ $item->judul }}">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-image" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <span class="category-tag">
                            <i class="bi bi-person-fill me-1"></i> {{ $item->pejabat ?? 'Admin Kota' }}
                        </span>
                        <h5 class="card-title text-dark">{{ $item->judul }}</h5>
                        <p class="card-text text-secondary small mb-4">
                            {{ Str::limit($item->isi, 120) }}
                        </p>
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> 
                                {{ isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
                            </small>
                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-read-more btn-sm">SELENGKAPNYA</a>
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