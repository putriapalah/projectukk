<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuTanahController;
use App\Http\Controllers\SuratUkurController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LayananAduanController;
use App\Http\Controllers\LayananAduanAdminController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/





/// LOGIN & LOGOUT

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login'])->name('login.submit');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');


/// DASHBOARD ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/// LANDING PAGE — **PERBAIKAN PENTING**
Route::get('/', [LandingPageController::class, 'index'])->name('landing');



/// RESOURCE ROUTES
Route::resource('bukuTanah', BukuTanahController::class);
Route::resource('suratUkur', SuratUkurController::class);

Route::resource('berita', BeritaController::class)->parameters([
    'berita' => 'berita'
]);

Route::resource('pegawai', PegawaiController::class);

Route::middleware(['auth'])->group(function () {

    Route::get('/aduan', [LayananAduanController::class, 'userIndex'])
        ->name('aduan.user');

    Route::post('/aduan', [LayananAduanController::class, 'userStore'])
        ->name('aduan.user.store');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/aduan', [LayananAduanAdminController::class, 'index'])
            ->name('aduan.index');

        Route::get('/aduan/{id}/edit', [LayananAduanAdminController::class, 'edit'])
            ->name('aduan.edit');

        Route::put('/aduan/{id}', [LayananAduanAdminController::class, 'update'])
            ->name('aduan.update');
    });
