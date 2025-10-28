<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama_pelapor',
        'terlapor',
        'kejadian',
        'deskripsi',
        'tempat_kejadian',
        'gambar',
        'status',
    ];
}