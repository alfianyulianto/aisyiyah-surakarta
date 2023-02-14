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

class TambahJabatanKaderDaerahController extends Controller
{
  public function create($id)
  {
    // data kader_jabatan
    $kader_jabatan = collect([]);
    $periode = Periode::orderBy('created_at', 'desc')->get();
    foreach ($periode as $p) {
      $jabatan = Jabatan::where('daerah_id_daerah', $id)->orderBy('created_at', 'asc')->get();
      foreach ($jabatan as $j) {
        $kader = KaderJabatan::where('periode_id_periode', $p->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->get();
        foreach ($kader as $k) {
          $kader_jabatan->push($k);
        }
      }
    }
    return view('admin.jabatan_kader.tambah_jabatan_di_daerah.create', [
      'periode' => Periode::orderBy('created_at', 'desc')->get(),
      'nama_daerah' => Daerah::get()->first()->nama_daerah,
      'id_daerah' => $id,
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
    // return $validatedData;

    // insert ke tabel kader_jabatan
    KaderJabatan::create($validatedData);

    // ambil data jabatan
    $nama_jabatan = Jabatan::where('id_jabatan', $request->jabatan)->first()->nama_jabatan;

    // ambil data periode
    $periode = Periode::where('id_periode', $request->periode)->first()->periode;

    return redirect('/jabatan/kader/daerah/' . $id)->with('message_pimp_daerah', 'Berhasil menambahkan ' . $request->nama . ' sebagai ' . $nama_jabatan . ' periode ' . $periode . '.');
  }

  public function show(Kader $kader)
  {
    return view('admin.jabatan_kader.tambah_jabatan_di_daerah.show', [
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

    return redirect('/jabatan/kader/daerah/' . $id)->with('message_delete_pimp_daerah', 'Berhasil menghapus ' . $kader->nama . ' sebagai ' . $request->jabatan . ' periode ' . $periode . '.');
  }

  public function get_jabatan(Periode $periode, Daerah $daerah)
  {
    // data kader 
    $kader = collect([]);
    // ambil data kader di tabel user berdasarkan field kader_admin yang bukan sebagai kategori_user_id sama dengan 2 atau 4 atau 5
    $user = User::where('kategori_user_id', '!=', 2)->where('kategori_user_id', '!=', 4)->where('kategori_user_id', '!=', 5)->get();
    foreach ($user as $u) {
      // cek apakah ada data kader di tabel kader_jabatan
      if (Kader::where('nik', $u->kader_nik)->where('daerah_id_daerah', $daerah->id_daerah)->first() && !KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('kader_nik', $u->kader_nik)->where('jabatan_at', $daerah->id_daerah)->first()) {
        $kader->push(Kader::where('nik', $u->kader_nik)->where('daerah_id_daerah', $daerah->id_daerah)->first());
      }
    }
    // data jabatan
    $jabatan_kosong = collect([]);
    // ambil semua jabatan
    $jabatan = Jabatan::where('daerah_id_daerah', $daerah->id_daerah)->orderBy('created_at', 'asc')->get();
    foreach ($jabatan as $j) {
      if (!KaderJabatan::where('periode_id_periode', $periode->id_periode)->where('jabatan_id_jabatan', $j->id_jabatan)->first() || $j->multiple_kader == true) {
        $jabatan_kosong->push($j);
      }
    }

    return response()->json(['kader' => $kader, 'jabatan' => $jabatan_kosong]);
  }
}
