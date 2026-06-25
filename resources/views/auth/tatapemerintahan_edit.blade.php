<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola {{ strtoupper(str_replace('-', ' ', $slug)) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold"><i class="bi bi-building me-2"></i> Kelola {{ strtoupper(str_replace('-', ' ', $slug)) }}</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">KEMBALI</a>
    </div>
</nav>

<div class="container mt-5" style="max-width:700px">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h6 class="fw-bold mb-3">Edit {{ strtoupper(str_replace('-', ' ', $slug)) }}</h6>
        <form action="{{ route('admin.tatapemerintahan.update', $slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">Deskripsi / Konten</label>
                <textarea name="konten" class="form-control" rows="6">{{ $data->konten ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Upload File PDF</label>
                <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                @if(!empty($data->file_pdf))
                    <small class="text-muted mt-1 d-block">File saat ini:
                        <a href="{{ asset($data->file_pdf) }}" target="_blank">{{ basename($data->file_pdf) }}</a>
                    </small>
                @endif
            </div>
            <div class="mb-3">
    <label class="fw-bold">Upload Foto Dokumentasi</label>
    <input type="file" name="gambar" class="form-control" accept="image/*">
    @if(!empty($data->gambar))
        <small class="text-muted mt-1 d-block">
            <img src="{{ asset($data->gambar) }}" width="100" class="mt-1 rounded">
        </small>
    @endif
</div>
            <button class="btn btn-primary fw-bold w-100">SIMPAN</button>
        </form>
    </div>
</div>
</body>
</html>