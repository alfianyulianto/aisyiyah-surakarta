<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDataCabangController;
use App\Http\Controllers\Admin\AdminDataDaerahController;
use App\Http\Controllers\Admin\AdminDataJabatanController;
use App\Http\Controllers\Admin\AdminDataKaderController;
use App\Http\Controllers\Admin\AdminDataPotensiKaderController;
use App\Http\Controllers\Admin\AdminDataRantingController;
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
use App\Http\Controllers\Kader\KaderDashboardController;
use App\Http\Controllers\Kader\KaderOrtomController;
use App\Http\Controllers\Kader\KaderPotensiController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TempatLahirController;
use App\Http\Controllers\UploadFotoController;
use App\Models\Pekerjaan;
use App\Models\Periode;
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
Route::get('/admin', [AdminDashboardController::class, 'index']);

// upload foto
Route::get('/upload/foto', [UploadFotoController::class, 'index']);
Route::post('/upload/foto', [UploadFotoController::class, 'upload_foto']);

// auth
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/change/password', [ChangePasswordController::class, 'edit']);
Route::put('/change/password', [ChangePasswordController::class, 'update']);

// teempat_lahir
Route::get('/data/tempat/lahir', function () {
  $tempat_lahir = TempatLahir::orderBy('tempat_lahir', 'asc')->get();
  return $tempat_lahir;
});

// periode
Route::get('/data/periode', function () {
  $periode = Periode::orderBy('created_at', 'desc')->get();
  return $periode;
});

// pekerjaan
Route::get('/data/pekerjaan', function () {
  $pekerjaan = Pekerjaan::orderBy('pekerjaan', 'asc')->get();
  return $pekerjaan;
});

// admin
Route::get('/profil', [ProfilController::class, 'edit']);
Route::put('/profil/update', [ProfilController::class, 'update']);
Route::resource('/data/kader', AdminDataKaderController::class);
Route::get('/kader/export', [AdminDataKaderController::class, 'export']);
Route::get('/get/kader/{kader:nik}', [AdminDataKaderController::class, 'get_kader']);
Route::get('/get/ranting/{ranting:cabang_id_cabang}', [AdminDataKaderController::class, 'ranting']);
Route::resource('/admin/ortom', OrtomAdminController::class);
Route::resource('/admin/potensi', PotensiAdminController::class);
// admin {Fitur:Data Jabatan}
Route::resource('/data/jabatan', AdminDataJabatanController::class);
// admin {Fitur:Jabatan Kader}
Route::get('/jabatan/kader', [TambahJabatanKaderController::class, 'index']);
Route::get('/jabatan/kader/daerah/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'create']);
Route::get('/get/jabatan/kader/daerah/{periode:id_periode}/{daerah}', [TambahJabatanKaderDaerahController::class, 'get_jabatan']);
Route::post('/jabatan/kader/daerah/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'store']);
Route::get('/data/jabatan/kader/daerah/{kader:nik}', [TambahJabatanKaderDaerahController::class, 'show']);
Route::delete('/jabatan/kader/daerah/{kader:nik}/{daerah:id_daerah}', [TambahJabatanKaderDaerahController::class, 'destroy']);
Route::get('/jabatan/kader/cabang/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'create']);
Route::get('/get/jabatan/kader/cabang/{periode:id_periode}/{cabang}', [TambahJabatanKaderCabangController::class, 'get_jabatan']);
Route::post('/jabatan/kader/cabang/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'store']);
Route::get('/data/jabatan/kader/cabang/{kader:nik}', [TambahJabatanKaderCabangController::class, 'show']);
Route::delete('/jabatan/kader/cabang/{kader:nik}/{cabang:id_cabang}', [TambahJabatanKaderCabangController::class, 'destroy']);
Route::get('/jabatan/kader/ranting/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'create']);
Route::get('/get/jabatan/kader/ranting/{periode:id_periode}/{ranting}', [TambahJabatanKaderRantingController::class, 'get_jabatan']);
Route::post('/jabatan/kader/ranting/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'store']);
Route::get('/data/jabatan/kader/ranting/{kader:nik}', [TambahJabatanKaderRantingController::class, 'show']);
Route::delete('/jabatan/kader/ranting/{kader:nik}/{ranting:id_ranting}', [TambahJabatanKaderRantingController::class, 'destroy']);
// admin {Fitur:Data Master}
Route::resource('/data/daerah', AdminDataDaerahController::class);
Route::get('/sk/pimpinan/daerah/{daerah:id_daerah}', [AdminDataDaerahController::class, 'download']);
Route::resource('/data/cabang', AdminDataCabangController::class);
Route::get('/sk/pimpinan/cabang/{cabang:id_cabang}', [AdminDataCabangController::class, 'download']);
Route::resource('/data/ranting', AdminDataRantingController::class);
Route::get('/sk/pimpinan/ranting/{ranting:id_ranting}', [AdminDataRantingController::class, 'download']);
Route::get('/data/potensi/kader', [AdminDataPotensiKaderController::class, 'index']);
Route::get('/data/potensi/kader/export', [AdminDataPotensiKaderController::class, 'export']);
// admin {Fitur:Tambah Admin}
Route::get('/tambah/admin', [TambahAdminController::class, 'index']);
Route::get('/admin/daerah/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'create']);
Route::post('/admin/daerah/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'store']);
Route::get('/data/admin/daerah/kader/{kader:nik}/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'show']);
Route::delete('/admin/daerah/{kader:nik}/{daerah:id_daerah}', [TambahAdminDaerahController::class, 'destroy']);
Route::get('/admin/cabang/{cabang:id_cabang}', [TambahAdminCabangController::class, 'create']);
Route::post('/admin/cabang/{cabang:id_cabang}', [TambahAdminCabangController::class, 'store']);
Route::get('/data/admin/cabang/kader/{kader:nik}/{cabang:id_cabang}', [TambahAdminCabangController::class, 'show']);
Route::delete('/admin/cabang/{kader:nik}/{cabang:id_cabang}', [TambahAdminCabangController::class, 'destroy']);
// Route::get('/tambah/admin/cabang/getkader/{kader}', [TambahAdminCabangController::class, 'get_kader']);
Route::get('/admin/ranting/{ranting:id_ranting}', [TambahAdminRantingController::class, 'create']);
Route::post('/admin/ranting/{ranting:id_ranting}', [TambahAdminRantingController::class, 'store']);
Route::get('/data/admin/ranting/kader/{kader:nik}/{ranting:id_ranting}', [TambahAdminRantingController::class, 'show']);
Route::delete('/admin/ranting/{kader:nik}/{ranting:id_ranting}', [TambahAdminRantingController::class, 'destroy']);
// admin {Fitur:Settings}
Route::get('/settings', [SettingsController::class, 'index']);
Route::resource('/ortom', DataOrtomController::class);
Route::resource('/potensi', DataPotensiController::class);
Route::resource('/pekerjaan', DataPekerjaanController::class);
Route::resource('/periode', DataPeriodeController::class);
Route::resource('/tempat/lahir', DataTempatLahirController::class);


// kader
Route::get('/kader', [KaderDashboardController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'edit']);
Route::put('/profil/update', [ProfilController::class, 'update']);
Route::resource('/kader/ortom', KaderOrtomController::class);
Route::resource('/kader/potensi', KaderPotensiController::class);
