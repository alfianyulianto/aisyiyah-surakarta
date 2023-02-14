<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDataCabangController;
use App\Http\Controllers\Admin\AdminDataDaerahController;
use App\Http\Controllers\Admin\AdminDataJabatanController;
use App\Http\Controllers\Admin\AdminDataPotensiKaderController;
use App\Http\Controllers\Admin\AdminDataRantingController;
use App\Http\Controllers\Admin\Data_Kader\DataKaderDaerahController;
use App\Http\Controllers\Admin\Data_Kader\DataKaderCabangController;
use App\Http\Controllers\Admin\Data_Kader\DataKaderRantingController;
use App\Http\Controllers\Admin\Jabatan_Kader\TambahJabatanKaderController;
use App\Http\Controllers\Admin\Jabatan_Kader\TambahJabatanKaderCabangController;
use App\Http\Controllers\Admin\Jabatan_Kader\TambahJabatanKaderDaerahController;
use App\Http\Controllers\Admin\Jabatan_Kader\TambahJabatanKaderRantingController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\Settings\DataOrtomController;
use App\Http\Controllers\Admin\Settings\DataPekerjaanController;
use App\Http\Controllers\Admin\Settings\DataPeriodeController;
use App\Http\Controllers\Admin\Settings\DataPotensiController;
use App\Http\Controllers\Admin\Settings\DataTempatLahirController;
use App\Http\Controllers\Admin\Tambah\TambahAdminCabangController;
use App\Http\Controllers\Admin\Tambah\TambahAdminController;
use App\Http\Controllers\Admin\Tambah\TambahAdminDaerahController;
use App\Http\Controllers\Admin\Tambah\TambahAdminRantingController;
use App\Http\Controllers\Admin\Uraian\OrtomAdminController;
use App\Http\Controllers\Admin\Uraian\PotensiAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Kader\KaderDashboardController;
use App\Http\Controllers\Kader\KaderOrtomController;
use App\Http\Controllers\Kader\KaderPotensiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UploadFotoController;
use App\Models\Pekerjaan;
use App\Models\TempatLahir;
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
Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('admin');

// upload foto
Route::get('/upload/foto', [UploadFotoController::class, 'index'])->middleware('auth');
Route::post('/upload/foto', [UploadFotoController::class, 'upload_foto']);

// auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/change/password', [ChangePasswordController::class, 'edit'])->middleware('auth');
Route::put('/change/password', [ChangePasswordController::class, 'update'])->middleware('auth');
Route::get('/forgot/password', [ForgotPasswordController::class, 'edit'])->middleware('guest');
Route::put('/forgot/password', [ForgotPasswordController::class, 'update'])->middleware('guest');

// tempat_lahir
Route::get('/data/tempat/lahir', function () {
  $tempat_lahir = TempatLahir::orderBy('tempat_lahir', 'asc')->get();
  return $tempat_lahir;
})->middleware('auth');

// // periode
// Route::get('/data/periode', function () {
//   $periode = Periode::orderBy('created_at', 'desc')->get();
//   return $periode;
// })->middleware('auth');

// pekerjaan
Route::get('/data/pekerjaan', function () {
  $pekerjaan = Pekerjaan::orderBy('pekerjaan', 'asc')->get();
  return $pekerjaan;
})->middleware('auth');

// admin
// admin {Fitur:Profil}
Route::get('/profil', [ProfilController::class, 'edit'])->middleware('auth');
Route::put('/profil/update', [ProfilController::class, 'update'])->middleware('auth');

// admin {Fitur:Data Kader Daerah}
Route::resource('/data/kader/daerah', DataKaderDaerahController::class)->middleware('admin');
Route::resource('/data/kader/daerah', DataKaderDaerahController::class)->middleware('admin');
Route::get('/kader/export', [DataKaderDaerahController::class, 'export'])->middleware('admin');
Route::get('/get/kader/{kader:nik}', [DataKaderDaerahController::class, 'get_kader'])->middleware('admin');
Route::get('/get/ranting/kader/daerah/{ranting:cabang_id_cabang}', [DataKaderDaerahController::class, 'ranting'])->middleware('auth');
// admin {Fitur:Data Kader Cabang}
Route::resource('/data/kader/cabang', DataKaderCabangController::class)->middleware('admin');
Route::get('/get/kader/{kader:nik}', [DataKaderCabangController::class, 'get_kader'])->middleware('admin');
// admin {Fitur:Data Kader Ranting}
Route::resource('/data/kader/ranting', DataKaderRantingController::class)->middleware('admin');
Route::get('/get/kader/{kader:nik}', [DataKaderRantingController::class, 'get_kader'])->middleware('admin');
Route::get('/get/ranting/kader/ranting/{ranting:cabang_id_cabang}', [DataKaderRantingController::class, 'ranting'])->middleware('auth');

// admin {Fitur:Ortom Admin & Potensi Admin}
Route::resource('/admin/ortom', OrtomAdminController::class)->middleware('admin');
Route::resource('/admin/potensi', PotensiAdminController::class)->middleware('admin');

// admin {Fitur:Data Jabatan}
Route::resource('/data/jabatan', AdminDataJabatanController::class)->middleware('admin');
// admin {Fitur:Jabatan Kader}
Route::get('/jabatan/kader', [TambahJabatanKaderController::class, 'index'])->middleware('admin');
Route::get('/jabatan/kader/daerah/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'create'])->middleware('admin');
Route::get('/get/jabatan/kader/daerah/{periode:id_periode}/{daerah}', [TambahJabatanKaderDaerahController::class, 'get_jabatan'])->middleware('admin');
Route::post('/jabatan/kader/daerah/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'store']);
Route::get('/data/jabatan/kader/daerah/{kader:nik}', [TambahJabatanKaderDaerahController::class, 'show'])->middleware('admin');
Route::delete('/jabatan/kader/daerah/{kader_jabatan:id_kader_jabatan}/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'destroy']);
Route::get('/jabatan/kader/cabang/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'create'])->middleware('admin');
Route::get('/get/jabatan/kader/cabang/{periode:id_periode}/{cabang}', [TambahJabatanKaderCabangController::class, 'get_jabatan'])->middleware('admin');
Route::post('/jabatan/kader/cabang/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'store']);
Route::get('/data/jabatan/kader/cabang/{kader:nik}', [TambahJabatanKaderCabangController::class, 'show'])->middleware('admin');
Route::delete('/jabatan/kader/cabang//{kader_jabatan:id_kader_jabatan}/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'destroy']);
Route::get('/jabatan/kader/ranting/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'create'])->middleware('admin');
Route::get('/get/jabatan/kader/ranting/{periode:id_periode}/{ranting}', [TambahJabatanKaderRantingController::class, 'get_jabatan'])->middleware('admin');
Route::post('/jabatan/kader/ranting/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'store']);
Route::get('/data/jabatan/kader/ranting/{kader:nik}', [TambahJabatanKaderRantingController::class, 'show'])->middleware('admin');
Route::delete('/jabatan/kader/ranting//{kader_jabatan:id_kader_jabatan}/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'destroy']);

// admin {Fitur:Data Master}
Route::resource('/data/daerah', AdminDataDaerahController::class)->middleware('admin');
Route::get('/sk/pimpinan/daerah/{daerah:id_daerah}', [AdminDataDaerahController::class, 'download'])->middleware('admin');
Route::resource('/data/cabang', AdminDataCabangController::class)->middleware('admin');
Route::get('/sk/pimpinan/cabang/{cabang:id_cabang}', [AdminDataCabangController::class, 'download'])->middleware('admin');
Route::resource('/data/ranting', AdminDataRantingController::class)->middleware('admin');
Route::get('/sk/pimpinan/ranting/{ranting:id_ranting}', [AdminDataRantingController::class, 'download'])->middleware('admin');
Route::get('/data/potensi/kader', [AdminDataPotensiKaderController::class, 'index'])->middleware('admin');
Route::get('/data/potensi/kader/export', [AdminDataPotensiKaderController::class, 'export'])->middleware('admin');

// admin {Fitur:Tambah Admin}
Route::get('/tambah/admin', [TambahAdminController::class, 'index'])->middleware('admin');
Route::get('/admin/daerah/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'create'])->middleware('admin');
Route::post('/admin/daerah/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'store']);
Route::get('/data/admin/daerah/kader/{kader:nik}/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'show'])->middleware('admin');
Route::delete('/admin/daerah/{kader:nik}/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'destroy']);
Route::get('/admin/cabang/{cabang:id_cabang}', [TambahAdminCabangController::class, 'create'])->middleware('admin');
Route::post('/admin/cabang/{cabang:id_cabang}', [TambahAdminCabangController::class, 'store']);
Route::get('/data/admin/cabang/kader/{kader:nik}/{cabang:id_cabang}', [TambahAdminCabangController::class, 'show'])->middleware('admin');
Route::delete('/admin/cabang/{kader:nik}/{cabang:id_cabang}', [TambahAdminCabangController::class, 'destroy']);
Route::get('/admin/ranting/{ranting:id_ranting}', [TambahAdminRantingController::class, 'create'])->middleware('admin');
Route::post('/admin/ranting/{ranting:id_ranting}', [TambahAdminRantingController::class, 'store']);
Route::get('/data/admin/ranting/kader/{kader:nik}/{ranting:id_ranting}', [TambahAdminRantingController::class, 'show'])->middleware('admin');
Route::delete('/admin/ranting/{kader:nik}/{ranting:id_ranting}', [TambahAdminRantingController::class, 'destroy']);

// admin {Fitur:Settings}
Route::get('/settings', [SettingsController::class, 'index'])->middleware('admin');
Route::resource('/ortom', DataOrtomController::class)->middleware('admin');
Route::resource('/potensi', DataPotensiController::class)->middleware('admin');
Route::resource('/pekerjaan', DataPekerjaanController::class)->middleware('admin');
Route::resource('/periode', DataPeriodeController::class)->middleware('admin');
Route::resource('/tempat/lahir', DataTempatLahirController::class)->middleware('admin');


// kader
Route::get('/kader', [KaderDashboardController::class, 'index'])->middleware('kader');
Route::get('/profil', [ProfilController::class, 'edit'])->middleware('auth');
Route::put('/profil/update', [ProfilController::class, 'update'])->middleware('auth');
Route::resource('/kader/ortom', KaderOrtomController::class)->middleware('kader');
Route::resource('/kader/potensi', KaderPotensiController::class)->middleware('kader');
