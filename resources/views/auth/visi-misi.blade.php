<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; color: #333; }
        
        /* Header Formal */
        .page-header { 
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
            padding: 40px 0; 
            color: #ffffff; 
        }
        
        /* Kontainer Konten */
        .main-content { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 50px; 
            margin-top: -30px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        /* Styling Judul Bagian */
        .section-heading { 
            color: #0056b3; 
            font-weight: 700; 
            border-bottom: 2px solid #e9ecef; 
            padding-bottom: 10px; 
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .section-heading i { margin-right: 10px; }
        
        /* Konten Teks */
        .content-body { 
            font-size: 1.1rem; 
            line-height: 1.8; 
            color: #444; 
            margin-bottom: 40px;
            text-align: justify;
        }
    </style>
</head>
<body>

<div class="page-header">
    <div class="container d-flex justify-content-between align-items-center">
        <h3 class="fw-bold m-0 text-uppercase">Visi & Misi</h3>
        <a href="{{ url('/') }}" class="btn btn-outline-light rounded-pill px-4">
            <i class="bi bi-house-door me-2"></i> BERANDA
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="main-content">
                
                <!-- Visi -->
                <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            
            <!-- Visi -->
            <div class="mb-4">
                <h5 class="text-primary fw-bold mb-2">
                    <i class="bi bi-graph-up-arrow"></i> VISI
                </h5>
                <p class="mb-0">{{ $data->visi ?? 'Visi belum diatur.' }}</p>
            </div>

            <hr>

            <!-- Misi -->
            <div class="mb-2">
                <h5 class="text-primary fw-bold mb-2">
                    <i class="bi bi-list-check"></i> MISI
                </h5>
                <div class="mt-2">
                    {!! nl2br(e($data->misi ?? 'Misi belum diatur.')) !!}
                </div>
            </div>

        </div>
    </div>
</div>
                <hr class="mt-5">
                <p class="text-center text-muted small">© 2026 Sekretariat Daerah Kota Sukabumi. Dokumen Resmi Instansi.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>