<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tupoksi - Admin SETDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        .admin-card { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="p-4 mb-4 text-white" style="background-color: #0056b3; border-bottom: 4px solid #003d80;">
    <div class="container d-flex justify-content-between align-items-center">
        <h4 class="fw-bold m-0">
            <i class="bi bi-file-earmark-text me-2"></i> KELOLA TUPOKSI SETDA
        </h4>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-light fw-bold text-primary">
            <i class="bi bi-arrow-left"></i> KEMBALI 
        </a>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="admin-card">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                @endif

               <form action="{{ route('admin.tupoksi.update') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="form-label fw-bold text-secondary">Konten Tupoksi</label>
        <textarea name="tupoksi" rows="12" class="form-control shadow-sm" required>{{ $data->tupoksi ?? '' }}</textarea>
    </div>
    
    <div class="d-flex justify-content-end border-top pt-3">
        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm rounded-3">
            <i class="bi bi-save me-2"></i> SIMPAN PERUBAHAN
        </button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>