<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\KaderPotensi;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataPotensiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return redirect('/settings');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.settings.potensi.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'id_potensi' => ['required', 'unique:App\Models\Potensi,id_potensi'],
      'potensi' => ['required', 'min:5', 'string', 'unique:App\Models\Potensi,potensi'],
    ]);

    // ambil potensi dari form input dan ubah kata awal menjadi huruf kapital
    $potensi = $request->potensi;
    $lower_potensi = Str::lower($potensi);
    $validated['potensi'] = ucwords($lower_potensi);

    // insert ke tabel ortom
    Potensi::create($validated);

    return redirect('/settings')->with('message_potensi', 'Data potensi ' . $validated['potensi'] . ' berhasil di tambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Potensi $potensi)
  {
    return view('admin.settings.potensi.edit', [
      'potensi' => $potensi
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Potensi $potensi)
  {
    $role = [
      'id_potensi' => ['required'],
      'potensi' => ['required', 'min:5', 'string'],
    ];

    // ambil potensi dari form input dan ubah kata awal menjadi huruf kapital
    $jenis_potensi = $request->potensi;
    $lower_potensi = Str::lower($jenis_potensi);
    $validated['potensi'] = ucwords($lower_potensi);

    // cek jika user tidak mengganti id_potensi, potensi
    if ($potensi->id_potensi != $request->id_potensi) {
      $role['id_potensi'] = ['required', 'unique:App\Models\Potensi,id_potensi'];
    } elseif ($potensi->potensi != $validated['potensi']) {
      $role['potensi'] = ['required', 'min:5', 'string', 'unique:App\Models\Potensi,potensi'];
    }

    $validated = $request->validate($role);

    // insert ke tabel ortom
    $validatedData = [
      'id_potensi' => $request->id_potensi,
      'potensi' => $validated['potensi'] = ucwords($lower_potensi)
    ];
    $potensi->update($validatedData);

    return redirect('/settings')->with('message_potensi', 'Data potensi ' . $validatedData['potensi'] . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Potensi $potensi)
  {
    // ambil nama potensi
    $nama_potensi = $potensi->potensi;

    // delete data di tabel kader_has_ortom
    KaderPotensi::where('potensi_id_potensi', $potensi->id_potensi)->delete();

    // delete data di tabel potensi
    $potensi->delete();

    return redirect('/settings')->with('message_delete_potensi', 'Data potensi ' . $nama_potensi . ' berhasil dihapus!');
  }
}
