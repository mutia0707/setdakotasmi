<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Fokus Utama - Admin SETDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        .admin-card { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #333; }
    </style>
</head>
<body>

<div class="p-3 mb-4 text-white" style="background-color: #343a40;">
    <div class="container d-flex justify-content-between align-items-center">
        <h5 class="fw-bold m-0"><i class="bi bi-list-check me-2"></i> KELOLA FOKUS UTAMA</h5>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-sm btn-light fw-bold"><i class="bi bi-arrow-left"></i> KEMBALI</a>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-card">
                @if(session('success'))
                    <div class="alert alert-success py-2 border-0 shadow-sm mb-3">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.fokus.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Teks Fokus Utama</label>
                        <textarea name="fokus_utama" class="form-control" rows="10" required>{{ $data->fokus_utama ?? '' }}</textarea>
                        <small class="text-muted">Gunakan tombol Enter untuk membuat poin baru.</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2">
                        <i class="bi bi-save me-2"></i> SIMPAN PERUBAHAN
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>