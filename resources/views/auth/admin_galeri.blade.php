<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background-color: #198754; border-bottom: 4px solid #146c43; }
        .btn-edit { background-color: #ffc107; border: none; font-weight: bold; }
        .btn-delete { background-color: #dc3545; border: none; font-weight: bold; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold d-flex align-items-center">
                <i class="bi bi-images me-2"></i> KELOLA MEDIA GALERI SETDA
            </span>
            <a href="{{ route('auth.admin') }}" class="btn btn-sm btn-light fw-bold text-success">
                <i class="bi bi-arrow-left-short fs-5 align-middle"></i> KEMBALI KE DASHBOARD
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px;">
            <h5 class="fw-bold text-dark text-uppercase mb-4">
                <i class="bi bi-cloud-arrow-up-fill me-2 text-success"></i>Upload Dokumentasi Baru
            </h5>
            
            @if(session('success_galeri'))
                <div class="alert alert-success border-0 py-3 mb-3 shadow-sm rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success_galeri') }}
                </div>
            @endif

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">JUDUL KEGIATAN / CAPTION</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Rakor Pelayanan Publik" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold text-secondary small">TIPE MEDIA</label>
                        <select name="tipe" id="tipe_media" class="form-select" required onchange="gantiFormInput(this.value)">
                            <option value="foto">FOTO</option>
                            <option value="video">VIDEO</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold text-secondary small">KATEGORI</label>
                        <select name="kategori" class="form-select" required>
                            <option value="pelayanan">Pelayanan</option>
                            <option value="sosialisasi">Sosialisasi</option>
                            <option value="agenda">Agenda Pimpinan</option>
                        </select>
                    </div>
                    <div class="col-md-4" id="box_input_foto">
                        <label class="form-label fw-bold text-secondary small">PILIH FILE FOTO</label>
                        <input type="file" name="foto_file" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4 d-none" id="box_input_video">
                        <label class="form-label fw-bold text-secondary small">BERKAS VIDEO</label>
                        <input type="file" name="video_file" class="form-control" accept="video/mp4">
                    </div>
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-success fw-bold px-4 shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i> UNGGAH KE GALERI
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-dark text-uppercase m-0">
                    <i class="bi bi-images me-2 text-success"></i>Daftar Riwayat Unggahan
                </h5>
                <span class="badge bg-success px-3 py-2 rounded-pill">Total: {{ count($galeris) }} Konten</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle m-0">
                    <thead class="table-light text-uppercase small text-center fw-bold text-secondary">
                        <tr>
                            <th>No</th>
                            <th>Pratinjau</th>
                            <th>Tipe / Kategori</th>
                            <th>Judul Media</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeris as $idx => $item)
                        <tr>
                            <td class="text-center">{{ $idx + 1 }}</td>
                            <td class="text-center">
                                @if($item->tipe === 'foto')
                                    <img src="{{ asset('img_galeri/' . $item->sumber) }}" style="height: 50px; width: 50px; object-fit: cover;" class="rounded">
                                @else
                                    <div class="bg-dark text-white rounded d-flex align-items-center justify-content-center mx-auto" style="height: 50px; width: 50px;">
                                        <i class="bi bi-play-btn-fill text-danger"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-{{ $item->tipe === 'foto' ? 'success' : 'danger' }} d-block mb-1">{{ strtoupper($item->tipe) }}</span>
                                <small class="text-muted text-capitalize">{{ $item->kategori }}</small>
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-edit btn-sm w-100 mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </button>
                                
                                <form action="{{ route('admin.galeri.delete', $item->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm w-100" onclick="return confirm('Yakin hapus?')">
                                        <i class="bi bi-trash"></i> HAPUS
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </body>
</html>