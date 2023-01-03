<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
  public function edit()
  {
    return view('profil');
  }

  public function update(Request $request,)
  {
    $role = [
      // 'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      // 'no_kta' => ['required', 'numeric', 'unique:App\Models\Kader,no_kta'],
      // 'no_ktm' => ['required', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['required'],
      'ranting_id_ranting' => ['required'],
      'email' => ['required', 'email:dns'],
      'jenis_kelamin' => ['required'],
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
      $role['alamat_rumah'] = ['required', 'min:5'];
      $role['provinsi_rumah'] = ['required'];
      $role['kabupaten_kota_rumah'] = ['required'];
      $role['kecamatan_rumah'] = ['required'];
      $role['kelurahan_rumah'] = ['required'];
    };
    $validated = $request->validate($role);
  }
}
