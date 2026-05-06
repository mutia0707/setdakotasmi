<!DOCTYPE html>
<html>
<head>
    <title>Input Agenda Pimpinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h4 class="fw-bold">Input Agenda Pimpinan</h4>
            <hr>
            <form action="{{ route('agenda.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Hari</label>
                    <select name="hari" class="form-control" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Kegiatan</label>
                    <textarea name="nama_kegiatan" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan ke Database</button>
                <a href="/" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>