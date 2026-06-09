@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">Edit Profil Setda</div>
        <div class="card-body">
            <form action="{{ route('admin.profil-setda.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Isi Profil Lengkap</label>
                    <textarea name="isi_profil" class="form-control" rows="10">{{ $data->isi_profil }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection