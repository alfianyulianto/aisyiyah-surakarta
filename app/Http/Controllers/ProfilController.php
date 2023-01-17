<?php

namespace App\Http\Controllers;

use App\Models\PendidikanTerakhir;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
  public function edit()
  {
    return view('profil', [
      'pendidikan_terakhir' => PendidikanTerakhir::orderBy('created_at', 'asc')->get()
    ]);
  }

  public function update(Request $request,)
  {
    $role = [
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_kta' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_kta'],
      'no_ktm' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['required'],
      'ranting_id_ranting' => ['required'],
      'email' => ['required', 'email:dns'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max:12', 'min:12'],
      'alamat_ktp' => ['required', 'min:5'],
      'provinsi_ktp' => ['required'],
      'kabupaten_kota_ktp' => ['required'],
      'kecamatan_ktp' => ['required'],
      'kelurahan_ktp' => ['required'],
      'cek_alamat' => [],
    ];
    if (!$request->cek_alamat) {
      $role['alamat_domisili'] = ['required', 'min:5'];
      $role['provinsi_domisili'] = ['required'];
      $role['kabupaten_kota_domisili'] = ['required'];
      $role['kecamatan_domisili'] = ['required'];
      $role['kelurahan_domisili'] = ['required'];
    };
    $validated = $request->validate($role);
  }
}
