<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinkronisasi Program - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        .page-header { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            padding: 50px 0 90px 0; 
            color: #ffffff; 
        }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        .main-content { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 40px; 
            margin-top: -60px; 
            margin-bottom: 60px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            border-top: 4px solid #0dcaf0; /* Warna Info (Biru Muda) */
        }
        .sync-badge { background-color: #333; color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logosetda.png') }}" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" alt="Logo" class="logo-img me-3">
            <div>
                <h3 class="fw-bold m-0 text-white">SINKRONISASI</h3>
                <small class="text-white-50 text-uppercase">Program & Kebijakan Setda Kota Sukabumi</small>
            </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-light px-4 rounded-pill fw-bold">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="main-content">
                @if(isset($data) && $data->sinkronisasi)
                    <div class="text-secondary lh-lg">
                        {!! nl2br(e($data->sinkronisasi)) !!}
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <p>Data sinkronisasi belum diatur melalui panel admin.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>