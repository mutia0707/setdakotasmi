<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Struktur - Admin SETDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        .admin-card { background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="p-4 mb-4 text-white" style="background-color: #343a40; border-bottom: 4px solid #212529;">
    <div class="container d-flex justify-content-between align-items-center">
        <h4 class="fw-bold m-0">
            <i class="bi bi-diagram-3 me-2"></i> KELOLA STRUKTUR ORGANISASI
        </h4>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-light fw-bold text-dark">
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

                <form action="{{ route('admin.struktur.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @if($data && $data->gambar_struktur)
                        <div class="mb-3">
                            <label class="form-label text-muted">Gambar Bagan Saat Ini:</label>
                            <div class="border p-2 rounded bg-light mb-2">
                                <img src="{{ asset('storage/' . $data->gambar_struktur) }}" class="img-fluid" style="max-height: 200px;">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="fw-bold mb-2">Upload Gambar Bagan Baru</label>
                        <input type="file" name="gambar" class="form-control">
                        <small class="text-muted">Format: JPG/PNG (Opsional, biarkan kosong jika tidak mengubah gambar)</small>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold mb-2">Keterangan Struktur</label>
                        <textarea name="keterangan" class="form-control" rows="8">{{ $data->keterangan ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success px-4 py-2">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>