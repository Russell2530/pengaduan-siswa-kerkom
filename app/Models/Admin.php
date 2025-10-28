<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
       'nama_pelapor',
       'terlapor',
       'deskripsi',
       'tempat_kejadian',
       'gambar',
       'status'

    ];
}
