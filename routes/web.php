<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\AjuanPklController;

// Rute Publik
Route::get('/', function () {
    return view('index');
})->name('home');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute Admin
    Route::middleware(['role:admin'])->group(function () {
        // Dashboard Admin
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Manajemen Siswa
        Route::get('/admin/siswa', [AdminController::class, 'siswaIndex'])->name('admin.siswa.index');
        Route::get('/admin/siswa/create', [AdminController::class, 'siswaCreate'])->name('admin.siswa.create');
        Route::post('/admin/siswa', [AdminController::class, 'siswaStore'])->name('admin.siswa.store');
        Route::get('/admin/siswa/{siswa}/edit', [AdminController::class, 'siswaEdit'])->name('admin.siswa.edit');
        Route::put('/admin/siswa/{siswa}', [AdminController::class, 'siswaUpdate'])->name('admin.siswa.update');
        Route::delete('/admin/siswa/{siswa}', [AdminController::class, 'siswaDestroy'])->name('admin.siswa.destroy');

        // Manajemen Industri
        Route::get('/admin/industri', [IndustriController::class, 'index'])->name('admin.industri.index');
        Route::get('/admin/industri/create', [IndustriController::class, 'create'])->name('admin.industri.create');
        Route::post('/admin/industri', [IndustriController::class, 'store'])->name('admin.industri.store');
        Route::get('/admin/industri/{industri}/edit', [IndustriController::class, 'edit'])->name('admin.industri.edit');
        Route::put('/admin/industri/{industri}', [IndustriController::class, 'update'])->name('admin.industri.update');
        Route::delete('/admin/industri/{industri}', [IndustriController::class, 'destroy'])->name('admin.industri.destroy');

        // Manajemen Guru
        Route::get('/admin/guru', [AdminController::class, 'guruIndex'])->name('admin.guru.index');
        Route::get('/admin/guru/create', [AdminController::class, 'guruCreate'])->name('admin.guru.create');
        Route::post('/admin/guru', [AdminController::class, 'guruStore'])->name('admin.guru.store');
        Route::get('/admin/guru/{guru}/edit', [AdminController::class, 'guruEdit'])->name('admin.guru.edit');
        Route::put('/admin/guru/{guru}', [AdminController::class, 'guruUpdate'])->name('admin.guru.update');
        Route::delete('/admin/guru/{guru}', [AdminController::class, 'guruDestroy'])->name('admin.guru.destroy');

        // Manajemen Pengajuan
        Route::prefix('admin/pengajuan')->name('admin.pengajuan.')->group(function () {
            Route::get('/', [AdminController::class, 'pengajuanIndex'])->name('index');
            Route::put('/{id}/status', [AdminController::class, 'updatePengajuanStatus'])->name('status');
            Route::get('/filter', [AdminController::class, 'filterPengajuan'])->name('filter');
            Route::get('/{id}', [AdminController::class, 'detailPengajuan'])->name('detail');
        });
    });

    // Rute Guru
    Route::middleware(['role:guru'])->group(function () {
        // Dashboard Guru
        Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');

        // Pengajuan PKL Guru
        Route::get('/guru/pengajuan', [GuruController::class, 'pengajuanIndex'])->name('guru.pengajuan.index');
        Route::put('/guru/pengajuan/{ajuan}/status', [GuruController::class, 'updatePengajuanStatus'])->name('guru.pengajuan.status');
    });

    // Rute Siswa
    Route::middleware(['role:siswa'])->group(function () {
        // Dashboard Siswa
        Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
        Route::get('/siswa/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/destroy', [SiswaController::class, 'destroy'])->name('siswa.destroy');

        // Pengajuan PKL Siswa
        Route::get('/siswa/pengajuan', [SiswaController::class, 'pengajuanIndex'])->name('siswa.pengajuan.index');
        Route::get('/siswa/pengajuan/create', [SiswaController::class, 'pengajuanCreate'])->name('siswa.pengajuan.create');
        Route::post('/siswa/pengajuan', [SiswaController::class, 'pengajuanStore'])->name('siswa.pengajuan.store');
        
        // Status PKL Siswa
        Route::get('/siswa/status', [SiswaController::class, 'statusPengajuan'])->name('siswa.status');
        Route::get('/siswa/pengajuan/{ajuanPkl}/cetak', [SiswaController::class, 'cetakPengajuan'])->name('siswa.pengajuan.cetak');
    });

    // Profile Route
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile/update', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.profile.update');
});