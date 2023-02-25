<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\KaderJabatan;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataPeriodeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return redirect('/settings');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.settings.periode.create', [
      'title' => 'Create Periode',
      'last_periode' => Periode::orderBy('periode', 'asc')->get()->last()
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
      'id_periode' => ['required', 'unique:App\Models\Periode,id_periode'],
      'periode' => ['required', 'min:5', 'string', 'unique:App\Models\Periode,periode'],
    ]);

    // insert ke tabel periode
    Periode::create($validated);

    return redirect('/settings')->with('message_periode', 'Data periode ' . $validated['periode'] . ' berhasil di tambahkan.');
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
  public function edit(Periode $periode)
  {
    return view('admin.settings.periode.edit', [
      'title' => 'Edit Periode',
      'periode' => $periode,
      'last_periode' => Periode::orderBy('periode', 'asc')->get()->last()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Periode $periode)
  {
    $role = [
      'id_periode' => ['required', 'string'],
      'periode' => ['required', 'min:5', 'string'],
    ];

    // cek jika user tidak mengganti id_periode, periode
    if ($periode->id_periode != $request->id_periode) {
      $role['id_periode'] = ['required', 'unique:App\Models\Periode,id_periode'];
    } elseif ($periode->periode != $request->periode) {
      $role['periode'] = ['required', 'min:5', 'string', 'unique:App\Models\Periode,periode'];
    }

    $validated = $request->validate($role);

    // insert ke tabel periode
    $periode->update($validated);

    return redirect('/settings')->with('message_periode', 'Data periode ' . $validated['periode'] . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Periode $periode)
  {
    // ambil tempat_lahir
    $p = $periode->periode;

    // delete data di tabel kader_jabatan
    KaderJabatan::where('periode_id_periode', $periode->id_periode)->delete();

    // delete data di tabel pekerjaan
    $periode->delete();

    return redirect('/settings')->with('message_delete_periode', 'Data periode ' . $p . ' berhasil dihapus!');
  }
}
