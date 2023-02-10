<?php

namespace App\Http\Controllers\Admin\Jabatan_Kader;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Kader;
use App\Models\KaderJabatan;
use App\Models\Periode;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TambahJabatanKaderRantingController extends Controller
{
  public function create($id)
  {
    // data kader_jabatan
    $kader_jabatan = collect([]);
    $periode = Periode::orderBy('created_at', 'desc')->get();
    foreach ($periode as $p) {
      $jabatan = Jabatan::where('ranting_id_ranting', $id)->orderBy('created_at', 'asc')->get();
      foreach ($jabatan as $j) {
        $kader = KaderJabatan::where('periode_id_periode', $p->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->get();
        foreach ($kader as $k) {
          $kader_jabatan->push($k);
        }
      }
    }
    return view('admin.jabatan_kader.tambah_jabatan_di_ranting.create', [
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'nama_ranting' => Ranting::where('id_ranting', $id)->first()->nama_ranting,
      'id_ranting' => $id,
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

    // ambil data periode
    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    return redirect('/jabatan/kader/ranting/' . $id)->with('message_pimp_ranting', 'Berhasil menambahkan ' . $request->nama . ' sebagai ' . $nama_jabatan . ' periode ' . $periode . '.');
  }

  public function show(Kader $kader)
  {
    return view('admin.jabatan_kader.tambah_jabatan_di_ranting.show', [
      'kader' => $kader
    ]);
  }

  public function destroy(Request $request, KaderJabatan $kader_jabatan, $id)
  {
    // ambil data kader
    $kader = Kader::where('nik', $kader_jabatan->kader_nik)->first();

    // ambil data periode
    $periode = Periode::where('id_periode', $kader_jabatan->periode_id_periode)->first()->periode;

    // delete data di tabel kader_jabatan
    $kader_jabatan->delete();

    return redirect('/jabatan/kader/cabang/' . $id)->with('message_delete_pimp_ranting', 'Berhasil menghapus ' . $kader->nama . ' sebagai ' . $request->jabatan . ' periode ' . $periode . '.');
  }

  public function get_jabatan(Periode $periode, Ranting $ranting)
  {
    // data kader 
    $kader = collect([]);
    // ambil data kader di tabel user berdasarkan field kader_admin yang bukan sebagai kategori_user_id = 1
    $user = User::where('kategori_user_id', 1)->where('admin_at', null)->get();
    foreach ($user as $u) {
      // cek apakah ada data kader di tabel kader_jabatan
      if (Kader::where('nik', $u->kader_nik)->where('ranting_id_ranting', $ranting->id_ranting)->first() && !KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('kader_nik', $u->kader_nik)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('ranting_id_ranting', $ranting->id_ranting)->first());
      }
    }
    // data jabatan
    $jabatan_kosong = collect([]);
    // ambil semua jabatan
    $jabatan = Jabatan::where('ranting_id_ranting', $ranting->id_ranting)->orderBy('created_at', 'asc')->get();
    foreach ($jabatan as $j) {
      if (!KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->first() || $j->multiple_kader == true) {
        $jabatan_kosong->push($j);
      }
    }

    return response()->json(['kader' => $kader, 'jabatan' => $jabatan_kosong]);
  }
}
