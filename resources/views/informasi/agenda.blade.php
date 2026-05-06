@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="header-title mb-4" style="border-left: 5px solid #0056b3; padding-left: 15px;">
        <h1 class="fw-bold">Agenda Pimpinan</h1>
        <p class="text-muted">Jadwal kegiatan resmi Sekretariat Daerah Kota Sukabumi</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="py-3 ps-4">Hari & Tanggal</th>
                        <th class="py-3">Nama Kegiatan</th>
                        <th class="py-3">Waktu</th>
                        <th class="py-3 pe-4">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendas as $agenda)
                    <tr>
                        <td class="py-3 ps-4">
                            <strong>{{ $agenda->hari }}</strong><br>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}</small>
                        </td>
                        <td class="py-3 fw-bold text-dark">{{ $agenda->nama_kegiatan }}</td>
                        <td class="py-3">{{ $agenda->jam ?? '-' }}</td>
                        <td class="py-3 pe-4">{{ $agenda->lokasi ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-calendar-x d-block mb-2" style="font-size: 3rem;"></i>
                            Belum ada agenda pimpinan yang tercatat untuk saat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection