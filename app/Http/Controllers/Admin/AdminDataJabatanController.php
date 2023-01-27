<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Jabatan;
use App\Models\KaderJabatan;
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
    // // cek user apakah seorang super admin atau admin-daerah
    // if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3) {
    //   $jabatan = Jabatan::where('daerah_id_daerah', Daerah::get()->first()->id_daerah)->orderBy('created_at', 'asc')->get()
    // } else if (Auth::user()->ketegori_user_id == 4) { // jika user seorang admin cabang
    //   $jabatan = Jabatan::where('cabang_id_cabang', Auth::user()->admin_at)->orderBy('created_at', 'asc')->get()
    // } else if (Auth::user()->ketegoori_user_id == 5) { // jika user seorag admin ranting
    //   $jabatan = Jabatan::where('ranting_id_ranting', Auth::user()->admin_at)->orderBy('created_at', 'asc')->get()
    // }
    $jabatan = Jabatan::orderBy('created_at', 'asc')->get();
    return view('admin.jabatan.index', [
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
    return view('admin.jabatan.create');
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
      'id_jabatan' => ['required', 'min:9', 'max:9', 'unique:App\Models\Jabatan,id_jabatan'],
      'nama_jabatan' => ['required', 'string', 'min:5'],
    ]);

    // // cek user apakah seorang super admin atau admin-daerah
    // if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3) {
    $validated['daerah_id_daerah'] = Daerah::get()->first()->id_daerah;
    // } else if (Auth::user()->ketegori_user_id == 4) { // jika user seorang admin cabang
    //   $validated['cabang_id_cabang'] = Auth::user()->admin_at;
    // } else if (Auth::user()->ketegoori_user_id == 5) { // jika user seorag admin ranting
    //   $validated['ranting_id_ranting'] = Auth::user()->admin_at;
    // }

    // insert ke tabel jabatan
    Jabatan::create($validated);

    return redirect('/data/jabatan')->with('message_jabatan', 'Data jabatan ' . $request->naam_jabatan . ' berhasil ditambahkan.');
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
      'id_jabatan' => ['required', 'min:9', 'max:9'],
      'nama_jabatan' => ['required', 'string', 'min:5'],
    ];

    // cek apakah $request->id_jabatan sama dengan id_jabatan pada tabel jabatan
    if ($request->id_jabatan == $jabatan->id_jaabtan) {
      $role['id_jabatan'] = ['required', 'min:9', 'max:9', 'unique:App\Models\Jabatan,id_jabatan'];
    }

    $validated = $request->validate($role);

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
    // delete data tabel jabatan 
    $jabatan->delete();

    // delete data di tabel kader_jabatan
    KaderJabatan::where('jabatan_id_jabatan', $jabatan->id_jabatan)->delete();

    return redirect('/data/jabatan')->with('message_jabatan', 'Data jabatan ' . $jabatan->nama_jabatan . ' berhasil dihapus.');
  }
}
