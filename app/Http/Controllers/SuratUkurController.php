<?php

namespace App\Http\Controllers;

use App\Models\SuratUkur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SuratUkurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (! Schema::hasTable('suratUkur')) {
            return view('suratUkur.index', ['suratUkur' => collect()])->with('error', 'Tabel surat_ukur belum ada. Jalankan: php artisan migrate');
        }

        $suratUkur = SuratUkur::latest()->get();
        return view('suratUkur.index', compact('suratUkur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratUkur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Schema::hasTable('suratUkur')) {
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
        $data = array_intersect_key($validated, array_flip($suratUkur->getFillable()));

        $suratUkur->fill($data)->save();

        return redirect()->route('suratUkur.index')
            ->with('success', 'Data surat ukur berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();
        return view('suratUkur.show', compact('suratUkur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();
        return view('suratUkur.edit', compact('suratUkur'));
    }

    public function update(Request $request, $kodeBT)
    {
        if (! Schema::hasTable('suratUkur')) {
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

        $columns = Schema::getColumnListing('suratUkur');
        $data = array_intersect_key($validated, array_flip($columns));

        try {
            $suratUkur->update($data);
            return redirect()->route('suratUkur.index')
                ->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kodeBT)
    {
        $suratUkur = SuratUkur::where('kodeBT', $kodeBT)->firstOrFail();

        $deleted = $suratUkur->delete();

        if ($deleted) {
            return redirect()->route('suratUkur.index')
                ->with('success', 'Data Surat Ukur berhasil dihapus.');
        }

        return redirect()->route('suratUkur.index')
            ->with('error', 'Gagal menghapus data. Silakan coba lagi.');
    }
}
