<?php

namespace App\Http\Controllers;

use App\Models\LayananAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananAduanController extends Controller
{
     public function userIndex()
    {
        $aduan = LayananAduan::where('user_id', Auth::id())->get();

        return view('user.layananAduan', compact('aduan'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nomor_telepon_pemohon' => 'required',
            'deskripsi_aduan' => 'required',
        ]);

        LayananAduan::create([
            'user_id' => Auth::id(),
            'nama_pemohon' => $request->nama_pemohon,
            'nomor_telepon_pemohon' => $request->nomor_telepon_pemohon,
            'deskripsi_aduan' => $request->deskripsi_aduan,
            'status' => 'Menunggu',
        ]);

        return back()->with('success', 'Aduan berhasil dikirim.');
    }
}