<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Perencanaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; }
        .page-header { background: linear-gradient(135deg, #004a99, #0066cc); padding: 25px 0; color: #fff; }
        .card-menu { border-radius: 15px; border: none; height: 100%; display: flex; flex-direction: column; align-items: center; padding: 30px; }
        .icon-box { width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 1.8rem; }
    </style>
</head>
<body>
<div class="page-header"><div class="container d-flex justify-content-between align-items-center">
    <h5 class="fw-bold m-0"><i class="bi bi-grid-fill me-2"></i> KELOLA PERENCANAAN</h5>
    <a href="{{ url('/admin/dashboard') }}" class="btn btn-sm btn-light fw-bold px-3 rounded-pill">KEMBALI</a>
</div></div>

<div class="container my-5">
    <div class="row g-4 justify-content-center">
        @php $menus = [
            ['n'=>'Renstra', 'i'=>'file-earmark-pdf', 'r'=>'admin.renstra.edit', 'c'=>'bg-primary'],
            ['n'=>'RPD', 'i'=>'file-earmark-bar-graph', 'r'=>'admin.rpd.edit', 'c'=>'bg-primary'],
            ['n'=>'Fokus Utama', 'i'=>'list-stars', 'r'=>'admin.fokus.edit', 'c'=>'bg-primary'],
            ['n'=>'Sinkronisasi', 'i'=>'diagram-3', 'r'=>'admin.sinkronisasi.edit', 'c'=>'bg-primary']
        ]; @endphp
        @foreach($menus as $m)
        <div class="col-md-3">
            <div class="card card-menu shadow-sm">
                <div class="icon-box {{ $m['c'] }} text-white"><i class="bi bi-{{ $m['i'] }}"></i></div>
                <h6 class="fw-bold text-uppercase">{{ $m['n'] }}</h6>
                <a href="{{ route($m['r']) }}" class="btn btn-primary w-100 mt-auto fw-bold">Kelola</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>