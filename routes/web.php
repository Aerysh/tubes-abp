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

Route::get('/', function() {
    return view('index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::prefix('tempatWisata')->group(function () {
        Route::get('/', [App\Http\Controllers\TempatWisataController::class, 'index'])->name('admin.tempatWisata.index');
        Route::get('/create', [App\Http\Controllers\TempatWisataController::class, 'create'])->name('admin.tempatWisata.create');
        Route::post('/store', [App\Http\Controllers\TempatWisataController::class, 'store'])->name('admin.tempatWisata.store');
        Route::get('/edit/{id}', [App\Http\Controllers\TempatWisataController::class, 'edit'])->name('admin.tempatWisata.edit');
        Route::put('/update/{id}', [App\Http\Controllers\TempatWisataController::class, 'update'])->name('admin.tempatWisata.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\TempatWisataController::class, 'destroy'])->name('admin.tempatWisata.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
