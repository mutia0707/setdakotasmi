@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* Mengubah font khusus halaman ini agar terkesan premium & clean */
    .agenda-scope {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #fcfdfe;
    }
    .title-gradient {
        font-weight: 800;
        letter-spacing: -0.5px;
        color: #1e293b;
    }
    .accent-line {
        width: 60px; 
        height: 4px; 
        background: linear-gradient(90deg, #0056b3, #3b82f6); 
        margin: 0 auto 40px;
        border-radius: 2px;
    }
    .agenda-card {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        border-left: 5px solid #0056b3;
    }
    .agenda-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 86, 179, 0.08);
    }
    /* Pewarnaan otomatis badge berdasarkan Asisten Daerah */
    .badge-asda-1 { background-color: #e0f2fe; color: #0369a1; }
    .badge-asda-2 { background-color: #fef3c7; color: #b45309; }
    .badge-asda-3 { background-color: #dcfce7; color: #15803d; }
    .badge-tapem { background-color: #f3e8ff; color: #6b21a8; }
    .badge-default { background-color: #f1f5f9; color: #475569; }
</style>

<div class="container py-5 agenda-scope" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-lg-10 text-center">
            
            <h2 class="title-gradient mb-2 fs-1">Agenda Kegiatan Pimpinan</h2>
            <p class="text-muted mb-3">Transparansi Jadwal dan Kegiatan Internal Sekretariat Daerah Kota Sukabumi</p>
            <div class="accent-line"></div>

            <div class="row text-start mt-2">
                @forelse($agendas as $agenda)
                    @php
                        // Logika pemisahan teks otomatis [Divisi] dari inti kegiatan
                        $text = $agenda->nama_kegiatan;
                        $divisi = "Sekretariat Daerah";
                        $kegiatan = $text;
                        $badgeClass = "badge-default";

                        if (preg_match('/^\[(.*?)\]\s*(.*)$/', $text, $matches)) {
                            $divisi = $matches[1];
                            $kegiatan = $matches[2];
                            
                            // Menentukan warna badge berdasarkan kata kunci divisi
                            if (str_contains($divisi, 'I')) $badgeClass = 'badge-asda-1';
                            elseif (str_contains($divisi, 'II')) $badgeClass = 'badge-asda-2';
                            elseif (str_contains($divisi, 'III')) $badgeClass = 'badge-asda-3';
                            elseif (str_contains($divisi, 'Tata') || str_contains($divisi, 'Tapem')) $badgeClass = 'badge-tapem';
                        }
                    @endphp

                    <div class="col-12 mb-4">
                        <div class="card agenda-card p-4">
                            <div class="d-flex flex-column flex-md-row align-items-start justify-content-between">
                                
                                <div class="pe-md-4 mb-3 mb-md-0">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                        <span class="badge bg-light text-dark border px-3 py-2 fw-semibold" style="font-size: 0.85rem;">
                                            <i class="bi bi-calendar3 text-primary me-2"></i>{{ $agenda->hari }}, {{ \Carbon\Carbon::parse($agenda->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                                        </span>
                                        <span class="badge {{ $badgeClass }} px-3 py-2 fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                                            <i class="bi bi-building me-1"></i> {{ $divisi }}
                                        </span>
                                    </div>
                                    
                                    <h4 class="fw-bold text-dark m-0 lh-base" style="font-size: 1.25rem; color: #1e293b !important;">
                                        {{ $kegiatan }}
                                    </h4>
                                </div>

                                <div class="text-md-end flex-shrink-0 pt-1">
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock-history me-1"></i> Diperbarui {{ \Carbon\Carbon::parse($agenda->updated_at ?? now())->diffForHumans() }}
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm p-5 text-center" style="background-color: #f8fafc; border-radius: 20px;">
                            <div class="card-body py-4">
                                <div class="display-1 text-muted mb-4"><i class="bi bi-calendar-x" style="color: #cbd5e1;"></i></div>
                                <h5 class="fw-bold text-secondary mb-2">Belum Ada Agenda Terjadwal</h5>
                                <p class="text-muted mx-auto" style="max-width: 450px;">Seluruh agenda pimpinan untuk hari ini telah selesai atau belum diinput oleh staf terkait.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            @if(auth()->check() && auth()->user()->role == 'staff')
                <div class="mt-5 pt-3 text-center">
                    <a href="{{ route('staff.agenda.index') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow" style="background: linear-gradient(135deg, #0056b3, #2563eb); border: none; letter-spacing: 0.3px;">
                        <i class="bi bi-plus-circle-fill me-2"></i> Masuk Panel Input Staff
                    </a>
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection