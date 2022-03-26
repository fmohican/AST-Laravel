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
Route::prefix('public')->name('public.')->group(function() {
    Route::get('/', [\App\Http\Controllers\ServersController::class, 'serverlink']);
});

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::prefix('app')->name('app.')->middleware('User')->group(function () {
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::prefix('admin')->name('admin.')->middleware('Admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');
        Route::prefix('server')->name('server.')->group(function () {
            Route::put('create', [\App\Http\Controllers\ServersController::class, 'create'])->name('create');
            Route::patch('edit', [\App\Http\Controllers\ServersController::class, 'edit'])->name('edit');
            Route::delete('delete', [\App\Http\Controllers\ServersController::class, 'delete'])->name('delete');
            Route::post('check', [\App\Http\Controllers\ServersController::class, 'check'])->name('check');
        });
    });
});
