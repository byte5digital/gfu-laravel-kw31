<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('tests.index');
    Route::post('/', [TestController::class, 'store'])->name('tests.store');
    Route::get('/{test}', [TestController::class, 'show'])->name('tests.show');
    Route::put('/{test}', [TestController::class, 'update'])->name('tests.update');
    Route::delete('/{test}', [TestController::class, 'destroy'])->name('tests.destroy');
});

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'createUser'])->name('users.create');
    Route::get('/', [UserController::class, 'index'])->name('users.index');
});
