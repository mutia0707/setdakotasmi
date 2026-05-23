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
        /* Tema Kuning */
        .header-bg { background-color: #ffc107; }
        .btn-warning { background-color: #ffc107; border: none; color: #000; font-weight: bold; }
        .btn-edit { background-color: #ffc107; border: none; color: #000; font-weight: bold; }
        .btn-danger { background-color: #dc3545; border: none; font-weight: bold; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark header-bg shadow-sm py-3 mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold text-dark d-flex align-items-center">
                <i class="bi bi-file-earmark-pdf me-2"></i> KELOLA DOKUMEN PDF
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
                        <label class="fw-bold small">JUDUL DOKUMEN</label>
                        <input type="text" name="judul" class="form-control" placeholder="Ketik judul dokumen..." required>
                    </div>
                    <div class="col-md-3">
                        <label class="fw-bold small">BAGIAN</label>
                        <select name="bagian" class="form-select">
                            <option value="humas">Humas</option>
                            <option value="kesra">Kesra</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold small">PILIH FILE PDF</label>
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
                        <td>{{ strtoupper($doc->bagian) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.dokumen.edit', $doc->id) }}" class="btn btn-edit btn-sm mb-1">
                                <i class="bi bi-pencil-square"></i> EDIT
                            </a>
                            <form action="{{ route('admin.dokumen.destroy', $doc->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i> HAPUS
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">Belum ada konten.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>