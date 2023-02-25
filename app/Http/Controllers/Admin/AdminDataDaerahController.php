<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Periode;
use App\Models\SkPimpinan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      'title' => 'Data Daerah',
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
      'title' => 'Data Daerah',
      'periode' => Periode::orderBy('periode', 'desc')->get(),
      'sk_pimpinan' => SkPimpinan::where('daerah_id_daerah', $id)->where('cabang_id_cabang', null)->where('ranting_id_ranting', null)->orderBy('id_sk_pimpinan', 'desc')->paginate(5),
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
      'title' => 'Edit Data Daerah',
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
    ];

    // cek apakah $request->id_daerah sama dengan id_daerah pada tabel daerah
    if ($request->id_daerah != $daerah->id_daerah) {
      $role['id_daerah'] = ['required', 'unique:App\Models\Daerah,id_daerah'];
    }

    // cek validasi
    $validated = $request->validate($role);

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

    // ambil data dari tabel sk_pimpinan
    $sk_pimpinan = SkPimpinan::where('daerah_id_daerah', $daerah->id_daerah)->where('periode_id_periode', $request->periode)->first();
    if ($sk_pimpinan) {
      // hapus file sk_pimp_daerah dari tabel daerah
      Storage::delete($sk_pimpinan->file_sk_pimpinan);
      // hapus data di tabel sk_pimpinan
      $sk_pimpinan->delete();
    }

    // buat data untuk di insert ke tabel
    $validatedData = [
      'id_sk_pimpinan' => 'sk-' .  Str::lower(Str::random(8)),
      'daerah_id_daerah' => $daerah->id_daerah,
      'periode_id_periode' => $request->periode,
    ];

    // ambil data periode
    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    $file = $request->file('sk_pimp_daerah');
    // simpan file yang diupload
    $validatedData['file_sk_pimpinan'] = $file->storeAs('sk pimpinan daerah',  'sk-pimpinan-daerah_' . $daerah->nama_daerah . '_' . 'periode_' . $periode . '_tgl_upload_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());

    // insert data ke tabel daerah
    SkPimpinan::create($validatedData);

    return redirect('/data/daerah/' . $daerah->id_daerah)->with('message_sk_pimp_daerah', 'Berhasil mengupload sk pimpinan daerah periode ' . $periode . '.');
  }

  public function download(SkPimpinan $SkPimpinan)
  {
    // jika bukan super admin atau admin daerah
    if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3 || Auth::user()->admin_at == $SkPimpinan->cabang_id_cabang) {
      return Storage::download($SkPimpinan->file_sk_pimpinan);
    }
    return abort(403);
  }
}
