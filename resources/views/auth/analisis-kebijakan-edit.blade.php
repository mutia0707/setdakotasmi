@extends('auth.admin') 
@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Edit Analisis Kebijakan</h4>
        <form action="{{ route('auth.analisis-kebijakan.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">Tupoksi Utama</label>
                <textarea name="tupoksi_utama" class="form-control" rows="5">{{ $data->tupoksi_utama ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Rincian Tugas</label>
                <textarea name="rincian_tugas" class="form-control" rows="5">{{ $data->rincian_tugas ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection