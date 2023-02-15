<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Periode;
use App\Models\SkPimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDataDaerahController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.daerah.index', [
      'daerah' => Daerah::get()->first()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    abort(404);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    abort(404);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return view('admin.daerah.upload_sk_pimpinan', [
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'sk_pimpinan' => SkPimpinan::where('daerah_id_daerah', $id)->where('cabang_id_cabang', null)->where('ranting_id_ranting', null)->orderBy('periode_id_periode', 'asc')->get(),
      'id_daerah' => $id
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Daerah $daerah)
  {
    return view('admin.daerah.edit', [
      'daerah' => $daerah
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Daerah $daerah)
  {
    $role = [
      'id_daerah' => ['required'],
      'nama_daerah' => ['required', 'min:5'],
      'alamat_daerah' => ['required', 'min:10'],
      'sk_pimp_daerah' => ['mimes:pdf']
    ];

    // cek apakah $request->id_daerah sama dengan id_daerah pada tabel daerah
    if ($request->id_daerah != $daerah->id_daerah) {
      $role['id_daerah'] = ['required', 'unique:App\Models\Daerah,id_daerah'];
    }

    // cek jika user mengganti nama daerah
    if ($request->nama_daerah != $daerah->nama_daerah) {
      $role['sk_pimp_daerah'] = ['required', 'mimes:pdf'];
    }

    // cek validasi
    $validated = $request->validate($role);

    // cek jika user mengupload ulang sk_pimp_daerah
    if ($request->sk_pimp_daerah) {
      // simpan file yang diupload
      $file = $request->file('sk_pimp_daerah');
      // hapus file sk_pimp_daerah dari tabel daerah
      Storage::delete($daerah->sk_pimp_daerah);
      $validated['sk_pimp_daerah'] = $file->storeAs('sk pimpinan daerah',  'sk-pimpinan-daerah_' . $request->nama_daerah . '_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());
    }

    // update data ke tabel daerah
    $daerah->update($validated);

    return redirect('/data/daerah')->with('message_daerah', 'Data daerah ' . $request->nama_daerah . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    abort(404);
  }

  public function upload_sk_pimpinan(Request $request, Daerah $daerah)
  {
    $validated = $request->validate([
      'periode' => ['required'],
      'sk_pimp_daerah' => ['required', 'mimes:pdf']
    ]);

    // cek jika user mengupload ulang sk_pimp_daerah
    if ($request->sk_pimp_daerah) {
      // simpan file yang diupload
      $file = $request->file('sk_pimp_daerah');
      // hapus file sk_pimp_daerah dari tabel daerah
      Storage::delete($daerah->sk_pimp_daerah);
      $validated['sk_pimp_daerah'] = $file->storeAs('sk pimpinan daerah',  'sk-pimpinan-daerah_' . $request->nama_daerah . '_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());
    }

    $validated['daerah_id_daerah'] = $daerah->id_daerah;

    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    // update data ke tabel daerah
    $daerah->update($validated);

    return redirect('/data/daerah')->with('message_daerah', 'Berhasil mengupload sk pimpinan daerah periode ' . $periode . '.');
  }

  public function download(Daerah $daerah)
  {
    return Storage::download($daerah->sk_pimp_daerah);
  }
}
