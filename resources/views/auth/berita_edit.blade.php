<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-admin { background-color: #0056b3; border-bottom: 4px solid #003d80; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold"><i class="bi bi-pencil-square me-2"></i> EDIT BERITA</span>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-light text-primary fw-bold">
                <i class="bi bi-arrow-left"></i> KEMBALI
            </a>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 700px;">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
            <h5 class="fw-bold mb-4 text-secondary">Form Ubah Data Berita</h5>
            
            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Berita</label>
                    <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Isi Berita</label>
                    <textarea name="isi" rows="8" class="form-control" required>{{ $berita->isi_berita }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Foto Berita" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                    <label class="form-label small text-muted">Ganti foto (Opsional):</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">SIMPAN PERUBAHAN</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>