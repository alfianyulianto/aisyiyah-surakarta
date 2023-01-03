<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDataProfileKaderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.profil-kader.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.profil-kader.create');
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
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_kta' => ['required', 'numeric', 'unique:App\Models\Kader,no_kta'],
      'no_ktm' => ['required', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['required'],
      'ranting_id_ranting' => ['required'],
      'email' => ['required', 'email:dns'],
      'jenis_kelamin' => ['required'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_ktp' => ['required', 'min:10'],
      'alamat_rumah' => ['required', 'min:10'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max:12', 'min:12']
    ]);
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
