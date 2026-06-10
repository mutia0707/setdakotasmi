<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Visi & Misi - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .bg-header { background-color: #0056b3; padding: 25px 0; color: white; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
    </style>
</head>
<body>

<div class="bg-header mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}" 
                 onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                 alt="Logo" class="logo-img me-3">
            <h3 class="fw-bold m-0 text-uppercase">KELOLA VISI & MISI</h3>
        </div>
        
        <a href="{{ url()->previous() }}" class="btn btn-light text-primary fw-bold px-4 rounded-pill">
            <i class="bi bi-arrow-left"></i> KEMBALI
        </a>
    </div>
</div>

<div class="container pb-5">
    @if(session('success'))
        <div class="alert alert-success shadow-sm mb-4">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.visi-misi.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold">Visi</label>
                    <input type="text" name="visi" class="form-control" value="{{ $data->visi ?? '' }}" required style="border-radius: 12px; padding: 12px;">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Misi</label>
                    <textarea name="misi" class="form-control" rows="10" required style="border-radius: 12px; padding: 15px;">{{ $data->misi ?? '' }}</textarea>
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