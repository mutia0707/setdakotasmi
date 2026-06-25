<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokumen - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
        .card-section { border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .table thead { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .table thead th { border: none; padding: 12px 16px; font-size: 0.85rem; letter-spacing: 0.5px; }
        .table tbody tr:hover { background-color: #eaf2ff; }
        .badge-bagian { background-color: #0066cc; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; }
        .btn-edit-custom { background: #0066cc; color: white; border: none; font-weight: 600; font-size: 0.8rem; border-radius: 6px; }
        .btn-edit-custom:hover { background: #004a99; color: white; }
        .section-icon { width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #004a99, #0066cc); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; }
        .form-control:focus, .form-select:focus { border-color: #0066cc; box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.15); }
        .modal-header-custom { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .modal-header-custom .btn-close { filter: invert(1); }
    </style>
</head>
<body>

@if(session('success'))
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold">
            <i class="bi bi-file-earmark-pdf me-2"></i>
            KELOLA DOKUMEN PDF {{ request('bagian') ? '(' . strtoupper(request('bagian')) . ')' : '' }}
        </span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">
    <i class="bi bi-arrow-left-short"></i> KEMBALI
</a>
    </div>
</nav>

<div class="container mt-4">

    {{-- UPLOAD --}}
    <div class="card card-section p-4 mb-4">
        <div class="d-flex align-items-center mb-4">
            <div class="section-icon me-3"><i class="bi bi-cloud-arrow-up-fill"></i></div>
            <h5 class="fw-bold mb-0" style="color:#004a99;">UPLOAD DOKUMEN BARU</h5>
        </div>
        <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Judul Dokumen</label>
                    <input type="text" name="judul" class="form-control" placeholder="Ketik judul dokumen..." required>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Bagian</label>
                    <select name="bagian" class="form-select">
                        <option value="humas" {{ request('bagian') == 'humas' ? 'selected' : '' }}>Humas</option>
                        <option value="kesra" {{ request('bagian') == 'kesra' ? 'selected' : '' }}>Kesra</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Pilih File PDF</label>
                    <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-primary fw-bold px-5">
                        <i class="bi bi-upload me-2"></i> UNGGAH
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- DAFTAR --}}
    <div class="card card-section p-4 mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="section-icon me-3"><i class="bi bi-folder-fill"></i></div>
            <h5 class="fw-bold mb-0" style="color:#004a99;">DAFTAR RIWAYAT DOKUMEN</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle rounded overflow-hidden">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px;">NO</th>
                        <th>JUDUL DOKUMEN</th>
                        <th style="width:150px;">BAGIAN</th>
                        <th class="text-center" style="width:200px;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokumens as $index => $doc)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $doc->judul }}</td>
                        <td><span class="badge-bagian">{{ strtoupper($doc->bagian) }}</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-edit-custom btn-sm me-1"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $doc->id }}">
                                <i class="bi bi-pencil-square me-1"></i> EDIT
                            </button>
                            <form action="{{ route('admin.dokumen.destroy', $doc->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus dokumen ini?')">
                                    <i class="bi bi-trash me-1"></i> HAPUS
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="editModal{{ $doc->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header modal-header-custom">
                                    <h5 class="modal-title fw-bold">
                                        <i class="bi bi-pencil-square me-2"></i> Edit Data Dokumen
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('admin.dokumen.edit', $doc->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Judul Dokumen</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $doc->judul }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Bagian</label>
                                            <select name="bagian" class="form-select">
                                                <option value="humas" {{ $doc->bagian == 'humas' ? 'selected' : '' }}>Humas</option>
                                                <option value="kesra" {{ $doc->bagian == 'kesra' ? 'selected' : '' }}>Kesra</option>
                                            </select>
                                        </div>
                                        <div class="alert alert-info py-2 px-3 small mb-0">
                                            <i class="bi bi-info-circle me-1"></i>
                                            File PDF tidak dapat diubah dari menu edit ini demi keamanan berkas.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm fw-bold" data-bs-dismiss="modal">BATAL</button>
                                        <button type="submit" class="btn btn-primary btn-sm fw-bold px-4">SIMPAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <i class="bi bi-folder2-open me-2"></i> Belum ada dokumen yang diunggah.
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