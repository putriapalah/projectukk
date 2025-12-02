<?php

namespace App\Http\Controllers;

use App\Models\BukuTanah;
use Illuminate\Http\Request;

class BukuTanahController extends Controller
{
    public function index(Request $request)
    {
        // AMBIL QUERY SEARCH
        $search = $request->input('search');

        // JIKA ADA SEARCH → FILTER | JIKA KOSONG → TAMPIL SEMUA
        $bukuTanah = BukuTanah::when($search, function ($query) use ($search) {
            $query->where('kodeBT', 'like', "%{$search}%")
                ->orWhere('nama_kecamatan', 'like', "%{$search}%")
                ->orWhere('namaDesa', 'like', "%{$search}%")
                ->orWhere('jenis_hak', 'like', "%{$search}%")
                ->orWhere('lokasi_penyimpanan', 'like', "%{$search}%");
        })
            ->latest()
            ->get();

        return view('bukuTanah.index', compact('bukuTanah', 'search'));
    }

    public function create()
    {
        return view('bukuTanah.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kodeBT' => 'required|string|max:255|unique:bukutanah,kodeBT',
            'nama_kecamatan' => 'required|string|max:255',
            'namaDesa' => 'required|string|max:255',
            'jenis_hak' => 'required|in:Hak Milik,Hak Guna Bangun,Hak Pakai',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
        ]);

        BukuTanah::create($validate);

        return redirect()->route('bukuTanah.index')
            ->with('success', 'Data buku tanah berhasil ditambahkan.');
    }

    public function show($kodeBT)
    {
        $bukuTanah = BukuTanah::where('kodeBT', $kodeBT)->firstOrFail();
        return view('bukuTanah.show', compact('bukuTanah'));
    }

    public function edit($kodeBT)
    {
        $bukuTanah = BukuTanah::where('kodeBT', $kodeBT)->firstOrFail();
        return view('bukuTanah.edit', compact('bukuTanah'));
    }

    public function update(Request $request, $kodeBT)
    {
        $bukuTanah = BukuTanah::where('kodeBT', $kodeBT)->firstOrFail();

        $validated = $request->validate([
            'kodeBT' => 'required|string|max:255|unique:bukutanah,kodeBT,' . $bukuTanah->kodeBT . ',kodeBT',
            'nama_kecamatan' => 'required|string|max:255',
            'namaDesa' => 'required|string|max:255',
            'jenis_hak' => 'required|in:Hak Milik,Hak Guna Bangun,Hak Pakai',
            'lokasi_penyimpanan' => 'nullable|string|max:255',
        ]);

        $bukuTanah->update($validated);

        return redirect()->route('bukuTanah.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($kodeBT)
    {
        $bukuTanah = BukuTanah::where('kodeBT', $kodeBT)->firstOrFail();
        $bukuTanah->delete();

        return redirect()->route('bukuTanah.index')
            ->with('success', 'Data buku tanah berhasil dihapus.');
    }
}
