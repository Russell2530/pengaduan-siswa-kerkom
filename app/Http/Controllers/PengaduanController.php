<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
         $pengaduan = Pengaduan::latest()->get();
        return view('dashboard', compact('pengaduan'));
    }
}