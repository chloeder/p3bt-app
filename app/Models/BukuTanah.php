<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTanah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_hak',
        'desa_id',
        'jenis_hak_id',
    ];

    public function desa()
    {
        return $this->belongsTo(DesaBukuTanah::class);
    }

    public function jenis_hak()
    {
        return $this->belongsTo(JenisBukuTanah::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanBuku::class);
    }
}
