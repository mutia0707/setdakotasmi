    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rencana Strategis - SETDA Kota Sukabumi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <style>
            body { background-color: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
            
            /* Header Formal (Seragam) */
            .page-header { 
                background: linear-gradient(135deg, #004a99 0%, #0066cc 100%); 
                padding: 50px 0 90px 0; 
                color: #ffffff; 
            }
            .logo-img { width: 50px; height: 50px; object-fit: contain; }
            
            /* Kartu Konten (Seragam) */
            .main-content { 
                background: #ffffff; 
                border-radius: 12px; 
                padding: 40px; 
                margin-top: -60px; 
                margin-bottom: 60px; 
                box-shadow: 0 5px 20px rgba(0,0,0,0.07);
                border-top: 4px solid #0056b3; 
            }
        </style>
    </head>
    <body>

    <div class="page-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logosetda.png') }}" 
                    onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Coat_of_arms_of_Sukabumi.svg/1200px-Coat_of_arms_of_Sukabumi.svg.png';" 
                    alt="Logo" class="logo-img me-3">
                <div>
                    <h3 class="fw-bold m-0 text-white">RENCANA STRATEGIS</h3>
                    <small class="text-white-50 text-uppercase">Sekretariat Daerah Kota Sukabumi</small>
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
        @if($data)
            <h5 class="fw-bold text-primary mb-3">Deskripsi</h5>
            <p class="text-secondary lh-lg mb-4">{{ $data->deskripsi }}</p>

            <h5 class="fw-bold text-primary mt-4">Tujuan Strategis</h5>
            <ul class="text-secondary ps-3">
                @foreach(explode("\n", $data->tujuan_strategis) as $item)
                    @if(trim($item) != "")
                        <li>{{ trim($item) }}</li>
                    @endif
                @endforeach
            </ul>

            @if($data->file_pdf)
                <div class="mt-4 text-center">
                    <a href="{{ asset('storage/' . $data->file_pdf) }}" class="btn btn-dark" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Download Dokumen PDF
                    </a>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <h4 class="text-muted">Data Rencana Strategis belum diisi.</h4>
                <p>Silakan akses panel admin untuk melengkapi data.</p>
            </div>
        @endif
    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>