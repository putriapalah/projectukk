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

   
    }

