<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminDataCabangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.cabang.index', [
      'cabang' => Cabang::orderByRaw('created_at DESC')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.cabang.create');
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
      'id_cabang' => ['required', 'min:9', 'max:9'],
      'nama_cabang' => ['required', 'min:5'],
      'alamat_cabang' => ['required', 'min:10'],
      'sk_pimp_cabang' => ['required'],
    ]);

    $validated['daerah_id_daerah'] = 'ska-1';

    $validated['sk_pimp_cabang'] = $request->file('sk_pimp_cabang')->storeAs('sk-pimpinan', 'SK-Cabang-' . Str::slug($request->nama_cabang) . '-' . date('d-m-Y') . '.png');

    // insert ke table cabang
    Cabang::create($validated);

    return redirect('/data/cabang')->with('message_cabang', 'Berhasil menambahkan cabang ' . $request->nama_cabang);
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
