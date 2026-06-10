<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Setda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .bg-header { background-color: #0056b3; padding: 25px 0; color: white; }
    </style>
</head>
<body>

<div class="bg-header mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3 class="fw-bold m-0"><i class="bi bi-pencil-square me-2"></i> EDIT PROFIL SETDA</h3>
        <a href="{{ url()->previous() }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</div>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.profil-setda.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold">Isi Profil Lengkap</label>
                    <textarea name="isi_profil" class="form-control" rows="12" style="border-radius: 12px;">{{ $data->isi_profil }}</textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>