<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ortom;
use App\Models\Pekerjaan;
use App\Models\Periode;
use App\Models\Potensi;
use App\Models\TempatLahir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSettingsController extends Controller
{
  public function index()
  {
    return view('admin.settings.index', [
      'ortom' => Ortom::orderBy('created_at', 'asc')->get(),
      'potensi' => Potensi::orderBy('potensi', 'asc')->get(),
      'tempat_lahir' => TempatLahir::orderBy('tempat_lahir', 'asc')->get(),
      'pekerjaan' => Pekerjaan::orderBy('pekerjaan', 'asc')->get(),
      'periode' => Periode::orderBy('periode', 'asc')->get(),
      'last_periode' => Periode::orderBy('created_at', 'asc')->get()->last()
    ]);
  }

  public function ortom_store(Request $request)
  {
    $validated = $request->validate([
      'nama_ortom' => ['required', 'min:5', 'string', 'unique:App\Models\Ortom,nama_ortom'],
    ]);
    $validated['id_ortom'] = 'ortm-' . Str::random(4);

    // insert ke tabel ortom
    Ortom::create($validated);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $request->nama_ortom . ' berhasil di tambahkan.');
  }

  public function potensi_store(Request $request)
  {
    $validated = $request->validate([
      'potensi' => ['required', 'min:5', 'string', 'unique:App\Models\Potensi,potensi'],
    ]);
    $validated['id_potensi'] = 'ptns-' . Str::random(4);

    // insert ke tabel ortom
    Potensi::create($validated);

    return redirect('/settings')->with('message_potensi', 'Data potensi ' . $request->potensi . ' berhasil di tambahkan.');
  }

  public function tempat_lahir_store(Request $request)
  {
    $validated = $request->validate([
      'tempat_lahir' => ['required', 'min:5', 'string', 'unique:App\Models\TempatLahir,tempat_lahir'],
    ]);
    $validated['id_tempat_lahir'] = 'tmptlhr-' . Str::random(4);

    // insert ke tabel tempat_lahir
    TempatLahir::create($validated);

    return redirect('/settings')->with('message_tempat_lahir', 'Nama kota ' . $request->tempat_lahir . ' berhasil di tambahkan.');
  }

  public function pekerjaan_store(Request $request)
  {
    $validated = $request->validate([
      'pekerjaan' => ['required', 'min:5', 'string', 'unique:App\Models\Pekerjaan,pekerjaan'],
    ]);
    $validated['id_pekerjaan'] = 'pkrjn-' . Str::random(4);

    // insert ke tabel pekerjaan
    Pekerjaan::create($validated);

    return redirect('/settings')->with('message_pekerjaan', 'Data pekerjaan ' . $request->pekerjaan . ' berhasil di tambahkan.');
  }

  public function periode_store(Request $request)
  {
    $validated = $request->validate([
      'nama_pekerjaan' => ['required', 'min:5', 'string'],
    ]);
    $validated['id_periode'] = 'prd-' . Str::random(4);

    // insert ke tabel periode
    Periode::create($validated);

    return redirect('/settings')->with('message_periode', 'Data periode ' . $request->periode . ' berhasil di tambahkan.');
  }
}
