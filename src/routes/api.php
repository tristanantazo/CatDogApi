<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('cats-and-dogs', [ApiController::class, 'getBreeds'])->name('getBreed');
    Route::prefix('/cat')->group(function () {
        Route::get('breeds/{breed?}', [ApiController::class, 'getCatBreed'])->name('getCatBreed');
        Route::get('images/{image}', [ApiController::class, 'getCatImages'])->name('getCatImages');
    });
    Route::prefix('/dog')->group(function () {
        Route::get('breeds/{breed?}', [ApiController::class, 'getDogBreed'])->name('getDogBreed');
        Route::get('images/{image}', [ApiController::class, 'getDogImages'])->name('getDogImages');
    });
});
