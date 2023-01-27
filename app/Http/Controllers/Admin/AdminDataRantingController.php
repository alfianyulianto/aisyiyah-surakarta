<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
      'ranting' => Ranting::orderBy('cabang_id_cabang',  'asc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.ranting.create', [
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get()
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
      'id_ranting' => ['required', 'min:10', 'max:10'],
      'cabang_id_cabang' => ['required'],
      'nama_ranting' => ['required', 'min:5'],
      'alamat_ranting' => ['required', 'min:10'],
      'sk_pimp_ranting' => ['required', 'mimes:pdf'],
    ]);

    $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;

    // simpan file yang diupload
    $file = $request->file('sk_pimp_ranting');
    $validated['sk_pimp_ranting'] = $file->storeAs('sk pimpinan ranting',  'sk-pimpinan-ranting_' . $request->nama_daerah . '_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());

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
  public function edit(Ranting $ranting)
  {
    return view('admin.ranting.edit', [
      'cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'ranting' => $ranting,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Ranting $ranting)
  {
    $role = [
      'id_ranting' => ['required', 'min:10', 'max:10'],
      'nama_ranting' => ['required', 'min:5'],
      'alamat_ranting' => ['required', 'min:10'],
      'sk_pimp_ranting' => ['mimes:pdf']
    ];

    // cek apakah $request->id_ranting sama dengan id_ranting pada tabel ranting
    if ($request->id_ranting != $ranting->id_ranting) {
      $role['id_ranting'] = ['required', 'min:10', 'max:10', 'unique:App\Models\Ranting,id_ranting'];
    }

    // cek jika user mengganti nama ranting
    if ($request->nama_ranting != $ranting->nama_ranting) {
      $role['sk_pimp_ranting'] = ['required', 'mimes:pdf'];
    }

    // cek validasi
    $validated = $request->validate($role);

    // cek jika user mengupload ulang sk_pimp_ranting
    if ($request->sk_pimp_ranting) {
      // simpan file yang diupload
      $file = $request->file('sk_pimp_ranting');
      // hapus file sk_pimp_ranting dari tabel ranting
      Storage::delete($ranting->sk_pimp_ranting);
      $validated['sk_pimp_ranting'] = $file->storeAs('sk pimpinan ranting',  'sk-pimpinan-ranting_' . $request->nama_ranting . '_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());
    }

    // update data ke tabel ranting
    $ranting->update($validated);

    return redirect('/data/ranting')->with('message_ranting', 'Data ranting ' . $request->nama_ranting . ' berhasil diubah.');
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
  public function download(Ranting $ranting)
  {
    return Storage::download($ranting->sk_pimp_ranting);
  }
}
