<?php

namespace App\Http\Controllers;

use App\Models\LayananAduan;
use Illuminate\Http\Request;

class LayananAduanAdminController extends Controller
{
    public function index()
    {
        $aduan = LayananAduan::latest()->get();
        return view('layananAduan.index', compact('aduan'));  // ← UBAH BARIS INI
    }

    public function edit($id)
    {
        $aduan = LayananAduan::findOrFail($id);
        return view('layananAduan.edit', compact('aduan'));  // ← UBAH BARIS INI
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            
        ]);

        $aduan = LayananAduan::findOrFail($id);
        $aduan->update([
            'status' => $request->status,
            
        ]);

        return redirect()->route('admin.aduan.index')
            ->with('success', 'Aduan berhasil diperbarui.');
    }
}
