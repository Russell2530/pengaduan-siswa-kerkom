<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\PengaduanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('admin', AdminController::class);
    Route::patch('admin/{admin}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

Route::middleware(['auth', 'role:user'])    
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('siswa.dashboard');
                })->name('dashboard');
});

require __DIR__.'/auth.php';
