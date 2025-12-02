<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananAduan extends Model
{
    use HasFactory;

    protected $table = 'layanan_aduan';

    protected $fillable = [
        'nama_pemohon',
        'nomor_telepon_pemohon',
        'deskripsi_aduan',
        'status',
    ];
    }

