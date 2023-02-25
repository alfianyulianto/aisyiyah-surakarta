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
    $user = User::where('kategori_user_id', 1)->where('admin_at', null)->get();
    foreach ($user as $u) {
      if (Kader::where('nik', $u->kader_nik)->where('cabang_id_cabang', $id)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('cabang_id_cabang', $id)->first());
      }
    }
    return view('admin.tambah_admin.tambah_admin_cabang.create', [
      'title' => 'Tambah Admin',
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

    return redirect('/admin/cabang/' . $id)->with('message_admin_cabang', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin di ' . $request->cabang . '.');
  }

  public function show(Kader $kader, $id)
  {
    // cek apakah kader seorang admin 
    if (!User::where('kader_nik', $kader->nik)->where('admin_at', $id)->first()) {
      return abort(404);
    }

    return view('admin.tambah_admin.tambah_admin_cabang.show', [
      'title' => 'Profil Admin',
      'kader' => $kader,
      'id_cabang' => $id,
      'nama_cabang' => Cabang::where('id_cabang', $id)->first()->nama_cabang
    ]);
  }

  public function destroy(Request $request, Kader $kader, $id)
  {
    // update data user
    User::where('kader_nik', $kader->nik)->update(['kategori_user_id' => 1, 'admin_at' => null]);

    return redirect('/admin/cabang/' . $id)->with('message_delete_admin_cabang', 'Berhasil menghapus ' . $kader->nama . ' sebagai admin di ' . $request->cabang . '.');
  }
}
