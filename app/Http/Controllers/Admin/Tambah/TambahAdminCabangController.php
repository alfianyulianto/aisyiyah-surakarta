<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Kader;
use App\Models\User;
use Illuminate\Http\Request;

class TambahAdminCabangController extends Controller
{
  public function create($id)
  {
    $kader = collect([]);
    $user = User::where('admin_at', null)->get();
    foreach ($user as $u) {
      $kader->push(Kader::where('nik', $u->kader_nik)->where('cabang_id_cabang', $id)->first());
    }
    return view('admin.tambah_admin.tambah_admin_cabang.create', [
      'kader' => $kader,
      'nama_cabang' => Cabang::where('id_cabang', $id)->first()->nama_cabang,
      'id_cabang' => $id,
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

    return redirect('/tambah/admin')->with('message_admin_cabang', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin cabang.');
  }

  public function show(Kader $kader)
  {
    return view('admin.tambah_admin.tambah_admin_cabang.show', [
      'kader' => $kader
    ]);
  }
}
