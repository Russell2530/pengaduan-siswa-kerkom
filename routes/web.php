<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;

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

Route::get('/User/create/{id}', [PengaduanController::class, 'create'])->name('Siswa.create');
Route::post('/User/store', [PengaduanController::class, 'store'])->name('Siswa.store');

require __DIR__.'/auth.php';
