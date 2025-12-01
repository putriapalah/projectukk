<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Aduan - BPN</title>
    
    <!-- CSS -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/templatemo-tiya-golf-club.css') }}" rel="stylesheet">
</head>

<body>

<main>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('user/images/Logobpn.png') }}" class="navbar-brand-image img-fluid">
                <span class="navbar-brand-text">BPN</span>
            </a>
            
            <div class="ms-auto">
                <span class="text-white me-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- FORM ADUAN -->
    <section class="section-padding">
        <div class="container">
            <h2 class="text-center mb-5">Layanan Aduan</h2>

            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                    
                    <!-- ALERT SUCCESS -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- ALERT ERROR -->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- FORM -->
                    <form class="custom-form" action="{{ route('user.aduan.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input type="text" name="nama_pemohon" class="form-control" 
                                   value="{{ old('nama_pemohon') }}" required>
                            <label>Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nomor_telepon_pemohon" class="form-control" 
                                   value="{{ old('nomor_telepon_pemohon') }}" required>
                            <label>Nomor Telepon</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea name="deskripsi_aduan" class="form-control" 
                                      style="height: 150px" required>{{ old('deskripsi_aduan') }}</textarea>
                            <label>Deskripsi Aduan</label>
                        </div>

                        <button type="submit" class="btn custom-btn w-100">Kirim Aduan</button>
                    </form>
                </div>
            </div>

            <!-- RIWAYAT ADUAN -->
            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="mb-4">Riwayat Aduan Saya</h4>
                    
                    @if($aduan->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Aduan</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aduan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_pemohon }}</td>
                                    <td>{{ $item->nomor_telepon_pemohon }}</td>
                                    <td>{{ Str::limit($item->deskripsi_aduan, 50) }}</td>
                                    <td>
                                        <span class="badge bg-warning">{{ $item->status }}</span>
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">
                        Belum ada aduan yang diajukan.
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
</main>

<!-- JAVASCRIPT -->
<script src="{{ asset('user/js/jquery.min.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>