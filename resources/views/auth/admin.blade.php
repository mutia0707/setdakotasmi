<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        
        /* Navbar Style */
        .navbar-admin { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            border-bottom: 4px solid #003d80; 
        }

        /* Card Menu Utama */
        .card-menu { 
            border: none; border-radius: 20px; transition: 0.3s; height: 100%; display: flex; flex-direction: column; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); color: white;
        }
        .card-menu:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important; }

        /* Gradasi Warna */
        .bg-gradient-dark { background: linear-gradient(135deg, #2c3e50, #4ca1af); }
        .bg-gradient-green { background: linear-gradient(135deg, #11998e, #38ef7d); }

        .icon-box { 
            width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; 
            border-radius: 50%; margin: 0 auto 20px auto; font-size: 1.8rem; background: rgba(255,255,255,0.2); 
        }

        .menu-title { font-size: 0.9rem; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 15px; }
        .section-divider { border-left: 5px solid #0066cc; padding-left: 15px; margin: 40px 0 20px 0; font-weight: 800; color: #444; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold"><i class="bi bi-shield-lock-fill me-2"></i> ADMIN PANEL SETDA</span>
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="btn btn-sm btn-light me-3 fw-bold text-primary"><i class="bi bi-globe me-1"></i> LIHAT WEB</a>
                <button onclick="document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-power"></i> LOGOUT</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pb-5">
        <h2 class="fw-bold mb-4 text-dark">Selamat Datang, {{ auth()->user()->name }}!</h2>

        <div class="row g-3 mb-5">
            @foreach([['Sambutan', 'image', 'primary', 'admin.sambutan.update'], ['Berita Utama', 'newspaper', 'success', 'admin.beritautama.update'], ['Pejabat', 'person-badge', 'warning', 'admin.pejabat.update']] as $item)
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-0 rounded-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-{{$item[1]}} text-{{$item[2]}} me-2"></i> Foto {{$item[0]}}</h6>
                    <form action="{{ route($item[3]) }}" method="POST" enctype="multipart/form-data"> @csrf 
                        <input type="file" name="file" class="form-control form-control-sm mb-2" required> 
                        <button class="btn btn-{{$item[2]}} btn-sm w-100 fw-bold">UPDATE</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <h5 class="section-divider">MANAJEMEN MENU</h5>
        
        <div class="row g-4">
           @foreach([
    ['Profil', 'info-circle', 'admin.profil-setda.edit'], 
    ['Visi Misi', 'patch-check', 'admin.visi-misi.edit'], 
    ['Tupoksi', 'list-task', 'admin.tupoksi.edit'],
    ['Struktur', 'diagram-3', 'admin.struktur.edit'], 
    ['Asisten', 'person-badge', 'admin.asisten.menu']
] as $m)
            <div class="col-md-3">
                <div class="card card-menu p-4 bg-gradient-dark text-center">
                    <div class="icon-box"><i class="bi bi-{{$m[1]}}"></i></div>
                    <h6 class="menu-title">{{ strtoupper($m[0]) }}</h6>
                    <a href="{{ route($m[2]) }}" class="btn btn-outline-light w-100 mt-auto fw-bold text-uppercase">Kelola</a>
                </div>
            </div>
            @endforeach

            @php
                $kontenMenus = [
                    ['nama' => 'ANALISIS', 'ikon' => 'graph-up', 'route' => 'admin.analisis-kebijakan.edit', 'sub' => null],
                    ['nama' => 'PERENCANAAN', 'ikon' => 'grid-3x3-gap', 'route' => 'admin.perencanaan.menu', 'sub' => 'Renstra, RPD, Fokus, Sinkronisasi'],
                    ['nama' => 'PELAPORAN', 'ikon' => 'bar-chart-fill', 'route' => 'admin.pelaporan.menu', 'sub' => 'LKIP, LPPD, SPM'],
                    ['nama' => 'ALUR SURAT', 'ikon' => 'envelope-paper', 'route' => 'admin.alursurat.edit', 'sub' => null],
                    ['nama' => 'PERLENGKAPAN', 'ikon' => 'house-gear', 'route' => 'admin.perlengkapan.edit', 'sub' => null],
                    ['nama' => 'BAGIAN ORGANISASI', 'ikon' => 'diagram-3', 'route' => 'admin.bagian-organisasi.menu', 'sub' => 'SPBE, RB, Kelembagaan'],
                    ['nama' => 'PEREKONOMIAN', 'ikon' => 'graph-up', 'route' => 'admin.perekonomian.index', 'sub' => 'BUMD, TPID, TP2D, UMKM'],
                    ['nama' => 'TATA PEMERINTAHAN', 'ikon' => 'bank', 'route' => 'admin.tatapemerintahan.index', 'sub' => 'Kunjungan Pimpinan, Fasilitasi Pemilu'],
                    ['nama' => 'PELAYANAN DAN HUKUM', 'ikon' => 'shield-check', 'route' => 'admin.pelayanan-hukum.menu', 'sub' => 'Pelayanan Publik, Bantuan Hukum'],
                    ['nama' => 'GALERI', 'ikon' => 'images', 'route' => 'admin.galeri.index', 'sub' => null],
                    ['nama' => 'PENGHARGAAN', 'ikon' => 'trophy-fill', 'route' => 'admin.penghargaan.index', 'sub' => 'Kelola Data Penghargaan'],
                    ['nama' => 'SURAT EDARAN', 'ikon' => 'envelope-paper-fill', 'route' => 'admin.surat.index', 'sub' => 'Kelola Surat Edaran Walikota'],
                    ['nama' => 'DOWNLOAD', 'ikon' => 'file-earmark-arrow-down-fill', 'route' => 'admin.download.edit', 'sub' => 'Kelola Pusat Unduhan Dokumen'],
                    ['nama' => 'HIBAH', 'ikon' => 'gift-fill', 'route' => 'admin.hibah.edit', 'sub' => 'Kelola Data Penerima Hibah'],
                    ['nama' => 'BERITA', 'ikon' => 'newspaper', 'route' => 'admin.berita.index', 'sub' => null],
                    ['nama' => 'DOKUMEN', 'ikon' => 'file-earmark-arrow-down', 'route' => 'admin.dokumen.index', 'sub' => null],
                    
                ];
            @endphp
            

         @foreach($kontenMenus as $m)
    <div class="col-md-3">
        <div class="card card-menu p-4 bg-gradient-green text-center">
            <div class="icon-box"><i class="bi bi-{{$m['ikon']}}"></i></div>
            <h6 class="menu-title">{{ $m['nama'] }}</h6>
            @if($m['sub'])
                <p class="small text-white-75 mb-3" style="font-size: 0.75rem;">{{ $m['sub'] }}</p>
            @endif
            
            {{-- Perbaikan: Langsung panggil route dengan string karena semua data di array adalah string --}}
            <a href="{{ route($m['route']) }}" class="btn btn-outline-light w-100 mt-auto fw-bold text-uppercase">
                Kelola
            </a>
        </div>
    </div>
@endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>