<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
       'user_id',
       'pengaduan_id',
       'nama_pelapor',
       'terlapor',
       'deskripsi',
       'tempat_kejadian',
       'gambar',
       'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
