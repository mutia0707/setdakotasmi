<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Penghargaan - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
        .card-section { border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .table thead { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .table thead th { border: none; padding: 12px 16px; font-size: 0.85rem; }
        .table tbody tr:hover { background-color: #eaf2ff; }
        .badge-tahun { background-color: #0066cc; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; }
        .btn-edit-custom { background: #0066cc; color: white; border: none; font-weight: 600; font-size: 0.8rem; border-radius: 6px; }
        .btn-edit-custom:hover { background: #004a99; color: white; }
        .section-icon { width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, #004a99, #0066cc); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; }
        .form-control:focus, .form-select:focus { border-color: #0066cc; box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.15); }
        .modal-header-custom { background: linear-gradient(135deg, #004a99, #0066cc); color: white; }
        .modal-header-custom .btn-close { filter: invert(1); }
        .foto-thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 6px; border: 2px solid #dee2e6; }
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
            <i class="bi bi-trophy-fill me-2"></i> KELOLA PENGHARGAAN
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
            <h5 class="fw-bold mb-0" style="color:#004a99;">TAMBAH PENGHARGAAN BARU</h5>
        </div>
        <form action="{{ route('admin.penghargaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Nama Penghargaan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Ketik nama penghargaan..." required>
                </div>
                <div class="col-md-2">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Tahun</label>
                    <input type="text" name="tahun" class="form-control" placeholder="2024" required>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold small mb-1 text-muted text-uppercase">Foto Sertifikat</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
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
            <div class="section-icon me-3"><i class="bi bi-trophy-fill"></i></div>
            <h5 class="fw-bold mb-0" style="color:#004a99;">DAFTAR PENGHARGAAN</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px;">NO</th>
                        <th style="width:80px;">FOTO</th>
                        <th>NAMA PENGHARGAAN</th>
                        <th style="width:120px;">TAHUN</th>
                        <th class="text-center" style="width:200px;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('img/penghargaan/' . $item->foto) }}" class="foto-thumb">
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $item->nama }}</td>
                        <td><span class="badge-tahun">{{ $item->tahun }}</span></td>
                        <td class="text-center">
                            <button class="btn btn-edit-custom btn-sm me-1"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                <i class="bi bi-pencil-square me-1"></i> EDIT
                            </button>
                            <form action="{{ route('admin.penghargaan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus penghargaan ini?')">
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
                                        <i class="bi bi-pencil-square me-2"></i> Edit Penghargaan
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('admin.penghargaan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Nama Penghargaan</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Tahun</label>
                                            <input type="text" name="tahun" class="form-control" value="{{ $item->tahun }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold small text-muted text-uppercase mb-1">Ganti Foto (opsional)</label>
                                            <input type="file" name="foto" class="form-control" accept="image/*">
                                            @if($item->foto)
                                                <small class="text-muted">Foto saat ini:
                                                    <img src="{{ asset('img/penghargaan/' . $item->foto) }}" style="height:30px; border-radius:4px;" class="ms-1">
                                                </small>
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
                        <td colspan="5" class="text-center py-4 text-muted">
                            <i class="bi bi-trophy me-2"></i> Belum ada penghargaan.
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