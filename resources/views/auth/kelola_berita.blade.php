<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .navbar-admin { background-color: #0056b3; border-bottom: 4px solid #003d80; }
        .btn-edit { background-color: #ffc107; color: #fff; font-weight: bold; }
        .btn-edit:hover { background-color: #e0a800; color: #fff; }
        .btn-delete { background-color: #dc3545; color: #fff; font-weight: bold; }
        .btn-delete:hover { background-color: #bd2130; color: #fff; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold d-flex align-items-center">
                <i class="bi bi-newspaper me-2"></i> KELOLA BERITA KOTA SETDA
            </span>
            <div>
                <a href="{{ route('auth.admin') }}" class="btn btn-sm btn-light fw-bold text-primary">
                    <i class="bi bi-arrow-left-short fs-5 align-middle"></i> KEMBALI KE DASHBOARD
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px; background: #fff;">
            <h5 class="fw-bold text-dark text-uppercase mb-4">
                <i class="bi bi-cloud-arrow-up-fill me-2 text-primary"></i>Upload Berita Hari Ini
            </h5>
            
            @if(session('success'))
                <div class="alert alert-success border-0 py-3 mb-3 shadow-sm rounded-3">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">JUDUL BERITA</label>
                        <input type="text" name="judul" class="form-control" placeholder="Ketik judul berita..." required>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">ISI BERITA</label>
                        <textarea name="isi" rows="1" class="form-control" placeholder="Tulis rincian berita hari ini..." required></textarea>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-secondary small">FOTO PENDUKUNG</label>
                        <div class="input-group">
                            <input type="file" name="gambar" class="form-control" required>
                            <button type="submit" class="btn btn-primary fw-bold px-4">UPLOAD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4 mb-5" style="border-radius: 12px; background: #fff;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-dark text-uppercase m-0">
                    <i class="bi bi-folder-fill me-2 text-primary"></i>Daftar Riwayat Berita Kota
                </h5>
                
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle m-0">
                    <thead class="table-light text-uppercase small text-center fw-bold text-secondary">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 12%;">Foto</th>
                            <th style="width: 25%;">Judul Berita</th>
                            <th>Isi Konten Berita</th>
                            <th style="width: 18%;">Tindakan Kontrol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritas as $index => $berita)
                        <tr>
                            <td class="text-center fw-bold text-secondary">{{ $index + 1 }}</td>
                            <td class="text-center">
                                @if($berita->gambar)
                                    <img src="{{ asset('img_berita/' . $berita->gambar) }}" alt="Foto" class="img-thumbnail" style="max-height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada foto</span>
                                @endif
                            </td>
                            <td><strong class="text-dark d-block" style="font-size: 0.95rem;">{{ $berita->judul }}</strong></td>
                            <td>
                                <p class="text-muted m-0 text-truncate" style="max-width: 420px; font-size: 0.9rem;">
                                    {{ $berita->isi_berita }}
                                </p>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-edit btn-sm w-100 mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $berita->id }}">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </button>
                                
                                <form action="{{ route('admin.berita.delete', $berita->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm w-100" onclick="return confirm('Yakin ingin menghapus berita?')">
                                        <i class="bi bi-trash"></i> HAPUS
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $berita->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                                    <div class="modal-header bg-warning text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                        <h5 class="modal-title fw-bold text-uppercase"><i class="bi bi-pencil-square me-2"></i>Edit Informasi Berita</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body p-4 text-start">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold text-secondary text-uppercase small">Judul Utama Berita</label>
                                                <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold text-secondary text-uppercase small">Isi Konten Berita</label>
                                                <textarea name="isi" rows="6" class="form-control" required>{{ $berita->isi_berita }}</textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label fw-bold text-secondary text-uppercase small">Ganti Foto Pendukung (Opsional)</label>
                                                <input type="file" name="gambar" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                                            <button type="button" class="btn btn-secondary btn-sm fw-bold px-3" data-bs-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-warning btn-sm fw-bold px-4 text-white">SIMPAN PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4 small fw-bold">Belum ada konten berita kota yang terdaftar.</td>
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