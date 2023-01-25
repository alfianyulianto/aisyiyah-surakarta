<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\User;
use Illuminate\Http\Request;

class TambahAdminDaerahController extends Controller
{
  public function create($id)
  {
    $kader = collect([]);
    $user = User::where('kategori_user_id', null)->where('admin_at', null)->get();
    foreach ($user as $u) {
      $kader->push(Kader::where('nik', $u->kader_nik)->first());
    }
    return view('admin.tambah_admin.tambah_admin_daerah.create', [
      'kader' => $kader,
      'nama_daerah' => Daerah::get()->first()->nama_daerah,
      'id_daerah' => $id,
      'admin' => User::where('kategori_user_id', 3)->where('admin_at', $id)->get()
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
    User::where('kader_nik', $request->nik)->update(['kategori_user_id' => 3, 'admin_at' => $id]);

    return redirect('/tambah/admin')->with('message_admin_daerah', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin daerah.');
  }

  public function show(Kader $kader)
  {
    return view('admin.tambah_admin.tambah_admin_daerah.show', [
      'kader' => $kader
    ]);
  }

  public function destroy(Kader $kader)
  {
    // update data user
    User::where('kader_nik', $kader->nik)->update(['kategori_user_id' => null, 'admin_at' => null]);

    return redirect('/tambah/admin')->with('message_admin_daerah', 'Berhasil menghapus ' . $kader->nama . ' sebagai admin daerah.');
  }
}
