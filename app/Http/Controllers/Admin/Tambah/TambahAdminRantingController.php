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
    $user = User::where('kategori_user_id', 1)->where('admin_at', null)->get();
    foreach ($user as $u) {
      if (Kader::where('nik', $u->kader_nik)->where('ranting_id_ranting', $id)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('ranting_id_ranting', $id)->first());
      }
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
    User::where('kader_nik', $request->nik)->update(['kategori_user_id' => 5, 'admin_at' => $id]);

    return redirect('/admin/ranting/' . $id)->with('message_admin_ranting', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin di ' . $request->ranting . '.');
  }

  public function show(Kader $kader, $id)
  {
    // cek apakah kader seorang admin 
    if (!User::where('kader_nik', $kader->nik)->where('admin_at', $id)->first()) {
      return abort(404);
    }

    return view('admin.tambah_admin.tambah_admin_ranting.show', [
      'kader' => $kader,
      'id_ranting' => $id,
      'nama_ranting' => Ranting::where('id_ranting', $id)->first()->nama_ranting
    ]);
  }

  public function destroy(Request $request, Kader $kader, $id)
  {
    // update data user
    User::where('kader_nik', $kader->nik)->update(['kategori_user_id' => 1, 'admin_at' => null]);

    return redirect('/admin/ranting/' . $id)->with('message_delete_admin_ranting', 'Berhasil menghapus ' . $kader->nama . ' sebagai admin di ' . $request->ranting . '.');
  }
}
