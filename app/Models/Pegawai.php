<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'foto_profil',
        'nip',
        'nama_lengkap',
        'nomor_telepon',
        'jabatan',
        'unit_kerja',
    ];
}
