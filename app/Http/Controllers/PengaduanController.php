<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('pengaduan'));
    }

    public function create()
    {
        return view('Siswa.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'terlapor' => 'required|string|max:255',
            'kejadian' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tempat_kejadian' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('laporanImages', 'public');
            $validateData['gambar'] = $path;
        }



        Pengaduan::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Laporan kejadian berhasil dikirim!');
    }

    
}