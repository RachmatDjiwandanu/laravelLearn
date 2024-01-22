@extends('layouts.main')
<title>TPG2 | {{ $tittle }}</title>
@section('content')
    

<body id="page-top">
        <!-- Navigation-->
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">SELAMAT DATANG DI SMK TERATAI PUTIH GLOBAL 2</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">SMK Teratai Putih Global 2 Bekasi merupakan salah satu Sekolah Menengah Kejuruan SMK yang didirikan oleh Yayasan Teratai Global Bekasi.</p>
                        <a class="btn btn-primary btn-xl" href="#about">Lihat lainnya</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Tentang</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">SMK Teratai Putih Global 2 Bekasi merupakan salah satu Sekolah Menengah Kejuruan SMK yang didirikan oleh Yayasan Teratai Global Bekasi. Seperti SMK pada umumnya di Indonesia masa pendidikan sekolah di SMK Teratai Putih Global 2 Bekasi ditempuh dalam waktu tiga tahun pelajaran, mulai dari Kelas X sampai Kelas XII. Kurikulum yang diterapkan disini yaitu kurikulum 2013 dengan alokasi waktu selama 10 - 12 jam pelajaran yang berlangsung dari hari Senin-Jumat. Sebelum memulai jam pelajaran, biasanya siswa-siswi mengadakan tadarus Al-Quran yang dipimpin oleh Bapak/Ibu guru yang bertugas.</p>
                        <a class="btn btn-light btn-xl" href="#services">Jurusan</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Jurusan</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">DKV</h3>
                            <p class="text-muted mb-0">DKV atau singkatan dari Desain Komunikasi Visual adalah proses kreatif yang menggabungkan seni visual dan teknologi untuk menyampaikan ide atau informasi.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">RPL</h3>
                            <p class="text-muted mb-0">Rekayasa Perangkat Lunak adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-cart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">BDP</h3>
                            <p class="text-muted mb-0">Bisnis Daring dan Pemasaran adalah sebuah kompetensi keahlian (jurusan) yang mempelajari dasar - dasar kemampuan dan keilmuan menjadi seorang marketing baik marketing secara konvensional maupun melalui media daring (online/internet).</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-bank2 fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Akuntansi</h3>
                            <p class="text-muted mb-0">Akuntansi adalah salah satu bidang studi yang memiliki peran penting dalam kegiatan bisnis. Di era modern seperti saat ini, akuntansi menjadi salah satu jurusan yang cukup diminati karena peluang kerja yang luas dan prospek karir yang menjanjikan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/dkv.jpg" title="DKV">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/dkv.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Jurusan</div>
                                <div class="project-name">DKV</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/rpl.jpg" title="RPL">
                            <img class="img-fluid" src="assets/img/portfolio/fullsize/rpl.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Jurusan</div>
                                <div class="project-name">RPL</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/bdp.jpg" title="BDP">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/bdp.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Jurusan</div>
                                <div class="project-name">BDP</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/akuntansi.jpg" title="Akuntansi">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/akuntansi.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Jurusan</div>
                                <div class="project-name">Akuntansi</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/rg-guru.jpeg" title="Ruang Guru">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/rg-guru.jpeg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Ruang</div>
                                <div class="project-name">Guru</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/rg-kelas.jpg" title="Ruang Kelas">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/rg-kelas.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Ruang</div>
                                <div class="project-name">Kelas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        
      
        @endsection
        
        
       
    </body>

</html>
