<?php

namespace App\Http\Controllers\Admin\Jabatan_Kader;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;

class TambahJabatanKaderController extends Controller
{
  public function index()
  {
    // cek kategori user yang terautentikasi
    // jika seorang super admin atau admin daerah
    // if(Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3){
    return view('admin.jabatan_kader.tambah_jabatan_di_daerah.tampilan_super_admin_dan_admin_daerah', [
      'daerah' => Daerah::get()->first(),
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    ]);
    // }elseif(Auth::user()->kategori_user_id == 4){ // jika user admin cabang
    // return view('admin.jabatan_kader.tambah_jabatan_di_cabang.tampilan_admin_cabang', [
    //       'cabang' => Cabang::where('id_cabang', Auth::user()->admin_at)->orderBy('nama_cabang', 'asc')->get(),
    //       'ranting' => Ranting::where('cabang_id_cabang', Auth::user()->admin_at)->orderBy('nama_ranting', 'asc')->get()
    // }elseif(Auth::user()->kategori_user_id == 5){ // jika user admin ranting
    // return view('admin.jabatan_kader.tambah_jabatan_di_ranting.tampilan_admin_ranting', [
    //       'ranting' => Ranting::where('id_ranting', Auth::user()->admin_at)->orderBy('nama_ranting', 'asc')->get()
    // }
  }
}
