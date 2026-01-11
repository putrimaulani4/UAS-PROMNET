<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; // Pastikan ini ada
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Rute Publik)
|--------------------------------------------------------------------------
*/

// Halaman Beranda Publik
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Halaman Detail Komponen untuk Pengunjung
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');


/*
|--------------------------------------------------------------------------
| Admin Routes (Diproteksi Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Admin (Tabel Utama Manajemen Artikel)
    Route::get('/dashboard', [PostController::class, 'adminIndex'])->name('dashboard');

    // CRUD Manajemen Artikel Komputer
    Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [PostController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [PostController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [PostController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
    
    // Route khusus unggah gambar via CKEditor
    Route::post('/admin/upload', [PostController::class, 'uploadImage'])->name('admin.upload');

    // Route bawaan Breeze untuk Profile (Opsional)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';