<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengaduan;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengaduan::create([
            'nama_pelapor' => 'Ahmad',
            'terlapor' => 'Budi',
            'kejadian' => 'Pencurian',
            'deskripsi' => 'Barang hilang di kelas',
            'tempat_kejadian' => 'Kelas 10A',
            'gambar' => null,
        ]);

        Pengaduan::create([
            'nama_pelapor' => 'Siti',
            'terlapor' => 'Ani',
            'kejadian' => 'Perkelahian',
            'deskripsi' => 'Sengketa di lapangan',
            'tempat_kejadian' => 'Lapangan Olahraga',
            'gambar' => null,
        ]);

        Pengaduan::create([
            'nama_pelapor' => 'Rudi',
            'terlapor' => 'Cici',
            'kejadian' => 'Vandalisme',
            'deskripsi' => 'Graffiti di dinding',
            'tempat_kejadian' => 'Koridor Utama',
            'gambar' => null,
        ]);
    }
}