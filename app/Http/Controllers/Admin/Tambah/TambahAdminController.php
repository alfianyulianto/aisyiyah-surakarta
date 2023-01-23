<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\Ranting;
use Illuminate\Http\Request;

class TambahAdminController extends Controller
{
  public function index()
  {
    // cek kategori user yang terautentikasi
    // if(Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3){
    return view('admin.tambah_admin.tambah_admin_daerah.tampilan_super_admin_dan_admin_daerah', [
      'daerah' => Daerah::get()->first(),
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    ]);
    // }elseif(Auth::user()->kategori_user_id == 4){ // jika user admin cabang
    // return view('admin.tambah_admin.tambah_admin_cabang.tampilan_admin_cabang', [
    //       'cabang' => Cabang::where('id_cabang', Auth::user()->admin_at)->orderBy('nama_cabang', 'asc')->get(),
    //       'ranting' => Ranting::where('cabang_id_cabang', Auth::user()->admin_at)->orderBy('nama_ranting', 'asc')->get()
    // }elseif(Auth::user()->kategori_user_id == 5){ // jika user admin ranting
    // return view('admin.tambah_admin.tambah_admin_ranting.tampilan_admin_ranting', [
    //       'ranting' => Ranting::where('id_ranting', Auth::user()->admin_at)->orderBy('nama_ranting', 'asc')->get()
    // }
  }
}
