<?php

use App\Http\Controllers\Admin\AdminDataCabangController;
use App\Http\Controllers\Admin\AdminDataJabatanController;
use App\Http\Controllers\Admin\AdminDataProfileKaderController;
use App\Http\Controllers\Admin\AdminDataRantingController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

// admin
// Route::get('/admin', )
Route::resource('/profile/kader', AdminDataProfileKaderController::class);
Route::resource('/data/jabatan', AdminDataJabatanController::class);
Route::resource('/data/cabang', AdminDataCabangController::class);
Route::resource('/data/ranting', AdminDataRantingController::class);
Route::resource('/settings', AdminSettingsController::class);
