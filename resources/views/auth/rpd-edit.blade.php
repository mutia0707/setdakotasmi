<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RPD - Admin SETDA</title>
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
        <h5 class="fw-bold m-0"><i class="bi bi-file-earmark-bar-graph me-2"></i> KELOLA RPD</h5>
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

                <form action="{{ route('admin.rpd.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi (Judul/RPD)</label>
                        <textarea name="deskripsi" class="form-control" rows="6" required>{{ $data->deskripsi ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fokus Utama (Tujuan Strategis)</label>
                        <textarea name="tujuan_strategis" class="form-control" rows="6">{{ $data->tujuan_strategis ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File PDF</label>
                        <input type="file" name="file_pdf" class="form-control form-control-sm">
                        @if(isset($data->file_pdf) && $data->file_pdf)
                            <small class="text-muted d-block mt-1"><i class="bi bi-file-earmark-check"></i> Saat ini: {{ basename($data->file_pdf) }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2">
                        <i class="bi bi-save me-2"></i> SIMPAN PERUBAHAN
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>