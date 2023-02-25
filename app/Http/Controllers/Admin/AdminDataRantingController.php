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

class AdminDataRantingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // cek jika user seorang admin ranting
    if (Auth::user()->kategori_user_id == 4) {
      return view('admin.ranting.tampilan_admin_ranting', [
        'title' => 'Data Ranting',
        'ranting' => Ranting::where('id_ranting', Auth::user()->kategori_user_id)->get(),
        'nama_ranting' => Ranting::where('id_ranting', Auth::user()->kategori_user_id)->first()->nama_ranting
      ]);
    }
    return view('admin.ranting.index', [
      'title' => 'Data Ranting',
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
    // cek jika user seorang admin ranting
    if (Auth::user()->kategori_user_id == 5) {
      return abort(404);
    }

    return view('admin.ranting.create', [
      'title' => 'Create Data Ranting',
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
    // cek jika user seorang admin ranting
    if (Auth::user()->kategori_user_id == 5) {
      return abort(404);
    }
    $validated = $request->validate([
      'id_ranting' => ['required'],
      'cabang_id_cabang' => ['required'],
      'nama_ranting' => ['required', 'min:5'],
      'alamat_ranting' => ['required', 'min:10'],
    ]);

    $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;

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
  public function show(Ranting $ranting)
  {
    return view('admin.ranting.upload_sk_pimpinan', [
      'title' => 'Data Ranting',
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'sk_pimpinan' => SkPimpinan::where('daerah_id_daerah', null)->where('cabang_id_cabang', null)->where('ranting_id_ranting', $ranting->id_ranting)->orderBy('id_sk_pimpinan', 'desc')->paginate(5),
      'id_ranting' => $ranting->id_ranting,
      'nama_ranting' => $ranting->nama_ranting
    ]);
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
      'title' => 'Edit Data Ranting',
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
      'id_ranting' => ['required'],
      'nama_ranting' => ['required', 'min:5'],
      'alamat_ranting' => ['required', 'min:10'],
    ];

    // cek apakah $request->id_ranting sama dengan id_ranting pada tabel ranting
    if ($request->id_ranting != $ranting->id_ranting) {
      $role['id_ranting'] = ['required', 'unique:App\Models\Ranting,id_ranting'];
    }

    // cek validasi
    $validated = $request->validate($role);

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
  public function destroy(Ranting $ranting)
  {
    // cek jika user seorang admin ranting
    if (Auth::user()->kategori_user_id == 5) {
      return abort(404);
    }

    // update data di tabel kader
    Kader::where('ranting_id_ranting', $ranting->id_ranting)->update(['ranting_id_ranting' => null]);

    // delete jabatan di ranting dan kader_jabatan di ranting 
    Jabatan::where('ranting_id_ranting', $ranting->id_ranting)->delete();
    KaderJabatan::where('jabatan_at', $ranting->id_ranting)->delete();

    // delete data di tabel ranting
    $ranting->delete();

    return redirect('/data/ranting')->with('message_delete_ranting', 'Data ranting ' . $ranting->nama_ranting . ' berhasil dihapus.');
  }

  public function upload_sk_pimpinan(Request $request, Ranting $ranting)
  {
    $validated = $request->validate([
      'periode' => ['required'],
      'sk_pimp_ranting' => ['required', 'mimes:pdf']
    ]);

    // ambil data dari tabel sk_pimpinan
    $sk_pimpinan = SkPimpinan::where('ranting_id_ranting', $ranting->id_ranting)->where('periode_id_periode', $request->periode)->first();
    if ($sk_pimpinan) {
      // hapus file sk_pimp_ranting dari tabel ranting
      Storage::delete($sk_pimpinan->file_sk_pimpinan);
      // hapus data di tabel sk_pimpinan
      $sk_pimpinan->delete();
    }

    // buat data untuk di insert ke tabel
    $validatedData = [
      'id_sk_pimpinan' => 'sk-' . Str::lower(Str::random(8)),
      'ranting_id_ranting' => $ranting->id_ranting,
      'periode_id_periode' => $request->periode,
    ];

    // ambil data periode
    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    $file = $request->file('sk_pimp_ranting');
    // simpan file yang diupload
    $validatedData['file_sk_pimpinan'] = $file->storeAs('sk pimpinan ranting',  'sk-pimpinan-ranting_' . $ranting->nama_ranting . '_' . 'periode_' . $periode . '_tgl_upload_' . date('d-m-Y') . '.' . $file->getClientOriginalExtension());

    // insert data ke tabel ranting
    SkPimpinan::create($validatedData);

    return redirect('/data/ranting/' . $ranting->id_ranting)->with('message_sk_pimp_ranting', 'Berhasil mengupload sk pimpinan ranting periode ' . $periode . '.');
  }

  public function download(SkPimpinan $SkPimpinan)
  {
    // jika bukan super admin atau admin ranting
    if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3 || Auth::user()->admin_at == $SkPimpinan->ranting_id_ranting) {
      return Storage::download($SkPimpinan->file_sk_pimpinan);
    }
    return abort(403);
  }
}
