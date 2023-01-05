<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ortom;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSettingsController extends Controller
{
  public function index()
  {
    return view('admin.settings.index', [
      'ortom' => Ortom::orderBy('created_at', 'asc')->get(),
      'potensi' => Potensi::orderBy('potensi', 'asc')->get()
    ]);
  }

  public function ortom_store(Request $request)
  {
    $validated = $request->validate([
      'nama_ortom' => ['required', 'min:5', 'string'],
    ]);
    $validated['id_ortom'] = 'ortm-' . Str::random(4);

    // insert ke tabel ortom
    Ortom::create($validated);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $request->nama_ortom . ' berhasil di tambahkan.');
  }

  public function potensi_store(Request $request)
  {
    $validated = $request->validate([
      'potensi' => ['required', 'min:5', 'string'],
    ]);
    $validated['id_potensi_kader'] = 'ptns-' . Str::random(4);

    // insert ke tabel ortom
    Potensi::create($validated);

    return redirect('/settings')->with('message_potensi', 'Data potensi ' . $request->potensi . ' berhasil di tambahkan.');
  }
}
