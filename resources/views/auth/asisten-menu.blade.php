<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div style="background-color: #0d6efd; color: white; padding: 15px 25px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; border-radius: 4px;">
    <h5 style="margin: 0; font-weight: 500;">
        <i class="bi bi-grid-3x3-gap"></i> KELOLA DATA ASISTEN
    </h5>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm">← KEMBALI</a>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Pilih Asisten yang Ingin Dikelola</h2>
        <p class="text-muted">Klik salah satu tombol di bawah untuk mengubah data pejabat</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-3">
            <a href="{{ route('admin.asisten.edit', 'asda1') }}" class="btn btn-primary w-100 py-4 shadow-sm fw-bold fs-5">
                <i class="bi bi-person-fill"></i> ASDA I
            </a>
        </div>
        
        <div class="col-md-3">
            <a href="{{ route('admin.asisten.edit', 'asda2') }}" class="btn btn-success w-100 py-4 shadow-sm fw-bold fs-5">
                <i class="bi bi-person-fill"></i> ASDA II
            </a>
        </div>
        
        <div class="col-md-3">
            <a href="{{ route('admin.asisten.edit', 'asda3') }}" class="btn btn-warning w-100 py-4 shadow-sm fw-bold fs-5 text-white">
                <i class="bi bi-person-fill"></i> ASDA III
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>