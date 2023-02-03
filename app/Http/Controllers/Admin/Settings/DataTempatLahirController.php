<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\TempatLahir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataTempatLahirController extends Controller
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
    return view('admin.settings.tempat_lahir.create');
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
      'id_tempat_lahir' => ['required', 'min:12', 'max:12', 'unique:App\Models\TempatLahir,id_tempat_lahir'],
      'tempat_lahir' => ['required', 'min:5', 'string', 'unique:App\Models\TempatLahir,tempat_lahir'],
    ]);

    // ambil tempat_lahir dari form input dan ubah kata awal menjadi huruf kapital
    $tempat_lahir = $request->tempat_lahir;
    $lower_tempat_lahir = Str::lower($tempat_lahir);
    $validated['tempat_lahir']  = ucwords($lower_tempat_lahir);

    // insert ke tabel tempat_lahir
    TempatLahir::create($validated);

    return redirect('/settings')->with('message_tempat_lahir', 'Nama kota ' . $validated['tempat_lahir'] . ' berhasil di tambahkan.');
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
  public function edit(TempatLahir $lahir)
  {
    return view('admin.settings.tempat_lahir.edit', [
      'tempat_lahir' => $lahir
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, TempatLahir $lahir)
  {
    $role = [
      'id_tempat_lahir' => ['required', 'min:12', 'max:12'],
      'tempat_lahir' => ['required', 'min:5', 'string'],
    ];

    // ambil tempat_lahir dari form input dan ubah kata awal menjadi huruf kapital
    $tempat_lahir = $request->tempat_lahir;
    $lower_tempat_lahir = Str::lower($tempat_lahir);
    $validated['tempat_lahir']  = ucwords($lower_tempat_lahir);

    // cek jika user tidak mengganti id_tempat_lahir, tempat_lahir
    if ($lahir->id_tempat_lahir != $request->id_tempat_lahir) {
      $role['id_tempat_lahir'] = ['required', 'min:12', 'max:12', 'unique:App\Models\TempatLahir,id_tempat_lahir'];
    } elseif ($lahir->tempat_lahir != $validated['tempat_lahir']) {
      $role['tempat_lahir'] = ['required', 'min:5', 'string', 'unique:App\Models\TempatLahir,tempat_lahir'];
    }

    $validated = $request->validate($role);

    // update ke tabel tempat_lahir
    $validatedData = [
      'id_tempat_lahir' => $request->id_tempat_lahir,
      'tempat_lahir' => $validated['tempat_lahir'] = ucwords($lower_tempat_lahir)
    ];

    // insert ke tabel tempat_lahir
    $lahir->update($validatedData);

    return redirect('/settings')->with('message_tempat_lahir', 'Nama kota ' . $validatedData['tempat_lahir'] . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(TempatLahir $lahir)
  {
    // ambil tempat_lahir
    $tempat_lahir = $lahir->tempat_lahir;

    // delete data di tabel pekerjaan
    $lahir->delete();

    return redirect('/settings')->with('message_delete_tempat_lahir', 'Data tempat lahir ' . $tempat_lahir . ' berhasil dihapus!');
  }
}
