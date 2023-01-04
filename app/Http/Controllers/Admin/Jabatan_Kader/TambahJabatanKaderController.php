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
    return view('admin.jabatan_kader.index', [
      'daerah' => Daerah::where('id_daerah', 'ska-1')->get(),
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'ranting' => Ranting::orderBy('nama_ranting', 'asc')->get()
    ]);
  }
}
