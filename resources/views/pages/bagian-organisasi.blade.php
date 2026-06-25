<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - SETDA Kota Sukabumi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f4f7f9;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        /* Header */
        .page-header {
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%);
            padding: 60px 0 110px 0;
            color: #ffffff;
        }

        .logo-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        /* Main Content */
        .main-content {
            background: #ffffff;
            border-radius: 8px;
            padding: 50px;
            margin-top: -70px;
            margin-bottom: 60px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            border-top: 4px solid #0056b3;
        }

        .section-title {
            color: #0056b3;
            font-weight: 700;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .content-text {
            text-align: justify;
            line-height: 1.9;
            color: #555;
            font-size: 1.05rem;
        }

        .pdf-card {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            transition: .3s;
        }

        .pdf-card:hover {
            border-color: #0056b3;
            box-shadow: 0 5px 15px rgba(0,0,0,.08);
        }

        .pdf-icon {
            font-size: 2rem;
            color: #dc3545;
            margin-right: 15px;
        }

        .empty-data {
            padding: 50px;
            text-align: center;
            color: #888;
        }

        footer {
            text-align: center;
            padding: 25px 0;
            color: #888;
            font-size: .9rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="page-header">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <img src="{{ asset('img/logosetda.png') }}" class="logo-img me-4" alt="Logo">

                <div>
                    <h2 class="fw-bold m-0 text-white">{{ strtoupper($title) }}</h2>
                    <small class="text-white-50">
                        SEKRETARIAT DAERAH KOTA SUKABUMI
                    </small>
                </div>
            </div>

            <a href="{{ url('/') }}"
               class="btn btn-outline-light px-4 rounded-pill fw-bold">
                <i class="bi bi-house-door me-2"></i> BERANDA
            </a>

        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="main-content">

            <h4 class="section-title">
                Informasi {{ $title }}
            </h4>

            @if($data && $data->deskripsi)
                <div class="content-text">
                    {!! nl2br(e($data->deskripsi)) !!}
                </div>
            @endif

            @if($data && $data->file_pdf)
                <div class="pdf-card">

                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf-fill pdf-icon"></i>

                        <div>
                            <h6 class="fw-bold mb-1">
                                Dokumen {{ $title }}
                            </h6>
                            <small class="text-muted">
                                Klik tombol di samping untuk membuka atau mengunduh dokumen PDF.
                            </small>
                        </div>
                    </div>

                    <a href="{{ asset($data->file_pdf) }}"
                       target="_blank"
                       class="btn btn-primary px-4">
                        <i class="bi bi-download me-2"></i>
                        Buka PDF
                    </a>

                </div>
            @endif

            @if(!$data || (!$data->deskripsi && !$data->file_pdf))
                <div class="empty-data">
                    <i class="bi bi-folder-x display-4"></i>
                    <p class="mt-3 mb-0">
                        Data {{ $title }} belum tersedia.
                    </p>
                </div>
            @endif

        </div>
    </div>

    <footer>
        Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
