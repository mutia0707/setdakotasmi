<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Staff - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .staff-card { border: none; border-radius: 0; box-shadow: 0 15px 35px rgba(0,0,0,0.05); background: #fff; }
        .staff-header { background: #0056b3; color: white; padding: 25px; }
        .form-control, .form-select { border-radius: 0; padding: 12px; border: 1px solid #ddd; }
        .form-control:focus, .form-select:focus { box-shadow: none; border-color: #0056b3; }
        .btn-custom { border-radius: 0; padding: 12px 25px; font-weight: 700; text-transform: uppercase; }
        .table { background: white; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <span class="navbar-brand fw-bold tracking-wide">
                <i class="bi bi-person-workspace me-2"></i>STAFF SETDA CONTROL PANEL
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm px-3 rounded-0 fw-bold">
                    LOGOUT <i class="bi bi-box-arrow-right ms-1"></i>
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            
            <div class="col-md-11">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center rounded-0 fw-bold py-3 mb-4 shadow-sm">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif
            </div>

            <div class="col-md-11 mb-5">
                <div class="staff-card">
                    <div class="staff-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0 text-uppercase tracking-wider">
                            <i class="bi bi-calendar-plus me-2"></i>Form Penginputan Agenda Baru
                        </h5>
                        <span class="badge bg-white text-primary fw-bold rounded-0">SETDA KOTA SUKABUMI</span>
                    </div>
                    
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('staff.agenda.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-bold text-secondary text-uppercase small">Tanggal Kegiatan</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <label class="form-label fw-bold text-secondary text-uppercase small">Asisten Daerah / Bagian Penginput</label>
                                    <select name="divisi" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Asisten Daerah / Bagian --</option>
                                        <option value="ASDA I (Pemerintahan & Kesejahteraan Rakyat)">ASDA I (Asisten Pemerintahan dan Kesejahteraan Rakyat)</option>
                                        <option value="ASDA II (Perekonomian & Pembangunan)">ASDA II (Asisten Perekonomian dan Pembangunan)</option>
                                        <option value="ASDA III (Administrasi Umum)">ASDA III (Asisten Administrasi Umum)</option>
                                        <option value="Bagian Tata Pemerintahan">Bagian Tata Pemerintahan (Tapem)</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <label class="form-label fw-bold text-secondary text-uppercase small">Nama Agenda / Kegiatan Pimpinan</label>
                                    <textarea name="nama_kegiatan" rows="3" class="form-control" placeholder="Contoh: Rapat Koordinasi Evaluasi SKPD..." required></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-3">
                                <a href="{{ route('home') }}" class="text-muted text-decoration-none small fw-bold">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                                </a>
                                <button type="submit" class="btn btn-primary btn-custom shadow-sm px-4">
                                    Simpan & Publikasikan <i class="bi bi-send ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-11">
                <div class="staff-card p-4">
                    <h5 class="fw-bold text-dark text-uppercase mb-4">
                        <i class="bi bi-table me-2 text-primary"></i>Daftar Riwayat Agenda Terupload
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle m-0">
                            <thead class="table-dark text-uppercase small text-center">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Hari & Tanggal</th>
                                    <th>Nama Kegiatan & Pengirim (Divisi)</th>
                                    <th style="width: 15%;">Aksi Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($agendas as $index => $agenda)
                                <tr>
                                    <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                    <td class="text-center small">
                                        <span class="fw-bold d-block text-primary">{{ $agenda->hari }}</span>
                                        {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <span class="lh-base" style="font-size: 0.95rem;">{{ $agenda->nama_kegiatan }}</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm rounded-0 fw-bold me-1 text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $agenda->id }}">
                                            <i class="bi bi-pencil-square"></i> EDIT
                                        </button>
                                        <a href="{{ route('staff.agenda.delete', $agenda->id) }}" class="btn btn-danger btn-sm rounded-0 fw-bold" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda pimpinan ini secara permanen?')">
                                            <i class="bi bi-trash"></i> HAPUS
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal{{ $agenda->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content rounded-0 border-0 shadow">
                                            <div class="modal-header bg-warning text-white rounded-0 py-3">
                                                <h5 class="modal-title fw-bold text-uppercase"><i class="bi bi-pencil-square me-2"></i>Edit Agenda Pimpinan</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('staff.agenda.update', $agenda->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body p-4 text-start">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold text-secondary small text-uppercase">Tanggal Kegiatan</label>
                                                        <input type="date" name="tanggal" class="form-control" value="{{ $agenda->tanggal }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold text-secondary small text-uppercase">Asisten Daerah / Bagian Penginput</label>
                                                        <select name="divisi" class="form-select" required>
                                                            <option value="ASDA I (Pemerintahan & Kesejahteraan Rakyat)" {{ str_contains($agenda->nama_kegiatan, 'ASDA I') ? 'selected' : '' }}>ASDA I (Asisten Pemerintahan dan Kesejahteraan Rakyat)</option>
                                                            <option value="ASDA II (Perekonomian & Pembangunan)" {{ str_contains($agenda->nama_kegiatan, 'ASDA II') ? 'selected' : '' }}>ASDA II (Asisten Perekonomian dan Pembangunan)</option>
                                                            <option value="ASDA III (Administrasi Umum)" {{ str_contains($agenda->nama_kegiatan, 'ASDA III') ? 'selected' : '' }}>ASDA III (Asisten Administrasi Umum)</option>
                                                            <option value="Bagian Tata Pemerintahan" {{ str_contains($agenda->nama_kegiatan, 'Bagian Tata') ? 'selected' : '' }}>Bagian Tata Pemerintahan (Tapem)</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold text-secondary small text-uppercase">Nama Rapat / Kegiatan</label>
                                                        <textarea name="nama_kegiatan" rows="4" class="form-control" required>{{ preg_replace('/\[.*?\]\s*/', '', $agenda->nama_kegiatan) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light rounded-0">
                                                    <button type="button" class="btn btn-secondary rounded-0 btn-sm fw-bold px-3" data-bs-modal="dismiss" data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-warning rounded-0 btn-sm fw-bold px-4 text-white">SIMPAN PERUBAHAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4 small fw-bold">Belum ada riwayat agenda pimpinan yang diupload melalui panel ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>