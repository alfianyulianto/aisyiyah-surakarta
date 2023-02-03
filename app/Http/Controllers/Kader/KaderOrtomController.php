<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\KaderOrtom;
use App\Models\Ortom;
use Illuminate\Http\Request;

class KaderOrtomController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('kader.ortom.index', [
      'ortom' => KaderOrtom::orderBy('created_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('kader.ortom.create', [
      'ortom' => Ortom::orderBy('nama_ortom', 'asc')->get()
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
      'id_kader_has_ortom' => ['required', 'max:11', 'min:11', 'unique:App\Models\KaderOrtom,id_kader_has_ortom'],
      'ortom_id_ortom' => ['required'],
      'ortom_uraian' => ['required', 'min:5'],
    ]);
    // tambah nik user
    $validated['kader_nik'] = '3372010107000002';

    // insert ke tabel kader_has_ortom
    KaderOrtom::create($validated);

    // select tabel ortom
    $nama_ortom = Ortom::where('id_ortom', $request->ortom_id_ortom)->first()->nama_ortom;

    return redirect('/kader/ortom')->with('message_ortom_kader', 'Data ortom ' . $nama_ortom . ' berhasil ditambahkan.');
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
  public function edit($id)
  {
    return view('kader.ortom.edit', [
      'kader_ortom' => KaderOrtom::where('id_kader_has_ortom', $id)->first(),
      'ortom' => Ortom::orderBy('nama_ortom', 'asc')->get()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $role = [
      'id_kader_has_ortom' => ['required', 'max:11', 'min:11'],
      'ortom_id_ortom' => ['required'],
      'ortom_uraian' => ['required', 'min:5'],
    ];

    // cek apakah $request->id_kader_has_ortom sama dengan id_kader_has_ortom pada tabel kader_has_ortom
    if ($request->id_kader_has_ortom != $id) {
      $role['id_kader_has_ortom'] = ['required', 'max:11', 'min:11', 'unique:App\Models\KaderOrtom,id_kader_has_ortom'];
    }

    $validated = $request->validate($role);

    // update ke tabel kader_has_ortom
    KaderOrtom::where('id_kader_has_ortom', $id)->update($validated);

    // select tabel ortom
    $nama_ortom = Ortom::where('id_ortom', $request->ortom_id_ortom)->first()->nama_ortom;

    return redirect('/kader/ortom')->with('message_ortom_kader', 'Data ortom ' . $nama_ortom . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
