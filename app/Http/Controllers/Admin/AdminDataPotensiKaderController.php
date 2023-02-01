<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataPotensiKaderExport;
use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\KaderPotensi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminDataPotensiKaderController extends Controller
{
  public function index()
  {
    $kader_potensi = collect([]);
    $kader = Kader::orderBy('cabang_id_cabang', 'asc')->orderBy('ranting_id_ranting', 'asc')->get();
    foreach ($kader as $k) {
      $cek_kader_potensi = KaderPotensi::where('kader_nik', $k->nik)->first();
      if ($cek_kader_potensi) {
        $kader_potensi->push($cek_kader_potensi);
      }
    }
    return view('admin.potensi.index', [
      'kader_potensi' => $kader_potensi
    ]);
  }
  public function export()
  {
    return Excel::download(new DataPotensiKaderExport, 'Data Potensi Kader per ' . date('d-m-Y') . '.xlsx');
  }
}
