<?php

use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//dashboard redirct
    Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role === '') {
            return redirect()->route('');
        } elseif ($user->role === 'user') {
            return redirect()->route('siswa.dashboard');
        }
        return redirect('/');
    })->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
