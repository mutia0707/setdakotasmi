@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-primary">← KEMBALI</a>
    </div>

    <div class="mb-4">
        <h2>VISI & MISI</h2>
        <hr>
    </div>

    {{-- ✅ HANYA ADMIN YANG BISA LIHAT FORM --}}
    @auth
        @if(auth()->user()->role == 'admin')
        <div class="card mb-4 border-warning">
            <div class="card-body bg-light">
                <h5 class="text-warning">Edit Visi & Misi</h5>
                <form action="{{ route('admin.visi-misi.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Visi</label>
                        <textarea name="visi" class="form-control">{{ $data->visi ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Misi</label>
                        <textarea name="misi" class="form-control">{{ $data->misi ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </form>
            </div>
        </div>
        @endif
    @endauth

    {{-- ✅ PUBLIK & ADMIN BISA LIHAT --}}
    <div class="content">
        <h4>Visi:</h4>
        <p>{{ $data->visi ?? 'Data belum diisi' }}</p>
        
        <h4>Misi:</h4>
        <p>{!! nl2br(e($data->misi ?? 'Data belum diisi')) !!}</p>
    </div>

</div>
@endsection