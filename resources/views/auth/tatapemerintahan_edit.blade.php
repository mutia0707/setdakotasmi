@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Edit Data: {{ strtoupper(str_replace('-', ' ', $slug)) }}</h4>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Gunakan rute tanpa strip: admin.tatapemerintahan.update --}}
        <form action="{{ route('admin.tatapemerintahan.update', $slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Judul Halaman</label>
                <input type="text" name="judul" class="form-control" value="{{ $data->judul ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konten / Keterangan</label>
                <textarea name="konten" class="form-control" rows="6">{{ $data->konten ?? '' }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Dokumentasi Foto</label>
                @if(isset($data->gambar) && $data->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $data->gambar) }}" width="150" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label">Upload File (PDF)</label>
                @if(isset($data->file_pdf) && $data->file_pdf)
                    <p class="small text-muted">File saat ini: {{ basename($data->file_pdf) }}</p>
                @endif
                <input type="file" name="file_pdf" class="form-control" accept=".pdf">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                {{-- Gunakan rute tanpa strip: admin.tatapemerintahan.index --}}
                <a href="{{ route('admin.tatapemerintahan.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection