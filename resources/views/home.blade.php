<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setda Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* 1. TOP BAR */
        .top-bar {
            background-color: transparent !important;
            color: white;
            font-size: 1rem;
            padding: 10px 0;
            position: absolute;
            width: 100%;
            z-index: 1032;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .top-bar i {
            color: #00aaff;
            margin-right: 8px;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .top-bar a:hover {
            color: #00aaff;
        }

        /* 2. NAVBAR */
        .navbar {
            transition: all 0.4s ease-in-out;
            padding: 15px 0;
            background-color: transparent !important;
            position: absolute;
            width: 100%;
            top: 45px;
            z-index: 1031;
        }

        .navbar-brand img {
            height: 85px;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            padding: 8px 0;
            position: fixed;
            top: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .navbar.scrolled .navbar-brand img {
            height: 60px;
        }

        .navbar-collapse {
            justify-content: center;
        }

        .nav-link {
            color: white !important;
            font-weight: 400;
            font-size: 1.1rem;
            text-transform: uppercase;
            transition: 0.3s;
            padding: 10px 15px !important;
        }

        .navbar.scrolled .nav-link {
            color: #333 !important;
        }

        .nav-link:hover,
        .nav-link.show {
            color: #ffc107 !important;
        }

        /* --- STYLE DROPDOWN & SUBMENU SAMPING --- */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            padding: 0;
            min-width: 280px;
        }

        .dropdown-item {
            padding: 12px 20px;
            font-size: 0.95rem;
            color: #444;
            border-bottom: 1px solid #f1f1f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #004a99;
            padding-left: 25px;
        }

        /* CSS KHUSUS SUBMENU SAMPING */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-item i.fa-chevron-right {
            font-size: 0.7rem;
            color: #00aaff;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.2)), url("{{ asset('img/setda.jpeg') }}");
            background-size: cover;
            background-position: center;
            height: 550px;
        }

        .pimpinan-img {
            border: 5px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        .section-title {
            color: #004a99;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: #ffc107;
        }

        /* --- STYLE BERITA --- */
        .news-card-single {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
            background: #fff;
        }

        .news-card-single:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
        }

        .news-img-wrap img {
            height: 100%;
            min-height: 320px;
            object-fit: cover;
        }

        .news-title-link {
            text-decoration: none;
            color: #333;
            transition: 0.2s;
        }

        .news-title-link:hover {
            color: #004a99;
        }

        /* --- STYLE PEJABAT DAERAH --- */
        .pejabat-card {
            background: #e9eff5;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            transition: 0.3s;
            border: none;
            display: flex;
            align-items: center;
        }

        .pejabat-card:hover {
            background: #dfe7ef;
            transform: translateY(-5px);
        }

        .pejabat-img-circle {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
            flex-shrink: 0;
            background-color: #ccc;
        }

        .pejabat-info h5 {
            color: #004a99;
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 5px;
        }

        .pejabat-info p {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <span class="me-4">
                    <a href="tel:0266221123">
                        <i class="fa-solid fa-phone"></i> (0266) 221123
                    </a>
                </span>
                <span>
                    <a href="mailto:setda@sukabumikota.go.id">
                        <i class="fa-solid fa-envelope"></i> setda@sukabumikota.go.id
                    </a>
                </span>
            </div>
            <div class="d-none d-md-block">
                <a href="https://www.facebook.com/people/Setda-Kota-Sukabumi/61556323523832/#" class="ms-2" target="_blank"><i class="fa-brands fa-facebook-f" style="color:white"></i></a>
                <a href="https://www.instagram.com/setda_kotasukabumi?igsh=YjRyaDAxYTh1MDR1" class="ms-2" target="_blank"><i class="fa-brands fa-instagram" style="color:white"></i></a>
                <a href="https://x.com/Pemkot_Sukabumi" class="ms-2" target="_blank"><i class="fa-brands fa-x-twitter" style="color:white"></i></a>
                <a href="https://www.youtube.com/channel/UCc5UtomjUXmcqD1Ic8xUkPQ" class="ms-2" target="_blank"><i class="fa-brands fa-youtube" style="color:white"></i></a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-xl">
        <div class="container">
           <a class="navbar-brand" href="javascript:void(0)" 
   onclick="window.location.href='{{ url('/') }}'" 
   ondblclick="window.location.href='{{ route('login') }}'">
    <img src="{{ asset('img/logosetda.png') }}" alt="Logo Setda" style="height: 100px; width: auto;">
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropTentang" data-bs-toggle="dropdown">Tentang Kami</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
<li class="dropdown-submenu">
    <!-- Header Profil -->
    <a class="dropdown-item" href="#">
        Profil <i class="fa-solid fa-chevron-right float-end mt-1" style="font-size: 0.8rem;"></i>
    </a>
    
    <!-- Isi Sub-Menu Profil -->
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="https://portal.sukabumikota.go.id/profils/" target="_blank">
                Profil Setda
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('visi-misi') }}">Visi dan Misi</a>
        </li>
    </ul>
</li>
     <li>
            <a class="dropdown-item" href="{{ route('tupoksi') }}">Tupoksi</a>
        </li>
        
                            <li>
                                <a class="dropdown-item" href="{{ route('analis-kebijakan') }}">Analis Kebijakan</a>
                        </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Asisten <i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('asda1') }}">ASDA I (Pemerintahan & Kesra)</a>
                                </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('asda2') }}">ASDA II (Perekonomian & Pembangunan) </a>
                                </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('asda3') }}">ASDA III (Administrasi Umum)</a>
</li>
                                </ul>
                            </li>
                            <li>
    <a class="dropdown-item" href="{{ route('struktur') }}">Struktur Organisasi</a>
</li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropProgram" data-bs-toggle="dropdown">Program dan Kegiatan</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Perencanaan<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
    <a class="dropdown-item" href="{{ route('renstra') }}">Rencana Strategis (Renstra) 2024-2026</a>
</li>
                         

























<li>
    <a class="dropdown-item" href="{{ route('rpd') }}">Rencana Pembangunan Daerah (RPD) 2024-2026</a>
</li>
                                   <li>
    <a class="dropdown-item" href="{{ route('fokus_utama') }}">Fokus Utama</a>
</li>
                                    <li>
    <a class="dropdown-item" href="{{ route('sinkronisasi') }}">Sinkronisasi</a>
</li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Pelaporan<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
    <a class="dropdown-item" href="{{ route('lakip') }}">LAKIP</a>
</li>
                                    <li>
            <a class="dropdown-item" href="{{ route('lppd') }}">LPPD</a>
        </li>
                                    <li><a class="dropdown-item" href="{{ route('spm') }}">SPM</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropPelayanan" data-bs-toggle="dropdown">Pelayanan</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Umum<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
            <a class="dropdown-item" href="{{ route('alursurat') }}">Alur Pelayanan Surat</a>
        </li>
                                    <li><a class="dropdown-item" href="#">Pelayanan Perlengkapan dan Rumah Tangga</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Organisasi<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                   <li>
                                    <a class="dropdown-item" href="{{ route('spbe') }}">Layanan SPBE</a>
                                </li>
                                   <li>
                                    <a class="dropdown-item" href="{{ route('rb') }}">Reformasi Birokrasi</a>
                                </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('kelembagaan') }}">Kelembagaan</a>
                                    </li>
                                </ul>
                            </li>
                            
                           
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Perekonomian<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('bumd') }}">Pelayanan BUMD</a>
                                </li>
                                   <li>
                                    <a class="dropdown-item" href="{{ route('tpid') }}">Pelayanan TPID</a>
                                </li>
                                   <li>
                                    <a class="dropdown-item" href="{{ route('tp2d') }}">Pelayanan TP2D</a>
                                </li>
                                   <li>
                                    <a class="dropdown-item" href="{{ route('umkm') }}">Pemberdayaan UMKM</a>
                                </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Tata Pemerintahan<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('kunjungan') }}">Kunjungan Pimpinan</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pemilu') }}">Fasilitasi Pemilu & Pilkada</a>
                                </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Kerjasama dan Bantuan Hukum<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                   <li>
                                    <a class="dropdown-item" href="{{ route('kerjasama') }}">Pelayanan Kerja Sama Daerah</a>
                                </li>
                                   <li>
                                    <a class="dropdown-item" href="{{ route('bantuanhukum') }}">Pelayanan Bantuan Hukum</a>
                                </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Humas<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <!-- <li><a class="dropdown-item" href="#">Pelayanan Kerjasama Daerah</a></li> -->
                                    <!-- <li><a class="dropdown-item" href="#">Pelayanan Bantuan Hukum</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Bagian Kesejahteraan Rakyat<i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                    <!-- <li><a class="dropdown-item" href="#">Pelayanan Kerjasama Daerah</a></li> -->
                                    <!-- <li><a class="dropdown-item" href="#">Pelayanan Bantuan Hukum</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropInfo" data-bs-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="#">Galeri <i class="fa-solid fa-chevron-right"></i></a>
                                <ul class="dropdown-menu">
                                   <li>
                                    <a class="dropdown-item" href="{{ route('photos') }}">Photos</a>
                                </li>
                                     <li>
                                    <a class="dropdown-item" href="{{ route('video') }}">Video</a>
                                </li>
                                </ul>
                            </li>
                           <li>
    <a class="dropdown-item" href="{{ route('login') }}">Agenda Pimpinan</a>
</li>
                            <li><a class="dropdown-item" href="{{ route('penghargaan') }}">Penghargaan</a></li>
                            <li><a class="dropdown-item" href="{{ route('surat.edaran') }}">Surat Edaran Wali Kota</a></li>
                            <li><a class="dropdown-item" href="{{ route('download.index') }}">Download</a></li>
                            <li><a class="dropdown-item" href="{{ route('hibah.index') }}">Pengusul Penerima Hibah</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropBerita" data-bs-toggle="dropdown">Berita</a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="{{ route('berita.index') }}">Berita Kota</a></li>
                            <li><a class="dropdown-item" href="https://www.sukabumiupdate.com/sukabumi/173670/diplomatic-forum-2026-digelar-di-kota-sukabumi-libatkan-16-negara-sahabat" target="_blank">Kegiatan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(Request::is('/'))
        <div class="hero-section"></div>

        <div class="container mt-5 mb-5">
            <div class="row align-items-center shadow-sm p-4 rounded bg-white">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{ asset('img/ketuasetda.webp') }}" class="pimpinan-img rounded img-fluid" alt="Sekretaris Daerah">
                </div>
                <div class="col-md-8 px-md-5">
                    <h2 class="section-title">Sambutan</h2>
                    <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                        Puji dan syukur kami panjatkan ke hadirat Allah SWT karena atas rahmat, hidayah dan inayah-Nya, website Setda Kota Sukabumi telah dapat dinikmati sebagai sumber informasi kegiatan-kegiatan pembangunan daerah.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title d-inline-block" style="float:none;">Berita Terbaru</h2>
                <style>
                    .text-center .section-title::after {
                        left: 50%;
                        transform: translateX(-50%);
                    }
                </style>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="news-card-single shadow-sm card border-0">
                        <div class="row g-0">
                            <div class="col-md-5 news-img-wrap">
                                <img src="{{ asset('img/berita.jpg') }}" class="img-fluid w-100" alt="Gambar Berita Utama">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-4 d-flex flex-column h-100">
                                    <div class="mb-2 text-primary small">
                                        <i class="fa-regular fa-calendar me-1"></i> 23 April 2026
                                    </div>
                                    <h3 class="card-title fw-bold">
                                        <a href="https://portal.sukabumikota.go.id/category/berita-kota/" target="_blank" class="news-title-link">Berita Terbaru Kota Sukabumi</a>
                                    </h3>
                                    <p class="card-text text-muted mt-3">Ringkasan singkat mengenai berita atau kegiatan yang sedang berlangsung di Pemerintah Kota Sukabumi...</p>
                                    <div class="mt-auto pt-4">
                                        <a href="https://portal.sukabumikota.go.id/category/berita-kota/" target="_blank" class="btn btn-primary px-4 rounded-pill">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5 pt-4">
            <div class="text-center mb-5">
                <h2 class="section-title d-inline-block" style="float:none;">Pejabat Daerah</h2>
                <p class="text-muted">Pejabat lingkup Perangkat Daerah</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="pejabat-card">
                        <img src="{{ asset('img/pejabat1.jpg') }}" class="pejabat-img-circle" alt="Pejabat">
                        <div class="pejabat-info">
                            <h5>Asisten Pemerintahan dan Kesejahteraan Rakyat</h5>
                            <p><strong>Fajar Rajasa, S.STP., M.Si.</strong></p>
                            <p>Tugas : membantu Sekretaris Daerah... <a href="#">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pejabat-card">
                        <img src="{{ asset('img/pejabat2.jpg') }}" class="pejabat-img-circle" alt="Pejabat">
                        <div class="pejabat-info">
                            <h5>Staf Ahli Bidang Administrasi Umum</h5>
                            <p><strong>Mohammad Hasan Asari</strong></p>
                            <p>Tugas Pokok: Membantu Wali Kota... <a href="#">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pejabat-card">
                        <div class="pejabat-img-circle d-flex align-items-center justify-content-center text-white">No Img</div>
                        <div class="pejabat-info">
                            <h5>Asisten Daerah III</h5>
                            <p><strong>H.R. Imran Wardhani, A.Md.LLAJ., S.IP., M.Si.</strong></p>
                            <p>Tugas pokok: Membantu Wali Kota... <a href="#">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pejabat-card">
                        <img src="{{ asset('img/pejabat3.jpg') }}" class="pejabat-img-circle" alt="Pejabat">
                        <div class="pejabat-info">
                            <h5>Bagian Tata Pemerintahan</h5>
                            <p><strong> Adrian Hariadi, S.STP. </strong></p>
                            <p>Tugas : Membantu Sekretaris Daerah... <a href="#">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style="height: 150px; background: #004a99;"></div> 
        <div class="container py-5">
            @yield('content')
        </div>
    @endif

    <footer class="bg-dark text-white py-4 text-center">
        <div class="container">
            <p class="mb-0">&copy; 2026 Sekretariat Daerah Kota Sukabumi. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            var nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
                nav.style.top = "0";
            } else {
                nav.classList.remove('scrolled');
                nav.style.top = "45px";
            }
        });
    </script>
</body>
@auth
        <div style="position: fixed; bottom: 30px; right: 30px; z-index: 9999;">
            <a href="{{ auth()->user()->role == 'admin' ? route('auth.admin') : route('auth.staffagenda') }}" 
               class="btn btn-dark shadow-lg d-flex align-items-center px-4 py-3 border-0" 
               style="border-radius: 50px; background: #212529; transition: 0.3s; color: white; text-decoration: none;">
                <i class="bi bi-speedometer2 fs-4 me-2"></i> 
                <div class="text-start">
                    <small class="d-block text-uppercase" style="font-size: 10px; opacity: 0.7;">Kembali Ke</small>
                    <span class="fw-bold">PANEL KENDALI</span>
                </div>
            </a>
        </div>
        <style>
            .btn-dark:hover { background: #0056b3 !important; transform: translateY(-5px); color: white; }
        </style>
    @endauth

    <script src="..."></script>

</body> </html>

</html>