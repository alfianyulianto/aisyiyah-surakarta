<?php

namespace App\Http\Controllers\Admin\Uraian;

use App\Http\Controllers\Controller;
use App\Models\KaderOrtom;
use App\Models\Ortom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrtomAdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.uraian_ortom.index', [
      'ortom' => KaderOrtom::where('kader_nik', Auth::user()->kader_nik)->orderBy('created_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.uraian_ortom.create', [
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
      'id_kader_has_ortom' => ['required', 'max:11', 'min:11'],
      'ortom_id_ortom' => ['required'],
      'ortom_uraian' => ['required', 'min:5'],
    ]);
    // tambah nik user
    $validated['kader_nik'] = Auth::user()->kader_nik;

    // insert ke tabel kader_has_ortom
    KaderOrtom::create($validated);

    // select tabel ortom
    $nama_ortom = Ortom::where('id_ortom', $request->ortom_id_ortom)->first()->nama_ortom;

    return redirect('/admin/ortom')->with('message_ortom_admin', 'Data ortom ' . $nama_ortom . ' berhasil ditambahkan.');
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
    return view('admin.uraian_ortom.edit', [
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

    return redirect('/admin/ortom')->with('message_ortom_admin', 'Data ortom ' . $nama_ortom . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // ambil data di tabel kader_has_ortom
    $kader_has_ortom = KaderOrtom::where('id_kader_has_ortom', $id)->first();

    // ambil data di tabel ortom
    $nama_ortom = Ortom::where('id_ortom', $kader_has_ortom->ortom_id_ortom)->first()->nama_ortom;

    // hapus data di tabel kader_has_ortom
    $kader_has_ortom->delete();

    return redirect('/admin/ortom')->with('message_delete_ortom_admin', 'Data ortom ' . $nama_ortom . ' berhasil dihapus.');
  }
}
