<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Bagian Humas - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar-bg { background-color: #0d6efd; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-bg shadow-sm py-3 mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold d-flex align-items-center">
                <i class="bi bi-file-earmark-text me-2"></i> DOKUMEN & REGULASI BAGIAN HUMAS
            </span>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm fw-bold">
                <i class="bi bi-house-door"></i> BERANDA
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold text-dark mb-4">
                <i class="bi bi-folder2-open me-2 text-primary"></i> 
                Daftar Informasi Publik - Bagian Humas
            </h5>
            
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 60px;">NO</th>
                            <th>NAMA DOKUMEN / MATERI</th>
                            <th class="text-center" style="width: 180px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumens as $index => $doc)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-secondary">{{ $doc->judul }}</td>
                            <td class="text-center">
                                <a href="{{ asset('berkas_dokumen/' . $doc->file_pdf) }}" class="btn btn-primary btn-sm fw-bold px-3" download>
                                    <i class="bi bi-download"></i> UNDUH PDF
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-info-circle d-block mb-2" style="font-size: 2rem;"></i>
                                Belum ada dokumen berkas yang diunggah khusus untuk Bagian Humas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>