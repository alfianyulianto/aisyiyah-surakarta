<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Jabatan;
use App\Models\KaderJabatan;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDataJabatanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // cek user apakah seorang super admin atau admin-daerah
    if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3) {
      $jabatan = Jabatan::where('daerah_id_daerah', Daerah::get()->first()->id_daerah)->where('cabang_id_cabang', null)->where('ranting_id_ranting', null)->orderBy('created_at', 'asc')->get();
    } elseif (Auth::user()->kategori_user_id == 4) { // jika user seorang admin cabang
      $jabatan = Jabatan::where('daerah_id_daerah', Daerah::get()->first()->id_daerah)->where('cabang_id_cabang', Auth::user()->admin_at)->where('ranting_id_ranting', null)->orderBy('created_at', 'asc')->get();
    } elseif (Auth::user()->kategori_user_id == 5) { // jika user seorag admin ranting
      $jabatan = Jabatan::where('daerah_id_daerah', Daerah::get()->first()->id_daerah)->where('cabang_id_cabang', Ranting::where('id_ranting', Auth::user()->admin_at)->first()->cabang_id_cabang)->where('ranting_id_ranting', Auth::user()->admin_at)->orderBy('created_at', 'asc')->get();
    };
    // $jabatan = Jabatan::orderBy('created_at', 'asc')->get();
    return view('admin.jabatan.index', [
      'title' => 'Data Jabatan',
      'nama_jabatan' => $jabatan
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.jabatan.create', [
      'title' => 'Create Data Jabatan',
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
      'id_jabatan' => ['required', 'unique:App\Models\Jabatan,id_jabatan'],
      'nama_jabatan' => ['required', 'string', 'min:5', 'unique:App\Models\Jabatan,nama_jabatan'],
      'multiple_kader' => ['required'],
    ]);

    // cek user apakah seorang super admin atau admin-daerah
    if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3) {
      $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;
    } else if (Auth::user()->kategori_user_id == 4) { // jika user seorang admin cabang
      $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;
      $validated['cabang_id_cabang'] = Auth::user()->admin_at;
    } else if (Auth::user()->kategori_user_id == 5) { // jika user seorag admin ranting
      $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;
      $validated['cabang_id_cabang'] = Ranting::where('id_ranting', Auth::user()->admin_at)->first()->cabang_id_cabang;
      $validated['ranting_id_ranting'] = Auth::user()->admin_at;
    }

    $validated['multiple_kader'] = $request->multiple_kader == 'true' ? true : false;
    // insert ke tabel jabatan
    Jabatan::create($validated);

    return redirect('/data/jabatan')->with('message_jabatan', 'Data jabatan ' . $request->nama_jabatan . ' berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    abort(403);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Jabatan $jabatan)
  {
    return view('admin.jabatan.edit', [
      'title' => 'Edit Data Jabatan',
      'jabatan' => $jabatan
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Jabatan $jabatan)
  {
    $role = [
      'id_jabatan' => ['required'],
      'nama_jabatan' => ['required', 'string', 'min:5'],
      'multiple_kader' => ['required'],
    ];

    // cek jika user tidak mengganti id_jabatan, nama jabatan
    if ($request->id_jabatan != $jabatan->id_jabatan) {
      $role['id_jabatan'] = ['required', 'unique:App\Models\Jabatan,id_jabatan'];
    } elseif ($request->nama_jabatan != $jabatan->nama_jabatan) {
      $role['nama_jabatan'] = ['required', 'string', 'min:5', 'unique:App\Models\Jabatan,nama_jabatan'];
    }

    $validated = $request->validate($role);

    $validated['multiple_kader'] = $request->multiple_kader == 'true' ? true : false;

    // update data ke tabel jabatan
    $jabatan->update($validated);

    return redirect('/data/jabatan')->with('message_jabatan', 'Data jabatan ' . $request->nama_jabatan . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jabatan $jabatan)
  {

    // delete data di tabel kader_jabatan
    KaderJabatan::where('jabatan_id_jabatan', $jabatan->id_jabatan)->delete();

    // delete data tabel jabatan 
    $jabatan->delete();

    return redirect('/data/jabatan')->with('message_jabatan', 'Data jabatan ' . $jabatan->nama_jabatan . ' berhasil dihapus.');
  }
}
