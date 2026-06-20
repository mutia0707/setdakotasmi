<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Analisis Kebijakan - Admin SETDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; }
        .admin-card { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="p-4 mb-4 text-white" style="background-color: #6c757d; border-bottom: 4px solid #5a6268;">
    <div class="container d-flex justify-content-between align-items-center">
        <h4 class="fw-bold m-0"><i class="bi bi-graph-up me-2"></i> KELOLA ANALISIS KEBIJAKAN</h4>
        <a href="{{ route('auth.admin') }}" class="btn btn-light fw-bold text-secondary">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="admin-card">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('admin.analisis-kebijakan.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-bold">Tupoksi Utama</label>
                        <textarea name="tupoksi_utama" class="form-control" rows="5">{{ $data->tupoksi_utama ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Rincian Tugas</label>
                        <textarea name="rincian_tugas" class="form-control" rows="5">{{ $data->rincian_tugas ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary mt-3 w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>