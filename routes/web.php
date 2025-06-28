<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- Jangan lupa tambahkan ini di atas

Route::get('/', function () {
    // Cek apakah pengguna sudah login
    if (Auth::check()) {
        $user = Auth::user();
        // Arahkan berdasarkan peran (role)
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else { // Asumsikan selain admin adalah guru
            return redirect()->route('dashboard');
        }
    }
    // Jika belum login, arahkan ke halaman login
    return redirect()->route('login');
});

// Dashboard default HANYA untuk guru
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'role:guru'])->name('dashboard');

// Dashboard utama guru
Route::get('/dashboard', function () {
    return view('guru.dashboard'); // Arahkan ke view dashboard guru
})->middleware(['auth', 'role:guru'])->name('dashboard');

// Grup untuk semua fitur guru
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::resource('materials', \App\Http\Controllers\Guru\MaterialController::class);
});

// Grup untuk route admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        // Mengarahkan ke view dashboard admin
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('subjects', \App\Http\Controllers\Admin\SubjectController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('materials', \App\Http\Controllers\Admin\MaterialController::class);

    // Tambahkan route admin lainnya di sini
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
