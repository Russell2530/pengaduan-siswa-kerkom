<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Models\Pengaduan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\PengaduanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function () {
    Route::match(['patch', 'put'], 'admin/{pengaduan}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.updateStatus');

    Route::resource('admin', AdminController::class);
});

Route::get('/siswa/pengaduan/create', [PengaduanController::class, 'create'])->name('siswa.pengaduan.create');
Route::post('/siswa/pengaduan', [PengaduanController::class, 'store'])->name('siswa.pengaduan.store');

Route::get('/', function () {
    $jumlahPengaduan = Pengaduan::count(); 
    return view('welcome', compact('jumlahPengaduan'));
});

require __DIR__.'/auth.php';
