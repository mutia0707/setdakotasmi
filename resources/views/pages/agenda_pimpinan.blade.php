@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 60vh;">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h2 class="fw-bold mb-4">Agenda Pimpinan</h2>
            <hr style="width: 50px; border: 2px solid #0056b3; margin: 0 auto 30px;">

            <div class="card border-0 shadow-sm p-5" style="background-color: #f8f9fa; border-radius: 15px;">
                <div class="card-body">
                    <i class="bi bi-calendar-x" style="font-size: 5rem; color: #ccc;"></i>
                    <h5 class="mt-4 text-secondary">Belum ada agenda pimpinan untuk saat ini.</h5>
                    <p class="text-muted">Silakan cek kembali nanti atau hubungi bagian Sekretariat Daerah.</p>
                </div>
            </div>

            @if(auth()->check() && auth()->user()->role == 'staff')
                <div class="mt-4">
                    <a href="{{ route('auth.staffagenda') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i> Isi Form Agenda Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection