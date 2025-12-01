<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPN Kantor Pertanahan</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS FILES -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/templatemo-tiya-golf-club.css') }}" rel="stylesheet">
</head>

<body>

<main>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('user/images/Logobpn.png') }}" class="navbar-brand-image img-fluid" alt="BPN">
                <span class="navbar-brand-text">
                    BPN
                    <small>Kantor Pertanahan</small>
                </span>
            </a>

            <div class="d-lg-none ms-auto me-3">
                <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasLogin">Login</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_1">Home</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_2">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_3">Data Pertanahan</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_4">Pegawai</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_5">Berita</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll" href="#section_6">Layanan Aduan</a></li>
                </ul>

                <div class="d-none d-lg-block ms-lg-3">
                    <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasLogin">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- LOGIN SIDEBAR -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasLogin">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Login Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column">
            <form class="custom-form member-login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="member-login-form-body">
                    <div class="mb-4">
                        <label class="form-label mb-2">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label mb-2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="col-lg-8 col-md-8 col-10 mx-auto">
                        <button type="submit" class="form-control">Login</button>
                    </div>
                </div>
            </form>

            <div class="mt-auto mb-5">
                <p>
                    <strong class="text-white me-3">Pertanyaan?</strong>
                    <a href="tel: 0265-123456" class="contact-link">0265-123456</a>
                </p>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>

    <!-- HERO SECTION -->
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="section-overlay"></div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <h2 class="text-white">Selamat Datang di</h2>

                    <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                        <span>BPN adalah</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Transparan</b>
                            <b>Profesional</b>
                            <b>Melayani</b>
                        </span>
                    </h1>

                    <div class="custom-btn-group">
                        <a href="#section_2" class="btn custom-btn smoothscroll me-3">Tentang Kami</a>
                        <a href="#section_3" class="link smoothscroll">Lihat Data</a>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://youtu.be/n2fQWn8ultE?si=Avrg_LwNm2NTeb3b" title="Video BPN" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-lg-5 mb-4">Tentang BPN</h2>
                </div>

                <div class="col-lg-10 col-12 mx-auto">
                    <p class="lead text-center">
                        Kementerian Agraria dan Tata Ruang/Badan Pertanahan Nasional (ATR/BPN) adalah lembaga pemerintah yang bertanggung jawab dalam merumuskan dan melaksanakan kebijakan di bidang agraria, tata ruang, dan pertanahan.
                    </p>
                    <p class="text-center">
                        ATR/BPN memberikan pelayanan terkait pendaftaran tanah, penerbitan sertipikat, pengelolaan data pertanahan, penataan ruang wilayah, serta penyelesaian sengketa dan konflik pertanahan. Melalui modernisasi layanan dan peningkatan kualitas tata kelola, ATR/BPN berupaya mewujudkan kepastian hukum, tertib ruang, serta pemanfaatan tanah yang berkelanjutan dan berkeadilan bagi masyarakat di seluruh Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- DATA SECTION WITH TABS -->
    <section class="membership-section section-padding section-bg" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                    <h2><span>Data</span> Pertanahan</h2>
                </div>

                <!-- TAB NAVIGATION -->
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center mb-5" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="buku-tanah-tab" data-bs-toggle="tab" data-bs-target="#buku-tanah" type="button">
                                <i class="bi-journal-bookmark me-2"></i>Buku Tanah
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="surat-ukur-tab" data-bs-toggle="tab" data-bs-target="#surat-ukur" type="button">
                                <i class="bi-file-earmark-text me-2"></i>Surat Ukur
                            </button>
                        </li>
                    </ul>

                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <!-- BUKU TANAH TAB -->
                        <div class="tab-pane fade show active" id="buku-tanah">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode BT</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Jenis Hak</th>
                                            <th>Lokasi Penyimpanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bukuTanah as $index => $bt)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $bt->kodeBT }}</strong></td>
                                            <td>{{ $bt->nama_kecamatan }}</td>
                                            <td>{{ $bt->namaDesa }}</td>
                                            <td>{{ $bt->jenis_hak }}</td>
                                            <td>{{ $bt->lokasi_penyimpanan }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-muted">Belum ada data Buku Tanah</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- SURAT UKUR TAB -->
                        <div class="tab-pane fade" id="surat-ukur">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode SU</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Jenis Hak</th>
                                            <th>Lokasi Penyimpanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($suratUkur as $index => $su)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $su->kodeBT }}</strong></td>
                                            <td>{{ $su->nama_kecamatan }}</td>
                                            <td>{{ $su->namaDesa }}</td>
                                            <td>{{ $su->jenis_hak }}</td>
                                            <td>{{ $su->lokasi_penyimpanan }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-muted">Belum ada data Surat Ukur</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PEGAWAI SECTION -->
    <section class="about-section section-padding" id="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2>Pegawai BPN</h2>
                </div>

                @forelse($pegawai as $p)
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="member-block">
                        <div class="member-block-image-wrap">
                            <img src="{{ asset('img/pegawai/' . $p->foto_profil) }}" class="member-block-image img-fluid" alt="{{ $p->nama_lengkap }}">
                            
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="member-block-info d-flex align-items-center">
                            <h4>{{ $p->nama_lengkap }}</h4>
                            <p class="ms-auto">{{ $p->jabatan }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center text-muted">Belum ada data pegawai</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- BERITA SECTION -->
    <section class="events-section section-bg section-padding" id="section_5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mb-5">
                    <h2>Berita Terbaru</h2>
                </div>

                @forelse($berita as $b)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="custom-block h-100">
                        <div class="custom-block-image-wrap">
                            <img src="{{ asset('img/berita/' . $b->foto) }}" class="custom-block-image img-fluid" alt="{{ $b->judul }}">
                        </div>

                        <div class="custom-block-info">
                            <h5 class="mb-3">{{ $b->judul }}</h5>
                            <p class="mb-3">{{ Str::limit($b->isi, 150) }}</p>
                            
                            <div class="d-flex align-items-center border-top pt-3">
                                <small class="text-muted">
                                    <i class="bi-calendar3 me-1"></i>
                                    {{ $b->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center text-muted">Belum ada berita</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- LAYANAN ADUAN SECTION -->
    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2>Layanan Aduan Masyarakat</h2>
                </div>

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <form class="custom-form contact-form" action="{{ route('aduan.user.store') }}" method="POST">
                        @csrf
                        <h4 class="mb-4 pb-2">Sampaikan Aduan Anda</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <input type="text" name="nama_pemohon" class="form-control" placeholder="Nama Lengkap" required>
                                    <label>Nama Lengkap</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <input type="text" name="nomor_telepon_pemohon" class="form-control" placeholder="Nomor Telepon" required>
                                    <label>Nomor Telepon</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea name="deskripsi_aduan" class="form-control" placeholder="Deskripsi Aduan" style="height: 120px" required></textarea>
                                    <label>Deskripsi Aduan</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="form-control">Kirim Aduan</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 col-12 ms-auto">
                    <div class="contact-info">
                        <h4 class="mb-4">Informasi Kontak</h4>
                        
            

                                <p class="mb-2">
                                    <a href="tel: 0265-123456" class="contact-link">
                                        <i class="bi-telephone me-2"></i>
                                        (0265) 123-456
                                    </a>
                                </p>

                                <div class="col-lg-2 col-12 ms-auto">
                                    <ul class="social-icon mt-lg-5 mt-3 mb-4">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-instagram"></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul>
                                    <p class="copyright-text">Admin: <a href="{{ route('login') }}"><strong>Login</strong></a></p>
                                </div>

                            </div>
                        </div>

                        </div>

</main>

<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('user/images/Logobpn.png') }}" class="navbar-brand-image img-fluid" alt="BPN">
                    <span class="navbar-brand-text">
                        BPN
                        <small>Kantor Pertanahan</small>
                    </span>
                </a>
            </div>

            
                
                <p class="copyright-text">Copyright © 2024 BPN Indonesia</p>
            </div>

            
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="{{ asset('user/js/jquery.min.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('user/js/click-scroll.js') }}"></script>
<script src="{{ asset('user/js/animated-headline.js') }}"></script>
<script src="{{ asset('user/js/modernizr.js') }}"></script>
<script src="{{ asset('user/js/custom.js') }}"></script>

</body>
</html>