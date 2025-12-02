<?php

namespace App\Http\Controllers;

use App\Models\SuratUkur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SuratUkurController extends Controller
{
    public function index(Request $request)
    {
        // Tambahkan pencarian
        $search = $request->input('search');

        if (!Schema::hasTable('suratUkur')) {
            return view('suratUkur.index', ['suratUkur' => collect()])
                ->with('error', 'Tabel surat_ukur belum ada. Jalankan: php artisan migrate');
        }

        $suratUkur = SuratUkur::when($search, function ($query) use ($search) {
            return $query->where('kodeBT', 'like', "%{$search}%")
                ->orWhere('nama_kecamatan', 'like', "%{$search}%")
                ->orWhere('namaDesa', 'like', "%{$search}%")
                ->orWhere('jenis_hak', 'like', "%{$search}%")
                ->orWhere('lokasi_penyimpanan', 'like', "%{$search}%");
        })
            ->latest()
            ->get();

        return view('suratUkur.index', compact('suratUkur', 'search'));
    }

    public function create()
    {
        return view('suratUkur.create');
    }

    public function store(Request $request)
    {
        if (!Schema::hasTable('suratUkur')) {
            return redirect()->route('suratUkur.index')
                ->with('error', 'Tabel surat_ukur belum ada. Jalankan: php artisan migrate');
        }

        $validated = $request->validate([
            'kodeBT' => 'required|string|max:255|unique:suratUkur,kodeBT',
            'nama_kecamatan' => 'required|string|max:255',
            'namaDesa' => 'required|string|max:255',
            'jenis_hak' => 'required|in:Hak Milik,Hak Guna Bangun,Hak Pakai',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
        ]);

        $suratUkur = new SuratUkur();
        $suratUkur->fill($validated)->save();

        return redirect()->route('suratUkur.index')
            ->with('success', 'Data surat ukur berhasil ditambahkan.');
    }

    public function show($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();
        return view('suratUkur.show', compact('suratUkur'));
    }

    public function edit($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();
        return view('suratUkur.edit', compact('suratUkur'));
    }

    public function update(Request $request, $kodeBT)
    {
        if (!Schema::hasTable('suratUkur')) {
            return redirect()->route('suratUkur.index')
                ->with('error', 'Tabel surat_ukur belum ada. Jalankan: php artisan migrate');
        }

        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();

        $validated = $request->validate([
            'kodeBT' => 'required|string|max:255|unique:suratUkur,kodeBT,' . $suratUkur->kodeBT . ',kodeBT',
            'nama_kecamatan' => 'required|string|max:255',
            'namaDesa' => 'required|string|max:255',
            'jenis_hak' => 'required|in:Hak Milik,Hak Guna Bangun,Hak Pakai',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
        ]);

        $suratUkur->update($validated);

        return redirect()->route('suratUkur.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();
        $suratUkur->delete();

        return redirect()->route('suratUkur.index')
            ->with('success', 'Data Surat Ukur berhasil dihapus.');
    }
}
