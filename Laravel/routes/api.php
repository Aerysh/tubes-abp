<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\WisataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User Login
Route::post('/login', [AuthenticationController::class, 'login']);
// User Register
Route::post('/register', [AuthenticationController::class, 'register']);
// User Info with middleware
Route::group(['middleware' => 'auth:sanctum'], function () {
    // User Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    // User Profile
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
});

// Tempat Wisata
Route::prefix('wisata')->group(function () {
    Route::get('/discover', [WisataController::class, 'discover'])->name('wisata.discover');
    Route::get('/details/{id}', [WisataController::class, 'details'])->name('wisata.details');
    Route::post('/search/{name}', [WisataController::class, 'findByName'])->name('wisata.search');
});
