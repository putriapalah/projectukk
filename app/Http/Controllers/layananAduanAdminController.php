<?php

namespace App\Http\Controllers;

use App\Models\LayananAduan;
use Illuminate\Http\Request;

class LayananAduanAdminController extends Controller
{
    public function index()
    {
        $aduan = LayananAduan::latest()->get();
        return view('layananAduan.index', compact('aduan'));
    }

    public function edit($id)
    {
        $aduan = LayananAduan::findOrFail($id);
        return view('layananAduan.edit', compact('aduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'catatan_admin' => 'nullable',
        ]);

        $aduan = LayananAduan::findOrFail($id);
        $aduan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return redirect()->route('layananAduan.index')
            ->with('success', 'Aduan berhasil diperbarui.');
    }
}
