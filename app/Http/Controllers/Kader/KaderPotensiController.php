<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\KaderPotensi;
use App\Models\Potensi;
use Illuminate\Http\Request;

class KaderPotensiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('kader.potensi.index', [
      'potensi' => KaderPotensi::orderBy('created_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('kader.potensi.create', [
      'potensi' => Potensi::orderBy('created_at', 'asc')->get()
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
      'id_kader_has_potensi' => ['required', 'max:9', 'min:9', 'unique:App\Models\KaderPotensi,id_kader_has_potensi'],
      'potensi_id_potensi' => ['required'],
      'potensi_kader_uraian' => ['required', 'min:10'],
    ]);

    // tambah nik user
    $validated['kader_nik'] = '3372010107000002';

    // insert ke tabel kader_has_potensi
    KaderPotensi::create($validated);

    // select tabel potensi
    $nama_potensi = Potensi::where('id_potensi', $request->potensi_id_potensi)->first()->potensi;

    return redirect('/kader/potensi')->with('message_potensi_kader', 'Data potensi ' . $nama_potensi . ' berhasil ditambahkan.');
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
    return view('kader.potensi.edit', [
      'kader_potensi' => KaderPotensi::where('id_kader_has_potensi', $id)->first(),
      'potensi' => Potensi::orderBy('created_at', 'asc')->get()
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
      'id_kader_has_potensi' => ['required', 'max:9', 'min:9'],
      'potensi_id_potensi' => ['required'],
      'potensi_kader_uraian' => ['required', 'min:10'],
    ];


    // cek apakah $request->id_kader_has_potensi sama dengan id_kader_has_potensi pada tabel kader_has_potensi
    if ($request->id_kader_has_potensi != $id) {
      $role['id_kader_has_potensi'] = ['required', 'max:11', 'min:11', 'unique:App\Models\KaderPotensi,id_kader_has_potensi'];
    }

    $validated = $request->validate($role);

    // update ke tabel kader_has_potensi
    KaderPotensi::where('id_kader_has_potensi', $id)->update($validated);

    // select tabel potensi
    $nama_potensi = Potensi::where('id_potensi', $request->potensi_id_potensi)->first()->potensi;

    return redirect('/kader/potensi')->with('message_potensi_kader', 'Data potensi ' . $nama_potensi . ' berhasil diubah.');
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
