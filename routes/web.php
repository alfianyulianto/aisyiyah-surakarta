<?php

use App\Http\Controllers\Admin\AdminDataCabangController;
use App\Http\Controllers\Admin\AdminDataDaerahController;
use App\Http\Controllers\Admin\AdminDataJabatanController;
use App\Http\Controllers\Admin\AdminDataProfileKaderController;
use App\Http\Controllers\Admin\AdminDataRantingController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Kader\KaderDashboardController;
use App\Http\Controllers\Kader\KaderOrtomController;
use App\Http\Controllers\Kader\KaderPotensiController;
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
Route::get('/', [AdminDashboardController::class, 'index']);

// auth
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/change/password', [ChangePasswordController::class, 'edit']);

// admin
// Route::get('/admin', )
Route::resource('/profile/kader', AdminDataProfileKaderController::class);
Route::resource('/data/jabatan', AdminDataJabatanController::class);
Route::resource('/data/daerah', AdminDataDaerahController::class);
Route::resource('/data/cabang', AdminDataCabangController::class);
Route::resource('/data/ranting', AdminDataRantingController::class);
Route::resource('/settings', AdminSettingsController::class);

// kader
Route::get('/kader', [KaderDashboardController::class, 'index']);
Route::resource('/kader/ortom', KaderOrtomController::class);
Route::resource('/kader/potensi', KaderPotensiController::class);
