@extends('layouts.app')

@section('content')
<style>
    /* Styling khusus agar sesuai permintaan */
    body { background-color: #f4f7f9; }
    .page-header { 
        background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
        padding: 60px 0 110px 0; 
        color: #ffffff; 
    }
    .logo-img { width: 60px; height: 60px; object-fit: contain; }
    .main-content { 
        background: #ffffff; 
        border-radius: 12px; 
        padding: 40px; 
        margin-top: -70px; 
        margin-bottom: 60px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
    }
    .agenda-card { transition: 0.3s; border-left: 5px solid #0056b3; }
    .agenda-card:hover { transform: scale(1.01); box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important; }
</style>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4" alt="Logo">
            <div>
                <h2 class="fw-bold m-0 text-white">AGENDA KEGIATAN PIMPINAN</h2>
                <small class="text-white-50 text-uppercase" style="letter-spacing: 1px;">Sekretariat Daerah Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="main-content">
        <h4 class="mb-4 fw-bold text-primary"><i class="bi bi-list-ul me-2"></i> Daftar Agenda Terbaru</h4>
        
        @forelse($agendas as $agenda)
            <div class="card mb-3 border-0 shadow-sm agenda-card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-primary me-2">
                            <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($agenda->tanggal)->isoFormat('dddd, D MMMM Y') }}
                        </span>
                        <span class="badge bg-dark">{{ $agenda->jabatan }}</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">{{ $agenda->nama_kegiatan }}</h5>
                    <small class="text-muted"><i class="bi bi-clock-history me-1"></i> {{ \Carbon\Carbon::parse($agenda->updated_at)->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <div class="display-4 text-muted"><i class="bi bi-calendar-x"></i></div>
                <p class="text-muted mt-2">Belum ada agenda yang dijadwalkan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection