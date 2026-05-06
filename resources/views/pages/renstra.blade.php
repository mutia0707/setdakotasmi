<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renstra 2024-2026 - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #ffffff; 
            font-family: 'Segoe UI', sans-serif; 
            color: #333;
        }

        .navbar { 
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .header-title {
            margin-top: 40px;
            margin-bottom: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .divider {
            height: 2px;
            width: 60px;
            background: #333;
            margin: 0 auto 40px auto;
        }

        .content-section {
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.8;
            text-align: justify;
        }

        .document-frame {
            width: 100%;
            height: 600px;
            border: 1px solid #eee;
            margin-top: 20px;
        }

        footer {
            margin-top: 80px;
            padding: 20px 0;
            border-top: 1px solid #eee;
            color: #999;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="30" class="me-2"> 
            <span style="font-weight: 700; font-size: 1.1rem;">SETDA KOTA SUKABUMI</span>
        </a>
        <a href="/" class="btn btn-sm btn-outline-secondary">Kembali</a>
    </div>
</nav>

<div class="container">
    <div class="text-center">
        <h2 class="header-title">Rencana Strategis (Renstra) 2024-2026</h2>
        <div class="divider"></div>
    </div>

    <div class="content-section">
        <p>
            Rencana Strategis (Renstra) Sekretariat Daerah Kota Sukabumi Tahun 2024-2026 merupakan dokumen perencanaan perangkat daerah untuk periode 3 (tiga) tahun. Dokumen ini disusun sebagai pedoman dalam pelaksanaan tugas pokok dan fungsi Sekretariat Daerah dalam mendukung pencapaian visi dan misi pembangunan Kota Sukabumi.
        </p>

        <h5 class="fw-bold mt-4">Tujuan Strategis:</h5>
        <ul>
            <li>Meningkatkan kualitas pelayanan administratif dan aparatur di lingkungan Pemerintah Kota Sukabumi.</li>
            <li>Mengoordinasikan perumusan kebijakan daerah yang responsif dan akuntabel.</li>
            <li>Mengoptimalkan pengelolaan sumber daya daerah secara efisien dan transparan.</li>
        </ul>

        <div class="mt-5">
            <p class="fw-bold"><i class="bi bi-file-earmark-pdf me-2"></i>Pratinjau Dokumen:</p>
            <!-- Ganti src dengan path file PDF renstra kamu jika ada -->
            <div class="bg-light p-5 text-center border">
                <i class="bi bi-file-pdf" style="font-size: 3rem; color: #dc3545;"></i>
                <p class="mt-2">Dokumen Renstra 2024-2026.pdf</p>
                <a href="#" class="btn btn-dark btn-sm">Download PDF</a>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

</body>
</html>