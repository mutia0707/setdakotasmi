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

        /* Warna zigzag per baris: biru -> hijau -> kuning -> ulang */
        .bg-row-blue   { background: linear-gradient(135deg, #1b2a4a, #4a69bd); }
        .bg-row-green  { background: linear-gradient(135deg, #11998e, #38ef7d); }
        .bg-row-yellow { background: linear-gradient(135deg, #6b5416, #a5811f, #d4af37); }

        /* Tombol UPDATE gradasi, senada dengan warna baris */
        .btn-grad-blue   { background: linear-gradient(135deg, #1b2a4a, #4a69bd); color: #fff; border: none; }
        .btn-grad-green  { background: linear-gradient(135deg, #11998e, #38ef7d); color: #fff; border: none; }
        .btn-grad-yellow { background: linear-gradient(135deg, #6b5416, #a5811f, #d4af37); color: #fff; border: none; }
        .btn-grad-blue:hover, .btn-grad-green:hover, .btn-grad-yellow:hover { filter: brightness(1.1); color: #fff; }

        .icon-box {
            width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;
            border-radius: 50%; margin: 0 auto 20px auto; font-size: 1.8rem; background: rgba(255,255,255,0.2);
        }

        .menu-title { font-size: 0.9rem; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 15px; }
        .section-divider { border-left: 5px solid #0066cc; padding-left: 15px; margin: 40px 0 20px 0; font-weight: 800; color: #444; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3 mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold"><i class="bi bi-shield-lock-fill me-2"></i> ADMIN PANEL SETDA KOTA SUKABUMI</span>
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="btn btn-sm btn-light me-2 fw-bold text-primary"><i class="bi bi-globe me-1"></i> LIHAT WEB</a>
                
                {{-- Tombol khusus Super Admin untuk membuat user baru di Navbar --}}
                @if(auth()->check() && auth()->user()->role === 'super_admin')
                    <a href="{{ route('tambah.user') }}" class="btn btn-sm btn-warning me-2 fw-bold text-dark"><i class="bi bi-person-plus-fill me-1"></i> TAMBAH USER</a>
                @endif

                <button onclick="document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-power"></i> LOGOUT</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- Notifikasi Sukses Global jika ada --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-3 mb-5">
            {{-- Foto Sambutan --}}
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-0 rounded-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-image me-2"></i> Foto Sambutan</h6>
                    <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="gambar_sambutan" class="form-control form-control-sm mb-2" required>
                        <button class="btn btn-grad-blue btn-sm w-100 fw-bold">UPDATE</button>
                    </form>
                </div>
            </div>

            {{-- Foto Berita Utama --}}
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-0 rounded-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-newspaper me-2"></i> Foto Berita Utama</h6>
                    <form action="{{ route('admin.beritautama.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="foto_berita_utama" class="form-control form-control-sm mb-2" required>
                        <button class="btn btn-grad-green btn-sm w-100 fw-bold">UPDATE</button>
                    </form>
                </div>
            </div>

            {{-- Foto Pejabat --}}
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-0 rounded-4">
                    <h6 class="fw-bold mb-3"><i class="bi bi-person-badge me-2"></i> Foto Pejabat</h6>
                    <form action="{{ route('admin.pejabat.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select name="kode_pejabat" class="form-select form-select-sm mb-2" required>
                            <option value="" disabled selected>Pilih Pejabat...</option>
                            <option value="asisten1">Asisten Pemerintahan & Kesra</option>
                            <option value="staf_ahli">Staf Ahli Bidang Administrasi Umum</option>
                            <option value="asisten3">Asisten Daerah III</option>
                            <option value="kabag_tata_pemerintahan">Bagian Tata Pemerintahan</option>
                        </select>
                        <input type="file" name="foto_pejabat" class="form-control form-control-sm mb-2" required>
                        <button class="btn btn-grad-yellow btn-sm w-100 fw-bold">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>

        <h5 class="section-divider">MANAJEMEN MENU</h5>

        <div class="row g-4 mb-5">

            @php
                $allMenus = [
                    ['nama' => 'Profil',       'ikon' => 'info-circle',   'route' => 'admin.profil-setda.edit', 'sub' => null],
                    ['nama' => 'Visi Misi',    'ikon' => 'patch-check',   'route' => 'admin.visi-misi.edit',    'sub' => null],
                    ['nama' => 'Tupoksi',      'ikon' => 'list-task',     'route' => 'admin.tupoksi.edit',      'sub' => null],
                    ['nama' => 'Struktur',     'ikon' => 'diagram-3',     'route' => 'admin.struktur.edit',     'sub' => null],
                    ['nama' => 'Asisten',      'ikon' => 'person-badge',  'route' => 'admin.asisten.menu',      'sub' => null],

                    ['nama' => 'ANALISIS',            'ikon' => 'graph-up',                 'route' => 'admin.analisis-kebijakan.edit', 'sub' => null],
                    ['nama' => 'PERENCANAAN',         'ikon' => 'grid-3x3-gap',             'route' => 'admin.perencanaan.menu',        'sub' => 'Renstra, RPD, Fokus, Sinkronisasi'],
                    ['nama' => 'PELAPORAN',           'ikon' => 'bar-chart-fill',           'route' => 'admin.pelaporan.menu',          'sub' => 'LKIP, LPPD, SPM'],
                    ['nama' => 'ALUR SURAT',          'ikon' => 'envelope-paper',           'route' => 'admin.alursurat.edit',          'sub' => null],
                    ['nama' => 'PERLENGKAPAN',        'ikon' => 'house-gear',               'route' => 'admin.perlengkapan.edit',       'sub' => null],
                    ['nama' => 'BAGIAN ORGANISASI',   'ikon' => 'diagram-3',                'route' => 'admin.bagian-organisasi.menu',  'sub' => 'SPBE, RB, Kelembagaan'],
                    ['nama' => 'PEREKONOMIAN',        'ikon' => 'graph-up',                 'route' => 'admin.perekonomian.index',      'sub' => 'BUMD, TPID, TP2D, UMKM'],
                    ['nama' => 'TATA PEMERINTAHAN',   'ikon' => 'bank',                     'route' => 'admin.tatapemerintahan.index',  'sub' => 'Kunjungan Pimpinan, Fasilitasi Pemilu'],
                    ['nama' => 'PELAYANAN DAN HUKUM', 'ikon' => 'shield-check',             'route' => 'admin.pelayanan-hukum.menu',    'sub' => 'Pelayanan Publik, Bantuan Hukum'],

                    ['nama' => 'GALERI',       'ikon' => 'images',                    'route' => 'admin.galeri.index',      'sub' => null],
                    ['nama' => 'PENGHARGAAN',  'ikon' => 'trophy-fill',               'route' => 'admin.penghargaan.index', 'sub' => 'Kelola Data Penghargaan'],
                    ['nama' => 'SURAT EDARAN', 'ikon' => 'envelope-paper-fill',       'route' => 'admin.surat.index',       'sub' => 'Kelola Surat Edaran Walikota'],
                    ['nama' => 'DOWNLOAD',     'ikon' => 'file-earmark-arrow-down-fill', 'route' => 'admin.download.edit',    'sub' => 'Kelola Pusat Unduhan Dokumen'],
                    ['nama' => 'HIBAH',        'ikon' => 'gift-fill',                 'route' => 'admin.hibah.edit',        'sub' => 'Kelola Data Penerima Hibah'],
                    ['nama' => 'BERITA',       'ikon' => 'newspaper',                 'route' => 'admin.berita.index',      'sub' => null],
                    ['nama' => 'DOKUMEN',      'ikon' => 'file-earmark-arrow-down',   'route' => 'admin.dokumen.index',     'sub' => null],
                ];

                $warnaBaris = ['bg-row-blue', 'bg-row-green', 'bg-row-yellow'];
                $kartuPerBaris = 4;
            @endphp

            @foreach($allMenus as $i => $m)
                @php
                    $baris = intdiv($i, $kartuPerBaris);
                    $warna = $warnaBaris[$baris % count($warnaBaris)];
                @endphp
                <div class="col-md-3">
                    <div class="card card-menu p-4 {{ $warna }} text-center">
                        <div class="icon-box"><i class="bi bi-{{ $m['ikon'] }}"></i></div>
                        <h6 class="menu-title">{{ strtoupper($m['nama']) }}</h6>
                        @if($m['sub'])
                            <p class="small text-white-75 mb-3" style="font-size: 0.75rem;">{{ $m['sub'] }}</p>
                        @endif
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