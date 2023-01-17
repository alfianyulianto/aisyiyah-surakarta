<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\User;
use Illuminate\Http\Request;

class TambahAdminCabangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.tambah_admin.tambah_admin_cabang.create', [
      'kader' => Kader::where('cabang_id_cabang', 'cbng-banjarsari')->orderBy('nama', 'asc')->get(),
      // ambil data di tabel user dengan kategori_user 3
      'admin_cabang' => User::where('kategori_user', 3)->get()->each(function ($user) {
        Kader::where('nik', $user->nik)->where('cabang_id_cabang', 'cbng-banjarsari')->orderBy('nama', 'asc')->get();
      })
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'nik' => ['required'],
      'nama' => ['required'],
      'no_kta' => ['required'],
      'no_ktm' => ['required'],
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

  public function get_kader($nik)
  {
    $kader = Kader::where('nik', $nik)->first();

    return response()->json(['result' => $kader]);
  }
}
