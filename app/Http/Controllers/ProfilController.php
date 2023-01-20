<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\PendidikanTerakhir;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfilController extends Controller
{
  public function edit()
  {
    // // mendapatkan semua data provinsi dari api
    // $data_provinsi = collect([]);
    // $provinsi =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
    // foreach ($provinsi['provinsi'] as $prov) {
    //   $data_provinsi->push(collect(['id' => $prov['id'], 'nama' => $prov['nama']]));
    // }
    return view('profil', [
      // 'kader'=>Kader::where('nik', Auth::user()->kader_id)->first(),
      'kader' => Kader::where('nik', '3372010107000002')->first(),
      'nama_cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'nama_ranting' => Ranting::orderBy('nama_ranting', 'asc')->get(),
      'pendidikan_terakhir' => PendidikanTerakhir::orderBy('created_at', 'asc')->get(),
      // 'data_provinsi' => $data_provinsi
    ]);
  }

  public function update(Request $request)
  {
    // return $request;
    $role = [
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16'],
      'no_kta' => ['nullable', 'numeric'],
      'no_ktm' => ['nullable', 'numeric'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['nullable'],
      'ranting_id_ranting' => ['nullable'],
      'email' => ['nullable', 'email:dns'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_asal_ktp' => ['required', 'min:15'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir_id_pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12']
    ];
    // cek jika ada request cek_alamat
    if (!$request->cek_alamat) {
      $role['alamat_rumah_tinggal'] = ['required', 'min:15'];
    };

    // ambil data user dari tabel kader
    // $kader = Kader::where('nik', Auth::user()->kader_nik)->first();
    $kader = Kader::where('nik', '3372010107000002')->first();
    // cek jika user tidak mengganti nik, no_kta, no_ktm
    if ($kader->nik != $request->nik || $kader->no_kta != $request->no_kta || $kader->no_ktm != $request->no_ktm || $kader->email != $request->email) {
      $role['nik'] = ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'];
      $role['no_kta'] = ['nullable', 'numeric', 'unique:App\Models\Kader,no_kta'];
      $role['no_ktm'] =  ['nullable', 'numeric', 'unique:App\Models\Kader,no_ktm'];
      $role['email'] = ['nullable', 'email:dns', 'unique:App\Models\Kader,email'];
    }

    // validasi data
    $validated = $request->validate($role);

    // update ke tabel kader
    $validatedData = [
      'daerah_id_daerah' => Daerah::first()->get()->id_daerah,
      'nik' => $request->nik,
      'no_kta' => $request->no_kta,
      'no_ktm' => $request->no_ktm,
      'nama' => $request->nama,
      'cabang_id_cabang' => $request->cabang_id_cabang,
      'ranting_id_ranting' => $request->ranting_id_ranting,
      'email' => $request->email,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'status_pernikahan' => $request->status_pernikahan,
      'pekerjaan' => $request->pekerjaan,
      'pendidikan_terakhir_id_pendidikan_terakhir' => $request->pendidikan_terakhir_id_pendidikan_terakhir,
      'no_ponsel' => $request->no_ponsel,
      'alamat_asal_ktp' => $request->alamat_asal_ktp,
    ];
    if (!$request->cek_alamat) {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_rumah_tinggal;
    }

    // cari user di tabel user
    // $id_user = User::where('nama', $request->nama)->where('no_ponsel', $request->no_ponsel)->first();
    // $id_user = User::where('kader_nik', Auth::user()->kader_nik)->first();
    $user = User::where('kader_nik', '3372010107000002')->first();

    // cek jika user mengganti nik, nama, no_ponsel
    if ($user->kader_nik != $request->nik || $user->nama != $request->nama || $user->no_ponsel != $request->no_ponsel) {
      $data['kader_nik'] = $request->nik;
      $data['nama'] = $request->nama;
      $data['no_ponsel'] = $request->no_ponsel;

      User::where('id', 1)->update($data);
    }

    Kader::where('nik', '3372010107000002')->update($validatedData);

    return redirect('/profil')->with('message_kader', 'Data kader ' . $request->nama . ' berhasil diupdate.');
  }
}
