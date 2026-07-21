@extends('layouts.app')

@section('content')

<div class="bg-primary text-white py-3 mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h4 class="mb-0 fw-bold">PANEL STAFF:</h4>
        <div>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm me-2">Kembali ke Web</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light btn-sm text-danger fw-bold">LOGOUT</button>
            </form>
        </div>
    </div>
</div>

<div class="container py-2">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Upload Berita Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Berita</label>
                            <textarea name="isi" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Utama</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Upload Berita</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Daftar Berita Anda</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beritas as $berita)
                            <tr>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->created_at->format('d M Y') }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $berita->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ route('staff.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit untuk berita ini -->
                            <div class="modal fade" id="editModal{{ $berita->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('staff.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Berita</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Judul Berita</label>
                                                    <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Isi Berita</label>
                                                    <textarea name="isi" class="form-control" rows="5" required>{{ $berita->isi_berita }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar Utama</label>
                                                    @if($berita->gambar)
                                                        <div class="mb-2">
                                                            <img src="{{ asset('storage/'.$berita->gambar) }}" style="height:80px;object-fit:cover;" class="rounded">
                                                        </div>
                                                    @endif
                                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection