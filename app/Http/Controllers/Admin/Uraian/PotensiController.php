<?php

namespace App\Http\Controllers\Admin\Uraian;

use App\Http\Controllers\Controller;
use App\Models\KaderPotensi;
use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.uraian_potensi.index', [
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
    // ambil data nama_potensi dan id_cabang pada tabel potensi
    $nama_potensi = Potensi::pluck('potensi', 'id_potensi')->toArray();
    return view('admin.uraian_potensi.create', compact('nama_potensi'));
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
      'id_kader_has_potensi' => ['required', 'max:9', 'min:9'],
      'potensi_id_potensi' => ['required'],
      'potensi_kader_uraian' => ['required', 'min:10'],
    ]);

    // tambah nik user
    $validated['kader_nik'] = '3372010107000002';

    // insert ke tabel kader_has_potensi
    KaderPotensi::create($validated);

    // select tabel potensi
    $nama_potensi = Potensi::where('id_potensi', $request->potensi_id_potensi)->first()->potensi;

    return redirect('/admin/potensi')->with('message_potensi_admin', 'Data potensi ' . $nama_potensi . ' berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
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
