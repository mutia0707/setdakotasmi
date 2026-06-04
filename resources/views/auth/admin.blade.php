<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar-admin {
            background-color: #0056b3;
            border-bottom: 4px solid #003d80;
        }
        .card-menu {
            border: none;
            border-radius: 12px;
            transition: 0.3s;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }
        .icon-box {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold d-flex align-items-center">
                <i class="bi bi-shield-lock-fill me-2"></i> ADMIN PANEL SETDA
            </span>
            
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="btn btn-sm btn-light me-3 fw-bold text-primary" rel="noopener noreferrer">
                    <i class="bi bi-globe me-1"></i> LIHAT WEB
                </a>
                
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="btn btn-sm btn-danger fw-bold shadow-sm">
                    <i class="bi bi-power me-1"></i> LOGOUT
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Selamat Datang, {{ auth()->user()->name }}!</h2>
                <p class="text-muted">Kelola konten website Sekretariat Daerah melalui menu di bawah ini.</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px; background: #fff;">
            <h5 class="fw-bold text-dark text-uppercase mb-3">
                <i class="bi bi-person-bounding-box me-2 text-primary"></i> Pengaturan Foto Sambutan Beranda
            </h5>
            
            @if(session('success') && !session('success_berita_utama'))
                <div class="alert alert-success border-0 py-2 mb-3 shadow-sm rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-secondary small">FOTO SEKARANG</label>
                        <div class="mb-2">
                            <img src="{{ asset('img/sambutan.jpg?v='.time()) }}" class="img-thumbnail" style="max-height: 80px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">PILIH FOTO PEJABAT BARU (Format: JPG/PNG, Maks 2MB)</label>
                        <input type="file" name="gambar_sambutan" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success fw-bold w-100">PERBARUI FOTO</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px; background: #fff;">
            <h5 class="fw-bold text-dark text-uppercase mb-3">
                <i class="bi bi-image me-2 text-success"></i> Pengaturan Foto Berita Utama Beranda
            </h5>
            
            @if(session('success_berita_utama'))
                <div class="alert alert-success border-0 py-2 mb-3 shadow-sm rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success_berita_utama') }}
                </div>
            @endif

            <form action="{{ route('admin.beritautama.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-secondary small">FOTO SEKARANG</label>
                        <div class="mb-2">
                            <img src="{{ asset('img/berita_utama.jpg?v='.time()) }}" class="img-thumbnail" style="max-height: 80px; object-fit: cover;" onerror="this.src='https://placehold.co/150x100?text=No+Image'">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-secondary small">PILIH FOTO BERITA BARU (Format: JPG/PNG, Maks 2MB)</label>
                        <input type="file" name="foto_berita_utama" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success fw-bold w-100" style="background-color: #198754; border-color: #198754;">PERBARUI FOTO</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px; background: #fff;">
            <h5 class="fw-bold text-dark text-uppercase mb-3">
                <i class="bi bi-people-fill me-2 text-success"></i> Pengaturan Foto Pejabat Daerah
            </h5>
            
            @if(session('success_pejabat'))
                <div class="alert alert-success border-0 py-2 mb-3 shadow-sm rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success_pejabat') }}
                </div>
            @endif

            <form action="{{ route('admin.pejabat.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">PILIH JABATAN PEJABAT</label>
                        <select name="kode_pejabat" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Pejabat --</option>
                            <option value="asisten1">Asisten Pemerintahan dan Kesejahteraan Rakyat (Asisten I)</option>
                            <option value="staf_ahli">Staf Ahli Bidang Administrasi Umum</option>
                            <option value="asisten3">Asisten Daerah III</option>
                            <option value="kabag_tata_pemerintahan">Bagian Tata Pemerintahan</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-bold text-secondary small">PILIH FOTO BARU (Format: JPG/PNG, Maks 2MB)</label>
                        <input type="file" name="foto_pejabat" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success fw-bold w-100">
                            PERBARUI FOTO 
                        </button>
                    </div>
                </div>
            </form>
        </div>
       <div class="row g-4 mt-3">
    <div class="col-md-4">
        <div class="card card-menu shadow-sm p-4 h-100">
            <div class="icon-box" style="background-color: #10b981; color: white;">
                <i class="bi bi-list-check fs-3"></i>
            </div>
            <h5 class="fw-bold">Visi dan Misi</h5>
            <p class="text-muted small">Update visi dan misi organisasi.</p>
            <a href="{{ route('admin.visi-misi.edit') }}" class="btn btn-success fw-bold mt-auto">Edit Visi Misi</a>
        </div>
    </div>
    
    </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-menu shadow-sm p-4 h-100">
                    <div class="icon-box bg-primary text-white">
                        <i class="bi bi-newspaper fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Kelola Berita</h5>
                    <p class="text-muted small">Tambah, edit, atau hapus berita seputar Kota Sukabumi.</p>
                    <a href="{{ route('admin.berita.form') }}" class="btn btn-primary mt-auto fw-bold">Buka Form Input</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-menu shadow-sm p-4 h-100">
                    <div class="icon-box bg-success text-white">
                        <i class="bi bi-images fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Galeri Foto & Video</h5>
                    <p class="text-muted small">Update dokumentasi kegiatan dalam bentuk foto dan video.</p>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-success mt-auto fw-bold">Buka Form Galeri</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-menu shadow-sm p-4 h-100">
                    <div class="icon-box bg-warning text-dark">
                        <i class="bi bi-file-earmark-arrow-down fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Dokumen Unduhan</h5>
                    <p class="text-muted small">Upload file pengumuman, regulasi, atau dokumen publik.</p>
                    <a href="{{ route('admin.dokumen.index') }}" class="btn btn-warning text-dark fw-bold mt-auto">Buka Menu Dokumen</a>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-4 border-top text-center text-muted">
            <small>Log login terakhir: {{ now()->format('d M Y, H:i') }} WIB</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>