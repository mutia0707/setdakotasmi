<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Hibah</title>
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
        <span class="navbar-brand fw-bold"><i class="bi bi-gift-fill me-2"></i> KELOLA DATA HIBAH</span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">KEMBALI</a>
    </div>
</nav>

<div class="container mt-5" style="max-width: 900px;">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <h6 class="fw-bold mb-3"><i class="bi bi-cloud-upload me-2"></i> Upload Dokumen Hibah Baru</h6>
        <form action="{{ route('admin.hibah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="judul" class="form-control" placeholder="Nama Dokumen Hibah" required>
                </div>
                <div class="col-md-5">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold">UPLOAD</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h6 class="fw-bold mb-3">Daftar Dokumen Hibah</h6>
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Menggunakan variabel $hibah sesuai Controller --}}
                @forelse($hibah as $index => $h)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $h->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($h->created_at)->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('admin.hibah.destroy', $h->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dokumen ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada dokumen hibah</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>