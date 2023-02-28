<?php

namespace App\Http\Controllers;

use App\Models\Kader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadFotoController extends Controller
{
  public function index()
  {
    return view('upload_foto', [
      'title' => 'Upload Foto',
    ]);
  }

  public function upload_foto(Request $request)
  {
    $validated = $request->validate([
      'foto' => ['required', 'mimes:jpg,jpeg,png']
    ]);

    // ambil data user sesuai dengan user yang login
    $kader = Kader::where('nik', Auth::user()->kader_nik)->first();

    // cek jika foto awal user merupakan default
    if ($kader->foto !== 'foto profil/avatar-3.png') {
      // hapus file sk_pimp_daerah dari tabel daerah
      Storage::delete($kader->foto);
    }

    // simpan foto yan diupload
    $file = $request->file('foto');
    $validated['foto'] = $file->storeAs('foto profil', $kader->nama . '.' . $file->getClientOriginalExtension());

    // update foto kader
    $kader->update($validated);

    return redirect('/admin')->with('message_foto', 'Anda berhasil merubah foto profil.');
  }
}
