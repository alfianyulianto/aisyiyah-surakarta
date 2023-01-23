<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use App\Models\User;
use Illuminate\Http\Request;

class TambahAdminDaerahController extends Controller
{
  public function create($id)
  {
    return view('admin.tambah_admin.tambah_admin_daerah.create', [
      'kader' => Kader::all(),
      'id_daerah' => $id,
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

    return redirect('/tambah/admin')->with('message_admin_daerah', 'Berhasil menabahkan ' . $request->nama . ' sebagai admin daerah.');
  }

  public function show(Kader $kader)
  {
    return view('admin.tambah_admin.tambah_admin_daerah.show', [
      'kader' => $kader
    ]);
  }
}
