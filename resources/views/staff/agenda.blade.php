@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center p-3 mb-4 text-white shadow-sm" style="background-color: #007bff; border-radius: 8px;">
        <div class="col">
            <h4 class="mb-0 fw-bold"><i class="fas fa-shield-alt"></i> PANEL STAFF: {{ strtoupper(Auth::user()->jabatan) }}</h4>
        </div>
        <div class="col-auto">
            <a href="/" class="btn btn-outline-light btn-sm me-2 fw-bold">Kembali ke Web</a>
            <a href="{{ route('logout') }}" class="btn btn-light btn-sm text-danger fw-bold" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white"><strong>Input Agenda Baru</strong></div>
                <div class="card-body">
                    <form action="{{ route('staff.agenda.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kegiatan</label>
                            <textarea name="nama_kegiatan" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">SIMPAN AGENDA</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0"><strong>Daftar Agenda Anda</strong></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Kegiatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                                <tr>
                                    <td>{{ $agenda->tanggal }}</td>
                                    <td>{{ $agenda->hari }}</td>
                                    <td>{{ $agenda->nama_kegiatan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('staff.agenda.delete', $agenda->id) }}" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection