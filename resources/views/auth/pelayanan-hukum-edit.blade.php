<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit {{ str_replace('_', ' ', strtoupper($jenis)) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #f0f4f8; }
        .navbar-admin { background: linear-gradient(135deg, #004a99, #0066cc); border-bottom: 4px solid #003d80; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-admin py-3">
    <div class="container">
        <span class="navbar-brand fw-bold">Edit {{ str_replace('_', ' ', strtoupper($jenis)) }}</span>
        <a href="{{ route('admin.pelayanan-hukum.menu') }}" class="btn btn-light btn-sm fw-bold text-primary">KEMBALI</a>
    </div>
</nav>

<div class="container mt-5" style="max-width:700px">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form action="{{ route('admin.pelayanan-hukum.update', $jenis) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5">{{ $data->deskripsi ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Upload File PDF</label>
                <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                @if(!empty($data->file_pdf))
                    <small class="text-muted">File saat ini: 
                        <a href="{{ asset('storage/'.$data->file_pdf) }}" target="_blank">Lihat PDF</a>
                    </small>
                @endif
            </div>
            <button class="btn btn-primary fw-bold w-100">SIMPAN</button>
        </form>
    </div>
</div>
</body>
</html>