<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\KaderOrtom;
use App\Models\Ortom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataOrtomController extends Controller
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
    return view('admin.settings.ortom.create', [
      'title' => 'Create Ortom',
    ]);
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
      'id_ortom' => ['required', 'unique:App\Models\Ortom,id_ortom'],
      'nama_ortom' => ['required', 'min:5', 'string', 'unique:App\Models\Ortom,nama_ortom'],
    ]);

    // ambil nama_ortom dari form input dan ubah kata awal menjadi huruf kapital
    $nama_ortom = $request->nama_ortom;
    $lower_nama_ortom = Str::lower($nama_ortom);
    $validated['nama_ortom'] = ucwords($lower_nama_ortom);


    // insert ke tabel ortom
    Ortom::create($validated);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $validated['nama_ortom'] . ' berhasil di tambahkan.');
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
  public function edit(Ortom $ortom)
  {
    return view('admin.settings.ortom.edit', [
      'title' => 'Edit Ortom',
      'ortom' => $ortom
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ortom $ortom)
  {
    $role = [
      'id_ortom' => ['required'],
      'nama_ortom' => ['required', 'min:5'],
    ];

    // ambil nama_ortom dari form input dan ubah kata awal menjadi huruf kapital
    $nama_ortom = $request->nama_ortom;
    $lower_nama_ortom = Str::lower($nama_ortom);
    $validated['nama_ortom'] = ucwords($lower_nama_ortom);

    // cek jika user tidak mengganti id_ortom, nama ortom
    if ($ortom->id_ortom != $request->id_ortom) {
      $role['id_ortom'] = ['required', 'unique:App\Models\Ortom,id_ortom'];
    } elseif ($ortom->nama_ortom != $validated['nama_ortom']) {
      $role['nama_ortom'] = ['required', 'min:5', 'string', 'unique:App\Models\Ortom,nama_ortom'];
    }

    $validated = $request->validate($role);

    // insert ke tabel ortom
    $validatedData = [
      'id_ortom' => $request->id_ortom,
      'nama_ortom' => $validated['nama_potensi'] = ucwords($lower_nama_ortom)
    ];
    $ortom->update($validatedData);

    return redirect('/settings')->with('message_ortom', 'Data ortom ' . $validatedData['nama_ortom'] . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ortom $ortom)
  {
    // ambil nama ortom
    $nama_ortom = $ortom->nama_ortom;

    // delete data di tabel kader_has_ortom
    KaderOrtom::where('ortom_id_ortom', $ortom->id_ortom)->delete();

    // delete data di tabel ortom
    $ortom->delete();

    return redirect('/settings')->with('message_delete_ortom', 'Data ortom ' . $nama_ortom . ' berhasil dihapus!');
  }
}
