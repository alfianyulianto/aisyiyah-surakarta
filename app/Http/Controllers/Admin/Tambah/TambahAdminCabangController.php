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
    $user = User::where('kategori_user_id', null)->where('admin_at', null)->get();
    foreach ($user as $u) {
      $kader->push(Kader::where('nik', $u->kader_nik)->first());
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
    User::where('kader_nik', $request->nik)->update(['kategori_user_id' => 4, 'admin_at' => $id]);

    return redirect('/tambah/admin')->with('message_admin_cabang', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin di ' . $request->cabang . '.');
  }

  public function show(Kader $kader)
  {
    return view('admin.tambah_admin.tambah_admin_cabang.show', [
      'kader' => $kader
    ]);
  }

  public function destroy(Request $request, Kader $kader)
  {
    // update data user
    User::where('kader_nik', $kader->nik)->update(['kategori_user_id' => null, 'admin_at' => null]);

    return redirect('/tambah/admin')->with('message_admin_cabang', 'Berhasil menghapus ' . $kader->nama . ' sebagai admin di ' . $request->cabang . '.');
  }
}
