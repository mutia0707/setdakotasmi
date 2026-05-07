@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Agenda Pimpinan</h2>
    <p>Halaman ini bisa dilihat oleh masyarakat umum.</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Waktu</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4" class="text-center">Belum ada agenda terbaru.</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection