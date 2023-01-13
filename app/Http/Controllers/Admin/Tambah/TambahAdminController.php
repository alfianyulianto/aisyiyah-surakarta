<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Ranting;
use Illuminate\Http\Request;

class TambahAdminController extends Controller
{
  public function index()
  {
    // cek kategori user yang terautentikasi
    // if(){
    return view('admin.tambah_admin.tampilan_super_admin', [
      'daerah' => Daerah::where('id_daerah', 'aisyiyah-surakarta')->get(),
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    ]);
    // }elseif(){ // jika user admin daerah
    // return view('admin.tambah_admin.tampilan_admin_daerah', [
    //       'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
    //       'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    // }elseif(){ // jika user admin cabang
    // return view('admin.tambah_admin.tampilan_admin_cabang', [
    //       'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    // }
  }
}
