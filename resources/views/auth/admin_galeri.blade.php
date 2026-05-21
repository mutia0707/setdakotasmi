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
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-admin shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold d-flex align-items-center">
                <i class="bi bi-images me-2"></i> KELOLA MEDIA GALERI SETDA
            </span>
            <div>
                <a href="{{ route('auth.admin') }}" class="btn btn-sm btn-light fw-bold text-success">
                    <i class="bi bi-arrow-left-short fs-5 align-middle"></i> KEMBALI KE DASHBOARD
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        
        <div class="card border-0 shadow-sm p-4" style="border-radius: 12px; background: #fff;">
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
                            <option value="foto">FOTO (Gambar)</option>
                            <option value="video">VIDEO (YouTube)</option>
                        </select>
                    </div>
                    
                    <div class="col-md-2">
                        <label class="form-label fw-bold text-secondary small">KATEGORI FILTER</label>
                        <select name="kategori" class="form-select" required>
                            <option value="pelayanan">Pelayanan</option>
                            <option value="sosialisasi">Sosialisasi</option>
                            <option value="agenda">Agenda Pimpinan</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4" id="box_input_foto">
                        <label class="form-label fw-bold text-secondary small">PILIH FILE FOTO (JPG/PNG)</label>
                        <input type="file" name="foto_file" class="form-control">
                    </div>
                    
                    <div class="col-md-4 d-none" id="box_input_video">
                        <label class="form-label fw-bold text-secondary small">LINK URL VIDEO YOUTUBE</label>
                        <input type="url" name="video_url" class="form-control" placeholder="https://www.youtube.com/watch?v=xxxx">
                    </div>
                    
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-success fw-bold px-4 shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i> UNGGAH KE GALERI
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm p-4 mt-5 mb-5" style="border-radius: 12px; background: #fff;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-dark text-uppercase m-0">
                    <i class="bi bi-images me-2 text-success"></i>Daftar Riwayat Unggahan Galeri
                </h5>
                <span class="badge bg-success px-3 py-2 rounded-pill">Total: {{ count($galeris) }} Konten</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle m-0">
                    <thead class="table-light text-uppercase small text-center fw-bold text-secondary">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 12%;">Pratinjau</th>
                            <th style="width: 15%;">Tipe / Kategori</th>
                            <th>Judul / Caption Media</th>
                            <th style="width: 18%;">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeris as $idx => $item)
                        <tr>
                            <td class="text-center fw-bold text-secondary">{{ $idx + 1 }}</td>
                            <td class="text-center">
                                @if($item->tipe === 'foto')
                                    <img src="{{ asset('img_galeri/' . $item->sumber) }}" alt="Foto" class="img-thumbnail" style="max-height: 50px; width: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-dark text-white rounded d-flex align-items-center justify-content-center mx-auto" style="height: 45px; width: 60px; font-size: 0.7rem;">
                                        <i class="bi bi-play-btn-fill text-danger me-1"></i> Video
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-{{ $item->tipe === 'foto' ? 'success' : 'danger' }} text-uppercase mb-1 d-block">{{ $item->tipe }}</span>
                                <span class="text-muted small text-capitalize">{{ $item->kategori }}</span>
                            </td>
                            <td><span class="text-dark fw-semibold" style="font-size: 0.9rem;">{{ $item->judul }}</span></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm fw-bold text-white px-3 me-1 rounded-2" data-bs-toggle="modal" data-bs-target="#editGaleriModal{{ $item->id }}">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </button>
                                <a href="{{ route('admin.galeri.delete', $item->id) }}" class="btn btn-danger btn-sm fw-bold text-white px-3 rounded-2" onclick="return confirm('Apakah anda yakin ingin menghapus media ini?')">
                                    <i class="bi bi-trash"></i> HAPUS
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editGaleriModal{{ $item->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                                    <div class="modal-header bg-warning text-white" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                        <h5 class="modal-title fw-bold text-uppercase"><i class="bi bi-pencil-square me-2"></i>Edit Data Galeri</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <form action="{{ route('admin.galeri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body p-4 text-start">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold text-secondary small">JUDUL KEGIATAN / CAPTION</label>
                                                    <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">TIPE MEDIA</label>
                                                    <select name="tipe" id="tipe_media_edit{{ $item->id }}" class="form-select" required onchange="gantiFormInputEdit(this.value, '{{ $item->id }}')">
                                                        <option value="foto" {{ $item->tipe == 'foto' ? 'selected' : '' }}>FOTO (Gambar)</option>
                                                        <option value="video" {{ $item->tipe == 'video' ? 'selected' : '' }}>VIDEO (YouTube)</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">KATEGORI FILTER</label>
                                                    <select name="kategori" class="form-select" required>
                                                        <option value="pelayanan" {{ $item->kategori == 'pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                                                        <option value="sosialisasi" {{ $item->kategori == 'sosialisasi' ? 'selected' : '' }}>Sosialisasi</option>
                                                        <option value="agenda" {{ $item->kategori == 'agenda' ? 'selected' : '' }}>Agenda Pimpinan</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-12 {{ $item->tipe == 'video' ? 'd-none' : '' }}" id="box_edit_foto{{ $item->id }}">
                                                    <label class="form-label fw-bold text-secondary small">GANTI FILE FOTO (Opsional - Kosongkan jika tidak diubah)</label>
                                                    <input type="file" name="foto_file" class="form-control">
                                                    <span class="text-muted small d-block mt-1">File saat ini: {{ $item->sumber }}</span>
                                                </div>
                                                
                                                <div class="col-md-12 {{ $item->tipe == 'foto' ? 'd-none' : '' }}" id="box_edit_video{{ $item->id }}">
                                                    <label class="form-label fw-bold text-secondary small">LINK URL VIDEO YOUTUBE</label>
                                                    <input type="url" name="video_url" class="form-control" value="{{ $item->tipe == 'video' ? $item->sumber : '' }}" placeholder="https://www.youtube.com/watch?v=xxxx">
                                                </div>
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
                            <td colspan="5" class="text-center text-muted py-4 small fw-bold">Belum ada media galeri publik yang diunggah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function gantiFormInput(tipe) {
            const boxFoto = document.getElementById('box_input_foto');
            const boxVideo = document.getElementById('box_input_video');
            
            if(tipe === 'foto') {
                boxFoto.classList.remove('d-none');
                boxVideo.classList.add('d-none');
                boxVideo.querySelector('input').removeAttribute('required');
            } else {
                boxFoto.classList.add('d-none');
                boxVideo.classList.remove('d-none');
                boxVideo.querySelector('input').setAttribute('required', 'required');
            }
        }

        function gantiFormInputEdit(tipe, id) {
            const boxFoto = document.getElementById('box_edit_foto' + id);
            const boxVideo = document.getElementById('box_edit_video' + id);
            
            if(tipe === 'foto') {
                boxFoto.classList.remove('d-none');
                boxVideo.classList.add('d-none');
            } else {
                boxFoto.classList.add('d-none');
                boxVideo.classList.remove('d-none');
            }
        }
    </script>
</body>
</html>