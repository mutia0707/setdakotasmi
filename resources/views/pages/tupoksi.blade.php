<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tupoksi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Roboto, sans-serif; color: #000000; line-height: 1.6; }
        .navbar { background-color: #ffffff !important; border-bottom: 3px solid #0056b3; padding: 10px 0; }
        .navbar-brand span { font-weight: 800; color: #0056b3; }
        .content-card { 
            background: #ffffff;
            border-radius: 4px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05); 
            padding: 40px; 
            margin-bottom: 20px;
        }
        footer { padding: 40px 0; color: #666; font-size: 0.85rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="35" class="me-3"> 
            <span>SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-outline-dark btn-sm fw-bold px-4">
            <i class="bi bi-arrow-left me-1"></i> KEMBALI
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="content-card">
                <h2 class="fw-bold mb-4">Tugas Pokok & Fungsi</h2>
                <hr class="mb-4">
                
                <div style="line-height: 1.8; font-size: 1.1rem; color: #333; white-space: pre-line;">
                    {{-- Menggunakan isi_tupoksi agar sesuai dengan database dan memproses angka menjadi tebal --}}
                    {!! preg_replace('/(\d+\.\s)/', '<br><br><strong>$1</strong>', e($data->isi_tupoksi ?? 'Data Tupoksi belum diatur oleh admin.')) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p class="mb-0">Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
    <p class="small text-uppercase m-0">Bagian Organisasi Sekretariat Daerah</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>