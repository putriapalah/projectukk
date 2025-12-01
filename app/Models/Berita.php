<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $fillable = [
        'foto',
        'judul',
        'isi',
        'tanggal_publikasi',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
        });
    }
}
