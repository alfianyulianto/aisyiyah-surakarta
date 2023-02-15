<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Jabatan;
use App\Models\Kader;
use App\Models\KaderJabatan;
use App\Models\Periode;
use App\Models\Ranting;
use App\Models\SkPimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    // cek jika user seorang admin cabang
    if (Auth::user()->kategori_user_id == 4) {
      return view('admin.cabang.tampilan_admin_cabang', [
        'cabang' => Cabang::where('id_cabang', Auth::user()->kategori_user_id)->get(),
        'nama_cabang' => Cabang::where('id_cabang', Auth::user()->kategori_user_id)->first()->nama_cabang
      ]);
    }
    return view('admin.cabang.index', [
      'cabang' => Cabang::orderBy('created_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // cek jika user seorang admin cabang
    if (Auth::user()->kategori_user_id == 4) {
      return abort(404);
    }
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
    // cek jika user seorang admin cabang
    if (Auth::user()->kategori_user_id == 4) {
      return abort(404);
    }

    $validated = $request->validate([
      'id_cabang' => ['required', 'min:9', 'max:9', 'unique:App\Models\Cabang,id_cabang'],
      'nama_cabang' => ['required', 'min:5'],
      'alamat_cabang' => ['required', 'min:10'],
    ]);

    $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;

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
  public function show(Cabang $cabang)
  {
    return view('admin.cabang.upload_sk_pimpinan', [
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'sk_pimpinan' => SkPimpinan::where('daerah_id_daerah', null)->where('cabang_id_cabang', $cabang->id_cabang)->where('ranting_id_ranting', null)->orderBy('periode_id_periode', 'asc')->get(),
      'id_cabang' => $cabang->id_cabang,
      'nama_cabang' => $cabang->nama_cabang
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Cabang $cabang)
  {
    return view('admin.cabang.edit', [
      'cabang' => $cabang
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Cabang $cabang)
  {
    $role = [
      'id_cabang' => ['required', 'min:9', 'max:9'],
      'nama_cabang' => ['required', 'min:5'],
      'alamat_cabang' => ['required', 'min:10'],
    ];

    // cek apakah $request->id_cabang sama dengan id_cabang pada tabel cabang
    if ($request->id_cabang != $cabang->id_cabang) {
      $role['id_cabang'] = ['required', 'min:9', 'max:9', 'unique:App\Models\Cabang,id_cabang'];
    }

    // cek jika user mengganti nama cabang
    if ($request->nama_cabang != $cabang->nama_cabang) {
      $role['sk_pimp_cabang'] = ['required', 'mimes:pdf'];
    }

    // cek validasi
    $validated = $request->validate($role);

    // update data ke tabel cabang
    $cabang->update($validated);

    return redirect('/data/cabang')->with('message_cabang', 'Data cabang ' . $request->nama_cabang . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cabang $cabang)
  {
    // cek jika user seorang admin cabang
    if (Auth::user()->kategori_user_id == 4) {
      return abort(404);
    }

    // delete data di tabel ranting
    Ranting::where('cabang_id_cabang', $cabang->id_cabang)->delete();

    // update data di tabel kader
    Kader::where('cabang_id_cabang', $cabang->id_cabang)->update(['cabang_id_cabang' => null, 'ranting_id_ranting' => null]);

    // delete jabatan di cabang, kader_jabatan di cabang dan kader_jabatan di ranting cabang
    Jabatan::where('cabang_id_cabang', $cabang->id_cabang)->delete();
    KaderJabatan::where('jabatan_at', $cabang->id_cabang)->delete();
    $ranting = Ranting::where('cabang_id_cabang', $cabang->id_cabang)->get();
    foreach ($ranting as $r) {
      KaderJabatan::where('jabatan_at', $r->id_ranting)->delete();
    }

    // delete data di tabel cabang
    $cabang->delete();
    return redirect('/data/cabang')->with('message_delete_cabang', 'Data cabang ' . $cabang->nama_cabang . ' berhasil dihapus.');
  }

  public function upload_sk_pimpinan(Request $request, Cabang $cabang)
  {
    $validated = $request->validate([
      'periode' => ['required'],
      'sk_pimp_cabang' => ['required', 'mimes:pdf']
    ]);

    // ambil data dari tabel sk_pimpinan
    $sk_pimpinan = SkPimpinan::where('cabang_id_cabang', $cabang->id_cabang)->where('periode_id_periode', $request->periode)->first();
    if ($sk_pimpinan) {
      // hapus file sk_pimp_cabang dari tabel cabang
      Storage::delete($sk_pimpinan->file_sk_pimpinan);
      // hapus data di tabel sk_pimpinan
      $sk_pimpinan->delete();
    }

    // buat data untuk di insert ke tabel
    $validatedData = [
      'id_sk_pimpinan' => 'sk-' . Str::random(4),
      'cabang_id_cabang' => $cabang->id_cabang,
      'periode_id_periode' => $request->periode,
    ];

    // ambil data periode
    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    $file = $request->file('sk_pimp_cabang');
    // simpan file yang diupload
    $validatedData['file_sk_pimpinan'] = $file->storeAs('sk pimpinan cabang',  'sk-pimpinan-cabang_' . $cabang->nama_cabang . '_' . 'periode_' . $periode . '_tgl_upload_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());

    // insert data ke tabel cabang
    SkPimpinan::create($validatedData);

    return redirect('/data/cabang/' . $cabang->id_cabang)->with('message_sk_pimp_cabang', 'Berhasil mengupload sk pimpinan cabang periode ' . $periode . '.');
  }

  public function download(SkPimpinan $SkPimpinan)
  {
    // jika bukan super admin atau admin cabang
    if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3 || Auth::user()->admin_at == $SkPimpinan->cabang_id_cabang) {
      return Storage::download($SkPimpinan->file_sk_pimpinan);
    }
    return abort(403);
  }
}
