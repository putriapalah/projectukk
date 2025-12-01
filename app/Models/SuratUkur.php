<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratUkur extends Model
{
	use HasFactory;

	protected $table = 'suratUkur';

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
