<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTanah extends Model
{
    protected $table = 'bukutanah';

    protected $primaryKey = 'kodeBT';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kodeBT',
        'nama_kecamatan',
        'namaDesa',
        'jenis_hak',
        'lokasi_penyimpanan',
    ];
}
