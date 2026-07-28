<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Kota - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        
        /* Header Biru Khas */
        .page-header { background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); padding: 50px 0 90px 0; color: #ffffff; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        
        /* Konten Utama */
        .main-content { background: #ffffff; border-radius: 12px; padding: 40px; margin-top: -60px; margin-bottom: 60px; box-shadow: 0 5px 20px rgba(0,0,0,0.07); border-top: 4px solid #0056b3; }
        
        /* Card Berita */
        .card-berita { border: none; transition: 0.3s; border: 1px solid #eee; }
        .card-berita:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card-img-top { height: 200px; object-fit: cover; }
        .btn-detail { background-color: #0056b3; color: white; border-radius: 50px; font-weight: 600; padding: 8px 20px; }
        .btn-detail:hover { background-color: #004494; color: white; }
        .badge-bagian { background-color: #e7f1ff; color: #0056b3; font-weight: 600; font-size: 0.75rem; padding: 5px 12px; border-radius: 50px; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" alt="Logo" class="logo-img me-3">
            <div>
                <h3 class="fw-bold m-0 text-white">BERITA KOTA</h3>
                <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <div>
            @auth
                <a href="{{ route('staff.berita.index') }}" class="btn btn-light text-primary px-3 rounded-pill fw-bold me-2">
                    <i class="bi bi-speedometer2 me-1"></i> Panel Staff
                </a>
            @endauth
            <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
                <i class="bi bi-house-door me-2"></i> BERANDA
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="main-content">
                <h5 class="fw-bold text-primary mb-4 border-bottom pb-2">Daftar Berita Terbaru</h5>
                
                <div class="row g-4">
                    @forelse($beritas as $item)
                        <div class="col-md-4">
                            <div class="card card-berita h-100">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-2">
                                        <!-- Tanggal Berita -->
                                        <div class="text-primary fw-bold small mb-1">
                                            <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </div>
                                        <!-- Info Siapa yang Upload Otomatis -->
                                        <div>
                                            <span class="badge-bagian">
                                                <i class="bi bi-person-fill me-1"></i> Diunggah oleh: {{ $item->user->name ?? $item->user->bagian ?? 'Admin' }}
                                            </span>
                                        </div>
                                    </div>
                                    <h5 class="card-title fw-bold text-dark mt-2">{{ $item->judul }}</h5>
                                    <p class="text-muted small flex-grow-1">
                                        {{ Str::limit($item->isi_berita ?? $item->isi, 100) }}
                                    </p>
                                    <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" class="btn btn-detail mt-3">
                                        Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Belum ada berita yang diterbitkan saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>