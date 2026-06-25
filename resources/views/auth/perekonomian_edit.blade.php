@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Edit Data: {{ strtoupper($slug) }}</h4>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.perekonomian.update', $slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Konten / Keterangan</label>
                <textarea name="konten" class="form-control" rows="6">{{ $data->konten ?? '' }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Upload File (PDF)</label>
                @if(isset($data->file_pdf))
                    <p class="small text-muted">File saat ini: {{ basename($data->file_pdf) }}</p>
                @endif
                <input type="file" name="file_pdf" class="form-control">
            </div>

            <button type="submit" class="btn btn-success px-4">Simpan Data</button>
            <a href="{{ route('admin.perekonomian.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
        </form>
    </div>
</div>
@endsection