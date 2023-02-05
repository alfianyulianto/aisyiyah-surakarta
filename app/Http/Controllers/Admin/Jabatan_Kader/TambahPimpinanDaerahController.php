<?php

namespace App\Http\Controllers\Admin\Jabatan_Kader;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\Jabatan;
use App\Models\Kader;
use App\Models\KaderJabatan;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TambahPimpinanDaerahController extends Controller
{
  public function create($id)
  {
    // data kader 
    $kader = collect([]);
    // ambil data kader di tabel user berdasarkan field kader_admin yang bukan sebagai kategori_user_id = 1
    $user = User::where('kategori_user_id', 1)->where('admin_at', null)->get();
    foreach ($user as $u) {
      // cek apakah ada data kader di tabel kader_jabatan
      if (Kader::where('nik', $u->kader_nik)->where('daerah_id_daerah', $id)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('daerah_id_daerah', $id)->first());
      }
    }

    // data jabatan
    $jabatan_kosong = collect([]);
    // ambil data jabatan yang ada di daerah
    $jabatan = Jabatan::where('daerah_id_daerah', $id)->get();
    foreach ($jabatan as $j) {
      if (!KaderJabatan::where('jabatan_id_jabatan', $j->id_jabatan)->first()) {
        $jabatan_kosong->push($j);
      }
    }
    // return $jabatan_kosong;

    return view('admin.jabatan_kader.tambah_jabatan_di_daerah.create', [
      'kader' => $kader,
      'jabatan' => $jabatan_kosong,
      'periode' => Periode::orderBy('created_at', 'asc')->get(),
      'last_periode' => Periode::orderBy('created_at', 'asc')->get()->last(),
      'nama_daerah' => Daerah::get()->first()->nama_daerah,
      'id_daerah' => $id,
      'kader_jabatan' => KaderJabatan::where('jabatan_at', $id)->get()
    ]);
  }

  public function store(Request $request, $id)
  {
    $validated = $request->validate([
      'jabatan' => ['required'],
      'periode' => ['required'],
      'kader' => ['required'],
      'nik' => ['required'],
      'no_kta' => ['required'],
      'no_ktm' => ['required'],
      'nama' => ['required', 'string'],
    ]);

    $validated['periode'] = Str::replace(' ', '', $request->periode);
    // cek apakah sudah ada data kader
    $cek_periode = Periode::where('periode', $validated['periode'])->first();
    if (!$cek_periode) {
      $data_periode = [
        'periode' => $request->periode,
        'id_periode' => 'prd-' . Str::random(4)
      ];
    }
    $validatedData = [
      'id_kader_jabatan' => 'kdrjbtn-' . Str::random(4),
      'jabatan_id_jabatan' => $request->jabatan,
      'periode' => Str::replace(' ', '', $request->periode),
      'kader_nik' => $request->kader,
      'jabatan_at' => $id,
    ];


    // insert ke tabel kader_jabatan
    KaderJabatan::create($validatedData);

    // ambil data jabatan
    $nama_jabatan = Jabatan::where('id_jabatan', $request->jabatan)->first()->nama_jabatan;

    return redirect('/jabatan/kader/daerah/' . $id)->with('message_pimp_daerah', 'Berhasil menambahkan ' . $request->nama . ' sebagai ' . $nama_jabatan . '.');
  }

  public function show(Kader $kader)
  {
    return view('admin.jabatan_kader.tambah_jabatan_di_daerah.show', [
      'kader' => $kader
    ]);
  }

  public function destroy(Request $request, Kader $kader, $id)
  {
    // delete data di tabel kader_jabatan
    KaderJabatan::where('kader_nik', $kader->nik)->delete();

    return redirect('/jabatan/kader/daerah/' . $id)->with('message_pimp_daerah', 'Berhasil menghapus ' . $kader->nama . ' sebagai ' . $request->jabatan . '.');
  }
}
