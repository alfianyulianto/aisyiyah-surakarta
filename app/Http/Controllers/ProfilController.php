<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
  public function edit()
  {
    return view('profile');
  }

  public function update(Request $request,)
  {
    $validated = $request->validate([
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_kta' => ['required', 'numeric', 'unique:App\Models\Kader,no_kta'],
      'no_ktm' => ['required', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'email' => ['required', 'email:dns'],
      'jenis_kelamin' => ['required'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_ktp' => ['required', 'min:10'],
      'alamat_rumah' => ['required', 'min:10'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max:12', 'min:12']
    ]);
  }
}
