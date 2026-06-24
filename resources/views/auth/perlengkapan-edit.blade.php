<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Perlengkapan & Rumah Tangga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>body { background: #f0f4f8; } .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }</style>
</head>
<body>
<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold"><i class="bi bi-house-gear me-2"></i> Kelola Perlengkapan & Rumah Tangga</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">KEMBALI</a>
    </div>
</nav>

<div class="container mt-5" style="max-width:600px">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h6 class="fw-bold mb-1">Upload SOP Perlengkapan & Rumah Tangga (PDF)</h6>
        <p class="text-muted small mb-4">File PDF ini akan tampil sebagai tombol download di halaman publik.</p>

        @if(!empty($data->file_pdf))
        <div class="alert alert-info d-flex align-items-center mb-4">
            <i class="bi bi-file-pdf fs-4 me-3 text-danger"></i>
            <div>
                <div class="fw-bold">File saat ini:</div>
                <a href="{{ asset($data->file_pdf) }}" target="_blank">Lihat / Download PDF</a>
            </div>
        </div>
        @else
        <div class="alert alert-warning mb-4">Belum ada file PDF yang diupload.</div>
        @endif

        <form action="{{ route('admin.perlengkapan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">Pilih File PDF Baru</label>
                <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                <small class="text-muted">Maks. 10MB. Format: PDF</small>
            </div>
            <button class="btn btn-primary fw-bold w-100">UPLOAD & SIMPAN</button>
        </form>
    </div>
</div>
</body>
</html>