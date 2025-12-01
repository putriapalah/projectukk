<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::latest()->get();
        return view('pegawai.index', compact('pegawai'));

    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png',
            'nip' => 'required|string|unique:pegawai,nip|max:18',
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
            'unit_kerja' => 'required|string|max:100',
        ]);

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $namaFile = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('img/pegawai'), $namaFile);
            $validated['foto_profil'] = $namaFile;
        }

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png',
            'nip' => 'required|string|max:18|unique:pegawai,nip,' . $pegawai->id,
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'unit_kerja' => 'required|string|max:100',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama
            if ($pegawai->foto_profil) {
                File::delete(public_path('img/pegawai/' . $pegawai->foto_profil));
            }
            // Upload foto baru
            $file = $request->file('foto_profil');
            $namaFile = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('img/pegawai'), $namaFile);
            $validated['foto_profil'] = $namaFile;
        }

        $pegawai->update($validated);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        if ($pegawai->foto_profil) {
            File::delete(public_path('img/pegawai/' . $pegawai->foto_profil));
        }
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data Pegawai berhasil dihapus.');
    }
}
