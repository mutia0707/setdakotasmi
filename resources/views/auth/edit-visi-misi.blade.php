@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{-- Notifikasi Sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Visi & Misi</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.visi-misi.update') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Visi</label>
                            <textarea name="visi" class="form-control border-primary-subtle" rows="6">{{ $data->visi }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Misi</label>
                            <textarea name="misi" class="form-control border-primary-subtle" rows="6">{{ $data->misi }}</textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection