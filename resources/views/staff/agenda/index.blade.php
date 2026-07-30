<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Staff - Kelola Agenda</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container py-4">

        <!-- Pesan Sukses / Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header Panel Staff -->
        <div class="row align-items-center p-3 mb-3 text-white shadow-sm" style="background-color: #007bff; border-radius: 8px;">
            <div class="col">
                <h4 class="mb-0 fw-bold">
                    <i class="fas fa-shield-alt me-2"></i> PANEL STAFF: {{ strtoupper(Auth::user()->name ?? 'STAF') }}
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
            <a href="{{ route('staff.agenda.index') }}" class="btn btn-primary btn-sm fw-bold me-2">Kelola Agenda</a>
            <a href="{{ route('staff.berita.index') }}" class="btn btn-outline-primary btn-sm fw-bold">Kelola Berita</a>
        </div>

        <!-- Konten Utama: Form & Tabel -->
        <div class="row">
            <!-- Form Input Agenda -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white fw-bold py-3">
                        <i class="fas fa-calendar-plus me-2"></i> Input Agenda Baru
                    </div>
                    <div class="card-body">
                        <form action="{{ route('staff.agenda.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Kegiatan</label>
                                <textarea name="nama_kegiatan" class="form-control" rows="4" placeholder="Masukkan rincian kegiatan..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Kegiatan (Opsional)</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted" style="font-size: 11px;">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">SIMPAN AGENDA</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Agenda -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                        <strong class="fs-5 text-dark"><i class="fas fa-list-alt me-2"></i> Daftar Agenda Anda</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-3 ps-3">Tanggal</th>
                                        <th class="py-3">Hari</th>
                                        <th class="py-3">Kegiatan</th>
                                        <th class="py-3">Info</th>
                                        <th class="py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($agendas)
                                        @forelse($agendas as $agenda)
                                        <tr>
                                            <td class="ps-3">{{ $agenda->tanggal }}</td>
                                            <td><span class="badge bg-secondary">{{ $agenda->hari }}</span></td>
                                            <td>{{ $agenda->nama_kegiatan }}</td>
                                            <td style="min-width: 180px;">
                                                @if(!empty($agenda->updater_name))
                                                    <small class="text-muted d-block">
                                                        <i class="fas fa-history me-1"></i>
                                                        Diubah oleh <b>{{ $agenda->updater_name }}</b><br>
                                                        {{ \Carbon\Carbon::parse($agenda->updated_at)->diffForHumans() }}
                                                    </small>
                                                @endif
                                                @if(!empty($agenda->lock_info))
                                                    <small class="text-danger d-block mt-1">
                                                        <i class="fas fa-lock me-1"></i>
                                                        Sedang diedit oleh <b>{{ $agenda->lock_info['by'] }}</b>
                                                        ({{ $agenda->lock_info['since'] }})
                                                    </small>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button"
                                                        class="btn btn-warning btn-sm px-3 mb-1 btn-edit-agenda"
                                                        data-id="{{ $agenda->id }}"
                                                        data-tanggal="{{ $agenda->tanggal }}"
                                                        data-kegiatan="{{ $agenda->nama_kegiatan }}"
                                                        {{ !empty($agenda->lock_info) ? 'disabled' : '' }}>
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="{{ route('staff.agenda.delete', $agenda->id) }}"
                                                   class="btn btn-danger btn-sm px-3"
                                                   onclick="return confirm('Yakin ingin menghapus agenda ini?')">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">Belum ada agenda yang diinputkan.</td>
                                        </tr>
                                        @endforelse
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL EDIT AGENDA -->
    <div class="modal fade" id="modalEditAgenda" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditAgenda" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i> Edit Agenda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modalLockWarning" class="alert alert-danger d-none"></div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Kegiatan</label>
                            <textarea name="nama_kegiatan" id="edit_nama_kegiatan" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnBatalEdit" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning fw-bold" id="btnSimpanEdit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const modalEdit = new bootstrap.Modal(document.getElementById('modalEditAgenda'));
        const formEdit = document.getElementById('formEditAgenda');
        const lockWarning = document.getElementById('modalLockWarning');
        const btnSimpan = document.getElementById('btnSimpanEdit');
        let currentEditId = null;

        // Base URL untuk lock/unlock (sesuaikan prefix kalau berbeda)
        const LOCK_URL = "{{ url('/staff/agenda/lock') }}";
        const UNLOCK_URL = "{{ url('/staff/agenda/unlock') }}";
        const UPDATE_URL_BASE = "{{ url('/staff/agenda/update') }}";

        // Klik tombol Edit -> minta lock dulu, baru buka modal
        document.querySelectorAll('.btn-edit-agenda').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;

                fetch(`${LOCK_URL}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    }
                })
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) {
                        // Data sedang dikunci orang lain
                        alert(data.message || 'Data sedang diedit oleh orang lain.');
                        return;
                    }

                    // Berhasil lock -> isi form & buka modal
                    currentEditId = id;
                    document.getElementById('edit_tanggal').value = this.dataset.tanggal;
                    document.getElementById('edit_nama_kegiatan').value = this.dataset.kegiatan;
                    formEdit.action = `${UPDATE_URL_BASE}/${id}`;
                    lockWarning.classList.add('d-none');
                    modalEdit.show();
                })
                .catch(() => alert('Gagal menghubungi server, coba lagi.'));
            });
        });

        // Lepas lock kalau modal ditutup tanpa simpan (klik Batal / tombol X / klik luar modal)
        document.getElementById('modalEditAgenda').addEventListener('hidden.bs.modal', function () {
            if (currentEditId) {
                navigator.sendBeacon(
                    `${UNLOCK_URL}/${currentEditId}`,
                    new Blob([JSON.stringify({ _token: '{{ csrf_token() }}' })], { type: 'application/json' })
                );
                currentEditId = null;
            }
        });

        // Lepas lock juga kalau user menutup tab/browser sambil modal masih terbuka
        window.addEventListener('beforeunload', function () {
            if (currentEditId) {
                navigator.sendBeacon(`${UNLOCK_URL}/${currentEditId}`);
            }
        });
    </script>
</body>
</html>