<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Ortom;
use App\Models\Pekerjaan;
use App\Models\Periode;
use App\Models\Potensi;
use App\Models\TempatLahir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
  public function index()
  {
    // cek jika user bukan super admin
    if (Auth::user()->kategori_user_id != 2) {
      return abort(404);
    }

    return view('admin.settings.index', [
      'ortom' => Ortom::orderBy('created_at', 'asc')->get(),
      'potensi' => Potensi::orderBy('potensi', 'asc')->get(),
      'tempat_lahir' => TempatLahir::orderBy('tempat_lahir', 'asc')->get(),
      'pekerjaan' => Pekerjaan::orderBy('pekerjaan', 'asc')->get(),
      'periode' => Periode::orderBy('periode', 'asc')->get(),
      'last_periode' => Periode::orderBy('created_at', 'asc')->get()->last()
    ]);
  }
}
