<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Http\Request;

class TambahAdminRantingController extends Controller
{
  public function create($id)
  {
    $kader = collect([]);
    $kader_ranting = Kader::where('ranting_id_ranting', $id)->get();
    foreach ($kader_ranting as $kr) {
      $kader->push(User::where('kader_nik', $kr->nik)->where('admin_at', null)->get());
    }
    return view('admin.tambah_admin.tambah_admin_ranting.create', [
      'kader' => $kader,
      'nama_ranting' => Ranting::where('id_ranting', $id)->first()->nama_ranting,
      'id_ranting' => $id,
      'admin' => User::where('admin_at', $id)->get()
    ]);
  }

  public function store(Request $request, $id)
  {
    $validated = $request->validate([
      'kader' => ['required'],
      'nik' => ['required'],
      'no_kta' => ['required'],
      'no_ktm' => ['required'],
      'nama' => ['required', 'string'],
    ]);

    // update data user di tabel user
    User::where('kader_nik', $request->nik)->update(['admin_at' => $id]);

    return redirect('/tambah/admin')->with('message_admin_ranting', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin ranting.');
  }

  public function show(Kader $kader)
  {
    return view('admin.tambah_admin.tambah_admin_ranting.show', [
      'kader' => $kader
    ]);
  }
}
