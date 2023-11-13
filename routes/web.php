<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', \App\Http\Controllers\HomepageController::class)->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/inns', [\App\Http\Controllers\Admin\InnController::class, 'index'])->name('admin.inns.index');
        Route::get('/inns/create', [\App\Http\Controllers\Admin\InnController::class, 'create'])->name('admin.inns.create');
        Route::post('/inns/create', [\App\Http\Controllers\Admin\InnController::class, 'store'])->name('admin.inns.store');
        Route::get('/inns/{inn}/edit', [\App\Http\Controllers\Admin\InnController::class, 'edit'])->name('admin.inns.edit');
        Route::post('/inns/{inn}/edit', [\App\Http\Controllers\Admin\InnController::class, 'update'])->name('admin.inns.update');
        Route::post('/inns/{inn}/destroy', [\App\Http\Controllers\Admin\InnController::class, 'destroy'])->name('admin.inns.destroy');
    });
});

Route::get('/inns', [\App\Http\Controllers\Inn\InnController::class, 'index'])->name('inns.index');
Route::get('/inn/{inn}', [\App\Http\Controllers\Inn\InnController::class, 'show'])->name('inns.show');
