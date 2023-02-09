<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataPekerjaanController extends Controller
{
  public function __construct()
  {
    // cek jika user bukan super admin
    if (Auth::user()->kategori_user_id != 2) {
      return abort(404);
    }
  }
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
    return view('admin.settings.pekerjaan.create');
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
      'id_pekerjaan' => ['required', 'min:10', 'max:10', 'unique:App\Models\Pekerjaan,id_pekerjaan'],
      'pekerjaan' => ['required', 'min:5', 'string', 'unique:App\Models\Pekerjaan,pekerjaan'],
    ]);

    // ambil pekerjaan dari form input dan ubah kata awal menjadi huruf kapital
    $pekerjaan = $request->pekerjaan;
    $lower_pekerjaan = Str::lower($pekerjaan);
    $validated['pekerjaan'] = ucwords($lower_pekerjaan);

    // insert ke tabel pekerjaan
    Pekerjaan::create($validated);

    return redirect('/settings')->with('message_pekerjaan', 'Data pekerjaan ' .  $validated['pekerjaan'] . ' berhasil di tambahkan.');
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
  public function edit(Pekerjaan $pekerjaan)
  {
    return view('admin.settings.pekerjaan.edit', [
      'pekerjaan' => $pekerjaan
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pekerjaan $pekerjaan)
  {
    $role = [
      'id_pekerjaan' => ['required', 'min:10', 'max:10'],
      'pekerjaan' => ['required', 'min:5', 'string'],
    ];

    // ambil pekerjaan dari form input dan ubah kata awal menjadi huruf kapital
    $nama_pekerjaan = $request->pekerjaan;
    $lower_pekerjaan = Str::lower($nama_pekerjaan);
    $validated['pekerjaan'] = ucwords($lower_pekerjaan);

    // cek jika user tidak mengganti id_pekerjaan, pekerjaan
    if ($pekerjaan->id_pekerjaan != $request->id_pekerjaan) {
      $role['id_pekerjaan'] = ['required', 'min:9', 'max:9', 'unique:App\Models\Pekerjaan,id_pekerjaan'];
    } elseif ($pekerjaan->pekerjaan != $validated['pekerjaan']) {
      $role['pekerjaan'] = ['required', 'min:5', 'string', 'unique:App\Models\Pekerjaan,pekerjaan'];
    }

    $validated = $request->validate($role);

    // update ke tabel pekerjaan
    $validatedData = [
      'id_pekerjaan' => $request->id_pekerjaan,
      'pekerjaan' => $validated['pekerjaan'] = ucwords($lower_pekerjaan)
    ];
    $pekerjaan->update($validatedData);

    return redirect('/settings')->with('message_pekerjaan', 'Data pekerjaan ' .  $validatedData['pekerjaan'] . ' berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pekerjaan $pekerjaan)
  {
    // ambil nama pekerjaan
    $nama_pekerjaan = $pekerjaan->pekerjaan;

    // delete data di tabel pekerjaan
    $pekerjaan->delete();

    return redirect('/settings')->with('message_delete_pekerjaan', 'Data pekerjaan ' . $nama_pekerjaan . ' berhasil dihapus!');
  }
}
