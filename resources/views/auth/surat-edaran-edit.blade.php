<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Surat Edaran - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
        .card-section { border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .table thead { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .table thead th { border: none; padding: 12px 16px; font-size: 0.85rem; }
        .table tbody tr:hover { background-color: #eaf2ff; }
        .badge-tanggal { background-color: #0066cc; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; }
        .btn-edit-custom { background: #0066cc; color: white; border: none; font-weight: 600; font-size: 0.8rem; border-radius: 6px; }
        .btn-edit-custom:hover { background: #004a99; color: white; }
        .section-icon { width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #004a99, #0066cc); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; }
        .form-control:focus { border-color: #0066cc; box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.15); }
        .modal-header-custom { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .modal-header-custom .btn-close { filter: invert(1); }
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
            <i class="bi bi-envelope-paper-fill me-2"></i> KELOLA SURAT EDARAN WALI KOTA
        </span>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold text-primary">
            <i class="bi bi-arrow-left-short"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container mt-4">

    {{-- TAMBAH --}}
    <div class="card card-section p-4 mb-4">
        <div class="d-flex align-items-center mb-4">
            <div class="section-icon me-3"><i class="bi bi-plus-circle-fill"></i></div>
            <h5 class="fw-bold mb-0" style="color:#004a99;">TAMBAH SURAT EDARAN BARU</h5>
        </div>
        <form action="{{ route('admin.surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Judul Surat Edaran</label>
                    <input type="text" name="judul" class="form-control" placeholder="Ketik judul..." required>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" placeholder="001/SE/2024">
                </div>
                <div class="col-md-2">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">File PDF</label>
                    <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-primary fw-bold px-5">
                        <i class="bi bi-plus-circle me-2"></i> TAMBAH
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- DAFTAR --}}
    <div class="card card-section p-4 mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="section-icon me-3"><i class="bi bi-envelope-paper-fill"></i></div>
            <h5 class="fw-bold mb-0" style="color:#004a99;">DAFTAR SURAT EDARAN</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px;">NO</th>
                        <th>JUDUL</th>
                        <th style="width:180px;">NOMOR SURAT</th>
                        <th style="width:130px;">TANGGAL</th>
                        <th class="text-center" style="width:80px;">FILE</th>
                        <th class="text-center" style="width:200px;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $item->judul }}</td>
                        <td class="text-muted small">{{ $item->nomor_surat ?? '-' }}</td>
                        <td><span class="badge-tanggal">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span></td>
                        <td class="text-center">
                            @if($item->file_pdf)
                                <a href="{{ asset('storage/surat_edaran/' . $item->file_pdf) }}"
                                   target="_blank" class="btn btn-danger btn-sm">
                                    <i class="bi bi-file-pdf"></i>
                                </a>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-edit-custom btn-sm me-1"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                <i class="bi bi-pencil-square me-1"></i> EDIT
                            </button>
                            <form action="{{ route('admin.surat.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus surat edaran ini?')">
                                    <i class="bi bi-trash me-1"></i> HAPUS
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header modal-header-custom">
                                    <h5 class="modal-title fw-bold">
                                        <i class="bi bi-pencil-square me-2"></i> Edit Surat Edaran
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('admin.surat.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Judul</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Nomor Surat</label>
                                            <input type="text" name="nomor_surat" class="form-control" value="{{ $item->nomor_surat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Ganti File PDF (opsional)</label>
                                            <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                                            @if($item->file_pdf)
                                                <small class="text-muted">File saat ini: <a href="{{ asset('storage/surat_edaran/' . $item->file_pdf) }}" target="_blank">Lihat PDF</a></small>
                                            @endif
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
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-envelope-paper me-2"></i> Belum ada surat edaran.
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