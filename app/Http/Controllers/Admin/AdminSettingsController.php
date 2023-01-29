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

    // ambil nama_ortom dari form input dan ubah kata awal menjadi huruf kapital
    $nama_ortom = $request->nama_ortom;
    $lower_nama_ortom = Str::lower($nama_ortom);
    $validated['nama_ortom'] = ucwords($lower_nama_ortom);


    // insert ke tabel ortom
    Ortom::create($validated);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $validated['nama_ortom'] . ' berhasil di tambahkan.');
  }

  public function ortom_update(Request $request)
  {
    return $request;
    $validated = $request->validate([
      'nama_ortom' => ['required', 'min:5', 'string', 'unique:App\Models\Ortom,nama_ortom'],
    ]);
    $validated['id_ortom'] = 'ortm-' . Str::random(4);

    // ambil nama_ortom dari form input dan ubah kata awal menjadi huruf kapital
    $nama_ortom = $request->nama_ortom;
    $lower_nama_ortom = Str::lower($nama_ortom);
    $validated['nama_ortom'] = ucwords($lower_nama_ortom);


    // insert ke tabel ortom
    Ortom::create($validated);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $validated['nama_ortom'] . ' berhasil di tambahkan.');
  }

  public function potensi_store(Request $request)
  {
    $validated = $request->validate([
      'potensi' => ['required', 'min:5', 'string', 'unique:App\Models\Potensi,potensi'],
    ]);
    $validated['id_potensi'] = 'ptns-' . Str::random(4);

    // ambil potensi dari form input dan ubah kata awal menjadi huruf kapital
    $potensi = $request->potensi;
    $lower_potensi = Str::lower($potensi);
    $validated['potensi'] = ucwords($lower_potensi);

    // insert ke tabel ortom
    Potensi::create($validated);

    return redirect('/settings')->with('message_potensi', 'Data potensi ' . $validated['potensi'] . ' berhasil di tambahkan.');
  }

  public function tempat_lahir_store(Request $request)
  {
    $validated = $request->validate([
      'tempat_lahir' => ['required', 'min:5', 'string', 'unique:App\Models\TempatLahir,tempat_lahir'],
    ]);
    $validated['id_tempat_lahir'] = 'tmptlhr-' . Str::random(4);

    // ambil tempat_lahir dari form input dan ubah kata awal menjadi huruf kapital
    $tempat_lahir = $request->tempat_lahir;
    $lower_tempat_lahir = Str::lower($tempat_lahir);
    $validated['tempat_lahir']  = ucwords($lower_tempat_lahir);

    // insert ke tabel tempat_lahir
    TempatLahir::create($validated);

    return redirect('/settings')->with('message_tempat_lahir', 'Nama kota ' . $validated['tempat_lahir'] . ' berhasil di tambahkan.');
  }

  public function pekerjaan_store(Request $request)
  {
    $validated = $request->validate([
      'pekerjaan' => ['required', 'min:5', 'string', 'unique:App\Models\Pekerjaan,pekerjaan'],
    ]);
    $validated['id_pekerjaan'] = 'pkrjn-' . Str::random(4);

    // ambil pekerjaan dari form input dan ubah kata awal menjadi huruf kapital
    $pekerjaan = $request->pekerjaan;
    $lower_pekerjaan = Str::lower($pekerjaan);
    $validated['pekerjaan'] = ucwords($lower_pekerjaan);

    // insert ke tabel pekerjaan
    Pekerjaan::create($validated);

    return redirect('/settings')->with('message_pekerjaan', 'Data pekerjaan ' .  $validated['pekerjaan'] . ' berhasil di tambahkan.');
  }

  public function periode_store(Request $request)
  {
    $validated = $request->validate([
      'periode' => ['required', 'min:5', 'string', 'unique:App\Models\Periode,periode'],
    ]);
    $validated['id_periode'] = 'prd-' . Str::random(4);

    $validated['periode'] = Str::replace(' ', '', $request->periode);

    // insert ke tabel periode
    Periode::create($validated);

    return redirect('/settings')->with('message_periode', 'Data periode ' . $validated['periode'] . ' berhasil di tambahkan.');
  }
}
