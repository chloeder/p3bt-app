<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'bukutanah_id',
        'user_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'tanggal_dikembalikan',
    ];

    public function bukutanah()
    {
        return $this->belongsTo(BukuTanah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
