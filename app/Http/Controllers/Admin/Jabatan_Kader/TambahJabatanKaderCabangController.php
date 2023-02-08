<?php

namespace App\Http\Controllers\Admin\Jabatan_Kader;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Kader;
use App\Models\KaderJabatan;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TambahJabatanKaderCabangController extends Controller
{
  public function create($id)
  {  // data kader_jabatan
    $kader_jabatan = collect([]);
    $periode = Periode::orderBy('created_at', 'desc')->get();
    foreach ($periode as $p) {
      $jabatan = Jabatan::orderBy('created_at', 'asc')->get();
      foreach ($jabatan as $j) {
        $kader = KaderJabatan::where('periode_id_periode', $p->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->get();
        foreach ($kader as $k) {
          $kader_jabatan->push($k);
        }
      }
    }
    return view('admin.jabatan_kader.tambah_jabatan_di_cabang.create', [
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'nama_cabang' => Cabang::where('id_cabang', $id)->first()->nama_cabang,
      'id_cabang' => $id,
      'kader_jabatan' => $kader_jabatan
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

    $validatedData = [
      'id_kader_jabatan' => 'kdrjbtn-' . Str::random(4),
      'jabatan_id_jabatan' => $validated['jabatan'],
      'periode_id_periode' => $validated['periode'],
      'kader_nik' => $validated['kader'],
      'jabatan_at' => $id,
    ];


    // insert ke tabel kader_jabatan
    KaderJabatan::create($validatedData);

    // ambil data jabatan
    $nama_jabatan = Jabatan::where('id_jabatan', $request->jabatan)->first()->nama_jabatan;

    return redirect('/jabatan/kader/cabang/' . $id)->with('message_pimp_cabang', 'Berhasil menambahkan ' . $request->nama . ' sebagai ' . $nama_jabatan . '.');
  }

  public function show(Kader $kader)
  {
    return view('admin.jabatan_kader.tambah_jabatan_di_cabang.show', [
      'kader' => $kader
    ]);
  }

  public function destroy(Request $request, Kader $kader, $id)
  {
    // delete data di tabel kader_jabatan
    KaderJabatan::where('kader_nik', $kader->nik)->delete();

    return redirect('/jabatan/kader/cabang/' . $id)->with('message_delete_pimp_cabang', 'Berhasil menghapus ' . $kader->nama . ' sebagai ' . $request->jabatan . '.');
  }

  public function get_jabatan(Periode $periode, Cabang $cabang)
  {
    // data kader 
    $kader = collect([]);
    // ambil data kader di tabel user berdasarkan field kader_admin yang bukan sebagai kategori_user_id = 1
    $user = User::where('kategori_user_id', 1)->where('admin_at', null)->get();
    foreach ($user as $u) {
      // cek apakah ada data kader di tabel kader_jabatan
      if (Kader::where('nik', $u->kader_nik)->where('cabang_id_cabang', $cabang->id_cabang)->first() && !KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('kader_nik', $u->kader_nik)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('cabang_id_cabang', $cabang->id_cabang)->first());
      }
    }
    // data jabatan
    $jabatan_kosong = collect([]);
    // ambil semua jabatan
    $jabatan = Jabatan::orderBy('created_at', 'asc')->get();
    foreach ($jabatan as $j) {
      if (!KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->first() || $j->multiple_kader == true) {
        $jabatan_kosong->push($j);
      }
    }

    return response()->json(['kader' => $kader, 'jabatan' => $jabatan_kosong]);
  }
}
