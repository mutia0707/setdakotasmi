<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
        .card-section { border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .table thead { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .table thead th { border: none; padding: 12px 16px; font-size: 0.85rem; }
        .table tbody tr:hover { background-color: #eaf2ff; }
        .btn-edit-custom { background: #0066cc; color: white; border: none; font-weight: 600; font-size: 0.8rem; border-radius: 6px; }
        .btn-edit-custom:hover { background: #004a99; color: white; }
        .section-icon { width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #004a99, #0066cc); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; }
        .form-control:focus, .form-select:focus { border-color: #0066cc; box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.15); }
        .modal-header-custom { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .modal-header-custom .btn-close { filter: invert(1); }
        .badge-bagian { background-color: #eaf2ff; color: #0066cc; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
    </style>
</head>
<body>

@if(session('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <div class="alert alert-success alert-dismissible fade show shadow">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold">
            <i class="bi bi-newspaper me-2"></i> KELOLA BERITA SETDA
        </span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">
            <i class="bi bi-arrow-left-short"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container mt-4">

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Gagal menyimpan:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- DAFTAR --}}
    <div class="card card-section p-4 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <div class="section-icon me-3"><i class="bi bi-newspaper"></i></div>
                <h5 class="fw-bold mb-0" style="color:#004a99;">DAFTAR BERITA (SEMUA BAGIAN)</h5>
            </div>
            <span class="badge bg-primary px-3 py-2 rounded-pill">Total: {{ count($beritas) }} Berita</span>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px;">NO</th>
                        <th style="width:80px;">GAMBAR</th>
                        <th>JUDUL</th>
                        <th style="width:140px;">BAGIAN</th>
                        <th style="width:130px;">TANGGAL PUBLISH</th>
                        <th class="text-center" style="width:160px;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $index => $item)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td class="text-center">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" style="height: 45px; width: 45px; object-fit: cover;" class="rounded">
                            @else
                                <div class="bg-light text-muted rounded d-flex align-items-center justify-content-center mx-auto" style="height: 45px; width: 45px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $item->judul }}</td>
                        <td><span class="badge-bagian">{{ $item->bagian }}</span></td>
                        <td class="text-muted small">{{ \Carbon\Carbon::parse($item->tanggal_publish)->translatedFormat('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn btn-secondary btn-sm mb-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.berita.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus berita ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-newspaper me-2"></i> Belum ada berita.
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