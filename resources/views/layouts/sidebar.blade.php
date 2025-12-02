<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIKT</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Buku Tanah -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bukuTanah.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Buku Tanah</span>
        </a>
    </li>

    <!-- Nav Item - Surat Ukur-->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('suratUkur.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Surat Ukur</span>
        </a>
    </li>

    <!-- Nav Item - Berita-->
    <li class="nav-item">
    
        <a class="nav-link" href="{{ route('berita.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Berita</span>
        </a>
    </li>

 <!-- Nav Item - Pegawai-->
    <li class="nav-item">
    
        <a class="nav-link" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pegawai</span>
        </a>
    </li>

<!-- Nav Item - Layanan Aduan-->
 <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.aduan.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Layanan Aduan</span>
    </a>
</li>

   


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
   



</ul>
