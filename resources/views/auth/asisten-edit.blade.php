<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Edit Data {{ strtoupper($kode) }}</h3>
        <form action="{{ route('admin.asisten.update', $kode) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama Pejabat</label>
                <input type="text" name="nama_pejabat" class="form-control" value="{{ $data->nama_pejabat }}">
            </div>
            <div class="mb-3">
                <label>Tugas & Fungsi</label>
                <textarea name="tugas_fungsi" class="form-control" rows="8">{{ $data->tugas_fungsi }}</textarea>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('auth.admin') }}" class="btn btn-secondary">Kembali</a>
        </form>
        <!-- Notifikasi Sukses -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{ route('admin.asisten.update', $kode) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Konten form Anda... -->
</form>
    </div>
</div>
</body>
</html>