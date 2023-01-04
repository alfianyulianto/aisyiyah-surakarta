<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ortom;
use App\Models\Potensi;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
  public function index()
  {
    return view('admin.settings.index', [
      'ortom' => Ortom::orderBy('nama_ortom', 'asc')->get(),
      'potensi' => Potensi::orderBy('potensi', 'asc')->get()
    ]);
  }

  public function ortom_store(Request $request)
  {
    $validated = $request->validate([
      'nama_ortom' => ['required', 'min:5', 'string'],
    ]);
  }

  public function potensi_store(Request $request)
  {
    $validated = $request->validate([
      'potensi_kader' => ['required', 'min:5', 'string'],
    ]);
  }

  public function pekerjaan_store(Request $request)
  {
    $validated = $request->validate([
      'nama_pekerjaan' => ['required', 'min:5', 'string'],
    ]);
  }

  public function periode_store(Request $request)
  {
    $validated = $request->validate([
      'awal_periode' => ['required', 'min:4', 'max:4', 'numeric'],
      'akhir_periode' => ['required', 'min:4', 'max:4', 'numeric'],
    ]);
  }
}
