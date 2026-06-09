<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokumen - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .header-bg { background-color: #8f8c84; }
        .btn-warning { background-color: #8f8c84; border: none; color: #000; font-weight: bold; }
        .btn-warning:hover { background-color: #8f8c84; color: #000; }
        .btn-edit { background-color: #8f8c84; border: none; color: #000; font-weight: bold; }
        .btn-edit:hover { background-color: #8f8c84; color: #000; }
        .btn-danger { background-color: #dc3545; border: none; font-weight: bold; color: white; }
    </style>
</head>
<body>

    @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <nav class="navbar navbar-dark header-bg shadow-sm py-3 mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold text-dark d-flex align-items-center">
                <i class="bi bi-file-earmark-pdf me-2"></i> KELOLA DOKUMEN PDF {{ request('bagian') ? '('.strtoupper(request('bagian')).')' : '' }}
            </span>
            <a href="{{ route('auth.admin') }}" class="btn btn-dark btn-sm fw-bold">
                <i class="bi bi-arrow-left-short"></i> KEMBALI KE DASHBOARD
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card border-0 shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-cloud-arrow-up-fill me-2 text-warning"></i> UPLOAD DOKUMEN BARU</h5>
            <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="fw-bold small mb-1">JUDUL DOKUMEN</label>
                        <input type="text" name="judul" class="form-control" placeholder="Ketik judul dokumen..." required>
                    </div>
                    <div class="col-md-3">
                        <label class="fw-bold small mb-1">BAGIAN</label>
                        <select name="bagian" class="form-select">
                            <option value="humas" {{ request('bagian') == 'humas' ? 'selected' : '' }}>Humas</option>
                            <option value="kesra" {{ request('bagian') == 'kesra' ? 'selected' : '' }}>Kesra</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold small mb-1">PILIH FILE PDF</label>
                        <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                    </div>
                    <div class="col-12 mt-3 text-end">
                        <button type="submit" class="btn btn-warning px-4">UNGGAH</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-folder-fill me-2 text-warning"></i> DAFTAR RIWAYAT DOKUMEN</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>JUDUL DOKUMEN</th>
                            <th>BAGIAN</th>
                            <th class="text-center" style="width: 200px;">TINDAKAN KONTROL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumens as $index => $doc)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $doc->judul }}</td>
                            <td><span class="badge bg-secondary">{{ strtoupper($doc->bagian) }}</span></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-edit btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $doc->id }}">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </button>

                                <form action="{{ route('admin.dokumen.destroy', $doc->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus dokumen ini?')">
                                        <i class="bi bi-trash"></i> HAPUS
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $doc->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-bg text-dark">
                                        <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square me-2"></i> Edit Data Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.dokumen.edit', $doc->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold small">JUDUL DOKUMEN</label>
                                                <input type="text" name="judul" class="form-control" value="{{ $doc->judul }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold small">BAGIAN</label>
                                                <select name="bagian" class="form-select">
                                                    <option value="humas" {{ $doc->bagian == 'humas' ? 'selected' : '' }}>Humas</option>
                                                    <option value="kesra" {{ $doc->bagian == 'kesra' ? 'selected' : '' }}>Kesra</option>
                                                </select>
                                            </div>
                                            <p class="text-muted small"><i class="bi bi-info-circle me-1"></i> Catatan: File PDF tidak dapat diubah dari menu edit ini demi keamanan berkas.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-white fw-bold btn-sm" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-warning btn-sm">SIMPAN PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3 text-muted">Belum ada konten dokumen yang diunggah di bagian ini.</td>
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