<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal_publikasi' => 'required|date',
            'status' => 'required|in:draft,terbit',
        ]);


        if ($request->hasFile('foto')) {
            // Pastikan folder ada
            $folderPath = public_path('img/berita');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $file = $request->file('foto');
            $namaFile = time() . '-' . $file->getClientOriginalName();
            $file->move($folderPath, $namaFile);
            $validated['foto'] = $namaFile;
        }

        Berita::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:5000',
            'tanggal_publikasi' => 'required|date',
            'status' => 'required|in:draft,terbit',
        ]);

        // === UPDATE ===
      
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($berita->foto) {
                $pathLama = public_path('img/berita/' . $berita->foto);
                if (file_exists($pathLama)) {
                    unlink($pathLama);
                }
            }

            // Buat folder jika belum ada
            $folderPath = public_path('img/berita');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $file = $request->file('foto');
            $namaFile = time() . '-' . $file->getClientOriginalName();
            $file->move($folderPath, $namaFile);
            $validated['foto'] = $namaFile;
        }

        $berita->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function destroy(Berita $berita)
    {
        // Hapus file foto jika ada
        if ($berita->foto) {
            $path = public_path('img/berita/' . $berita->foto);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
