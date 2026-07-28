<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Staff - Kelola Berita</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container py-4">

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header Panel Staff -->
        <div class="row align-items-center p-3 mb-3 text-white shadow-sm" style="background-color: #007bff; border-radius: 8px;">
            <div class="col">
                <h4 class="mb-0 fw-bold">
                    <i class="fas fa-shield-alt me-2"></i> PANEL STAFF: {{ strtoupper(Auth::user()->name ?? Auth::user()->bagian ?? 'STAF') }}
                </h4>
            </div>
            <div class="col-auto">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-light btn-sm me-2 fw-bold" target="_blank">Lihat Web Publik</a>
                <a href="{{ route('logout') }}" class="btn btn-light btn-sm text-danger fw-bold" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- TOMBOL NAVIGASI MENU -->
        <div class="mb-4">
            <a href="{{ route('staff.agenda.index') }}" class="btn btn-outline-primary btn-sm fw-bold me-2">Kelola Agenda</a>
            <a href="{{ route('staff.berita.index') }}" class="btn btn-primary btn-sm fw-bold">Kelola Berita</a>
        </div>

        <div class="row">
            <!-- Form Upload Berita Baru -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="bi bi-cloud-arrow-up-fill me-2"></i> Upload Berita Baru
                    </div>
                    <div class="card-body">
                        <form action="{{ route('staff.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Judul Berita</label>
                                <input type="text" name="judul" class="form-control" required placeholder="Masukkan judul berita...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Isi Berita</label>
                                <textarea name="isi" class="form-control" rows="5" required placeholder="Tulis rincian berita..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Foto Pendukung (Opsional)</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                                <small class="text-muted" style="font-size: 11px;">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">SIMPAN BERITA</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Berita Bagian Terkait -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                        <strong class="fs-5 text-dark"><i class="bi bi-table me-2"></i> Daftar Berita Bagian Anda</strong>
                        <span class="badge bg-primary">{{ count($beritas) }} Berita</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3 py-3" style="width: 15%;">Gambar</th>
                                        <th class="py-3" style="width: 40%;">Judul Berita</th>
                                        <th class="py-3" style="width: 20%;">Uploader</th>
                                        <th class="py-3" style="width: 15%;">Tanggal</th>
                                        <th class="text-center py-3" style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($beritas as $item)
                                        <tr>
                                            <td class="ps-3">
                                                @if($item->gambar)
                                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded shadow-sm" style="width: 60px; height: 45px; object-fit: cover;">
                                                @else
                                                    <span class="badge bg-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="fw-bold text-dark d-block">{{ $item->judul }}</span>
                                                <small class="text-muted">{{ Str::limit(strip_tags($item->isi_berita ?? $item->isi), 40) }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-info text-dark">
                                                    <i class="bi bi-person-fill me-1"></i> {{ $item->user->name ?? $item->user->bagian ?? $item->bagian ?? 'Staff' }}
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</small>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('staff.berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1"><i class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">Belum ada berita yang diunggah oleh bagian ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>