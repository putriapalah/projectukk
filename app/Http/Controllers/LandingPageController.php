<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORT MODEL
use App\Models\BukuTanah;
use App\Models\SuratUkur;
use App\Models\Pegawai;
use App\Models\Berita;
use App\Models\LayananAduan;

class LandingPageController extends Controller
{
    public function index()
    {
        $bukuTanah = BukuTanah::all();
        $suratUkur = SuratUkur::all();
        $pegawai   = Pegawai::all();
        $berita    = Berita::where('status', 'terbit')->latest()->get();
        $aduan     = LayananAduan::all();

        return view('user.landing', compact(
            'bukuTanah',
            'suratUkur',
            'pegawai',
            'berita',
            'aduan'
        ));
    }
}
