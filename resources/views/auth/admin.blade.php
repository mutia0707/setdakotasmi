<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background-color: #0056b3; border-bottom: 4px solid #003d80; }
        .card-menu { border: none; border-radius: 12px; transition: 0.3s; height: 100%; display: flex; flex-direction: column; position: relative; }
        .card-menu:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
        .icon-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 15px; margin-bottom: 20px; }
        .btn-kelola { position: relative !important; z-index: 10 !important; pointer-events: auto !important; cursor: pointer !important; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold"><i class="bi bi-shield-lock-fill me-2"></i> ADMIN PANEL SETDA</span>
            <div class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="btn btn-sm btn-light me-3 fw-bold text-primary"><i class="bi bi-globe me-1"></i> WEB</a>
                <button onclick="document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-power"></i> LOGOUT</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="fw-bold mb-4">Selamat Datang, {{ auth()->user()->name }}!</h2>

        <div class="row g-3 mb-4">
            <div class="col-md-4"><div class="card p-3 shadow-sm border-0"><h6 class="fw-bold"><i class="bi bi-image text-primary"></i> Foto Sambutan</h6>
                <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf <input type="file" name="gambar_sambutan" class="form-control form-control-sm mb-2" required>
                    <button class="btn btn-primary btn-sm w-100">Update</button>
                </form>
            </div></div>
            <div class="col-md-4"><div class="card p-3 shadow-sm border-0"><h6 class="fw-bold"><i class="bi bi-newspaper text-success"></i> Foto Berita Utama</h6>
                <form action="{{ route('admin.beritautama.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf <input type="file" name="foto_berita_utama" class="form-control form-control-sm mb-2" required>
                    <button class="btn btn-success btn-sm w-100">Update</button>
                </form>
            </div></div>
            <div class="col-md-4"><div class="card p-3 shadow-sm border-0"><h6 class="fw-bold"><i class="bi bi-person-badge text-warning"></i> Foto Pejabat</h6>
                <form action="{{ route('admin.pejabat.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <select name="kode_pejabat" class="form-select form-select-sm mb-1" required>
                        <option value="asisten1">Asisten I</option>
                        <option value="staf_ahli">Staf Ahli</option>
                    </select>
                    <input type="file" name="foto_pejabat" class="form-control form-control-sm mb-2" required>
                    <button class="btn btn-warning btn-sm w-100">Update</button>
                </form>
            </div></div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-warning text-dark mx-auto"><i class="bi bi-info-circle fs-3"></i></div>
                    <h5 class="fw-bold">Profil Setda</h5>
                    <a href="{{ route('admin.profil-setda.edit') }}" class="btn btn-warning w-100 mt-auto text-dark fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-success text-white mx-auto"><i class="bi bi-list-check fs-3"></i></div>
                    <h5 class="fw-bold">Visi Misi</h5>
                    <a href="{{ route('admin.visi-misi.edit') }}" class="btn btn-success w-100 mt-auto text-white fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-info text-white mx-auto"><i class="bi bi-file-earmark-text fs-3"></i></div>
                    <h5 class="fw-bold">Tupoksi</h5>
                    <a href="{{ route('admin.tupoksi.edit') }}" class="btn btn-info w-100 mt-auto text-white fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-secondary text-white mx-auto"><i class="bi bi-graph-up fs-3"></i></div>
                    <h5 class="fw-bold">Analisis Kebijakan</h5>
               <a href="{{ route('admin.analisis-kebijakan.edit') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-primary text-white mx-auto"><i class="bi bi-newspaper fs-3"></i></div>
                    <h5 class="fw-bold">Berita</h5>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-primary w-100 mt-auto text-white fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-info text-white mx-auto"><i class="bi bi-images fs-3"></i></div>
                    <h5 class="fw-bold">Galeri</h5>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-info w-100 mt-auto text-white fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-menu p-4 shadow-sm text-center">
                    <div class="icon-box bg-secondary text-white mx-auto"><i class="bi bi-file-earmark-arrow-down fs-3"></i></div>
                    <h5 class="fw-bold">Dokumen</h5>
                    <a href="{{ route('admin.dokumen.index') }}" class="btn btn-secondary w-100 mt-auto text-white fw-bold btn-kelola">Kelola</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>