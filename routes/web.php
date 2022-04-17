<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tempatWisata/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('tempatWisata.show');

// Ulasan
Route::post('/tempatWisata/ulasan/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name('tempatWisata.ulasan.store');

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    // Tempat Wisata
    Route::prefix('tempatWisata')->group(function () {
        Route::get('/', [App\Http\Controllers\TempatWisataController::class, 'index'])->name('admin.tempatWisata.index');
        Route::get('/create', [App\Http\Controllers\TempatWisataController::class, 'create'])->name('admin.tempatWisata.create');
        Route::post('/store', [App\Http\Controllers\TempatWisataController::class, 'store'])->name('admin.tempatWisata.store');
        Route::get('/edit/{id}', [App\Http\Controllers\TempatWisataController::class, 'edit'])->name('admin.tempatWisata.edit');
        Route::put('/update/{id}', [App\Http\Controllers\TempatWisataController::class, 'update'])->name('admin.tempatWisata.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\TempatWisataController::class, 'destroy'])->name('admin.tempatWisata.delete');
    });
    // Kategori
    Route::prefix('kategori')->group(function () {
        Route::get('/', [App\Http\Controllers\KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::get('/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/store', [App\Http\Controllers\KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/update/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('admin.kategori.delete');
    });
});

Auth::routes();
