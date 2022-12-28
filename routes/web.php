<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDataCabangController;
use App\Http\Controllers\Admin\AdminDataDaerahController;
use App\Http\Controllers\Admin\AdminDataJabatanController;
use App\Http\Controllers\Admin\AdminDataProfileKaderController;
use App\Http\Controllers\Admin\AdminDataRantingController;
use App\Http\Controllers\Admin\AdminMenambahAdminCabangController;
use App\Http\Controllers\Admin\AdminMenambahAdminDaerahController;
use App\Http\Controllers\Admin\AdminMenambahAdminRantingController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Kader\KaderDashboardController;
use App\Http\Controllers\Kader\KaderOrtomController;
use App\Http\Controllers\Kader\KaderPotensiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UploadFotoController;
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

// dashboard
Route::get('/admin', [AdminDashboardController::class, 'index']);

// upload foto
Route::get('/upload/foto', [UploadFotoController::class, 'index']);

// auth
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/change/password', [ChangePasswordController::class, 'edit']);

// admin
Route::get('/data/profil', [ProfilController::class, 'edit']);
Route::resource('/profile/kader', AdminDataProfileKaderController::class);
Route::resource('/data/jabatan', AdminDataJabatanController::class);
Route::resource('/data/daerah', AdminDataDaerahController::class);
Route::resource('/data/cabang', AdminDataCabangController::class);
Route::resource('/data/ranting', AdminDataRantingController::class);
Route::resource('/tambah/admin/daerah', AdminMenambahAdminDaerahController::class);
Route::resource('/tambah/admin/cabang', AdminMenambahAdminCabangController::class);
Route::resource('/tambah/admin/ranting', AdminMenambahAdminRantingController::class);
Route::resource('/settings', AdminSettingsController::class);

// kader
Route::get('/kader', [KaderDashboardController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'edit']);
Route::resource('/kader/ortom', KaderOrtomController::class);
Route::resource('/kader/potensi', KaderPotensiController::class);
