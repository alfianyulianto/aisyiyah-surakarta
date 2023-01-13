<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminDataRantingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.ranting.index', [
      'ranting' => Ranting::orderByRaw('cabang_id_cabang ASC')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // ambil data nama_cabang dan id_cabang pada tabel cabang
    $nama_cabang = Cabang::pluck('nama_cabang', 'id_cabang')->toArray();
    return view('admin.ranting.create', compact('nama_cabang'));
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
      'id_ranting' => ['required', 'min:10', 'max:10'],
      'cabang_id_cabang' => ['required'],
      'nama_ranting' => ['required', 'min:5'],
      'alamat_ranting' => ['required', 'min:10'],
      'sk_pimp_ranting' => ['required'],
    ]);

    $validated['daerah_id_daerah'] = 'ska-1';

    $validated['sk_pimp_ranting'] = $request->file('sk_pimp_ranting')->storeAs('sk-pimpinan', 'SK-Ranting-' . Str::slug($request->nama_cabang) . '-' . date('d-m-Y') . '.png');

    // insert ke table cabang
    Ranting::create($validated);

    return redirect('/data/ranting')->with('message_cabang', 'Berhasil menambahkan ranting ' . $request->nama_cabang);
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
