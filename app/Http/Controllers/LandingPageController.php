<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTanah;
use App\Models\SuratUkur;
use App\Models\Pegawai;
use App\Models\Berita;
use App\Models\LayananAduan;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        // SEARCH BUKU TANAH
        $searchBT = $request->input('search_buku_tanah');

        $bukuTanah = BukuTanah::when($searchBT, function ($query) use ($searchBT) {
            return $query->where('kodeBT', 'like', "%{$searchBT}%")
                ->orWhere('nama_kecamatan', 'like', "%{$searchBT}%")
                ->orWhere('namaDesa', 'like', "%{$searchBT}%")
                ->orWhere('jenis_hak', 'like', "%{$searchBT}%")
                ->orWhere('lokasi_penyimpanan', 'like', "%{$searchBT}%");
        })->get();

        // SEARCH SURAT UKUR
        $searchSU = $request->input('search_surat_ukur');

        $suratUkur = SuratUkur::when($searchSU, function ($query) use ($searchSU) {
            return $query->where('kodeBT', 'like', "%{$searchSU}%")
                ->orWhere('nama_kecamatan', 'like', "%{$searchSU}%")
                ->orWhere('namaDesa', 'like', "%{$searchSU}%")
                ->orWhere('jenis_hak', 'like', "%{$searchSU}%")
                ->orWhere('lokasi_penyimpanan', 'like', "%{$searchSU}%");
        })->get();

        // DATA LAIN
        $pegawai = Pegawai::all();
        $berita  = Berita::where('status', 'terbit')->latest()->get();
        $aduan   = LayananAduan::all();

        return view('user.landing', compact(
            'bukuTanah',
            'suratUkur',
            'pegawai',
            'berita',
            'aduan',
            'searchBT',
            'searchSU'
        ));
    }
}
