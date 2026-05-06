<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2DD - SETDA Kota Sukabumi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #ffffff; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
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
            letter-spacing: 0.5px;
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
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 40px;
            font-size: 1.05rem;
            color: #444;
        }

        /* TP2DD Styling */
        .feature-box {
            background: #fff;
            border: 1px solid #edf2f7;
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .feature-box:hover {
            transform: translateY(-5px);
            border-color: #333;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background: #f8f9fa;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .feature-title {
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 15px;
            color: #1a202c;
        }

        .feature-list {
            padding-left: 0;
            list-style: none;
        }

        .feature-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 12px;
            font-size: 0.95rem;
            color: #4a5568;
        }

        .feature-list li::before {
            content: "\F26A"; /* Bootstrap Icon Check-circle */
            font-family: "bootstrap-icons";
            position: absolute;
            left: 0;
            color: #333;
        }

        footer {
            margin-top: 80px;
            padding: 30px 0;
            border-top: 1px solid #eee;
            color: #999;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo" width="30" class="me-2"> 
            <span style="font-weight: 700; font-size: 1.1rem;">SETDA KOTA SUKABUMI</span>
        </a>
        
        <div class="ms-auto">
            <a href="/" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Judul -->
    <div class="text-center">
        <h2 class="header-title">TP2D</h2>
        <p class="text-muted">Tim Percepatan dan Perluasan Digitalisasi Daerah</p>
        <div class="divider"></div>
    </div>

    <!-- Konten Utama -->
    <div class="content-section">
        <p class="intro-text">
            Pelayanan TP2DD (Tim Percepatan dan Perluasan Digitalisasi Daerah) di bawah Sekretariat Daerah (Setda) Kota Sukabumi fokus pada akselerasi transformasi digital dalam pengelolaan keuangan daerah. Inisiatif ini dirancang untuk menciptakan ekosistem finansial daerah yang lebih modern dan akuntabel.
        </p>

        <div class="row g-4">
            <!-- Digitalisasi Keuangan -->
            <div class="col-md-6">
                <div class="feature-box">
                    <div class="icon-circle">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="feature-title">Digitalisasi Pajak & Retribusi</div>
                    <p class="small text-muted">Memastikan seluruh pendapatan daerah dilakukan secara digital untuk meningkatkan transparansi dan kepatuhan wajib pajak.</p>
                </div>
            </div>

            <!-- Monitoring -->
            <div class="col-md-6">
                <div class="feature-box">
                    <div class="icon-circle">
                        <i class="bi bi-display"></i>
                    </div>
                    <div class="feature-title">Monitoring & Evaluasi</div>
                    <p class="small text-muted">Pemantauan alat tapping/billing secara berkala untuk memastikan data transaksi terekam secara real-time dan akurat.</p>
                </div>
            </div>

            <!-- Optimalisasi & Pelayanan -->
            <div class="col-12">
                <div class="feature-box">
                    <div class="feature-title"><i class="bi bi-lightning-charge me-2"></i>Akselerasi & Dampak Layanan</div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><strong>Optimalisasi Pendapatan:</strong> Berkolaborasi membedah potensi pajak untuk meningkatkan PAD.</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><strong>Kemudahan Publik:</strong> Mempermudah masyarakat melakukan pembayaran dengan cepat dan efisien.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center">
    <p>Sistem Informasi Eksekutif &copy; 2026 Pemerintah Kota Sukabumi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>