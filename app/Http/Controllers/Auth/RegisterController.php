<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register', [
      'nama_cabang' => Cabang::orderBy('nama_cabang', 'asc')->get()
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12'],
      'nama' => ['required', 'string'],
      'cabang_id_cabang' => ['nullable'],
      'ranting_id_ranting' => ['nullable'],
      'password' => ['required', 'min:8', Password::min(8)->letters()->mixedCase()],
      'konfirmasi_password' => ['required', 'min:8', 'same:password'],
    ]);

    // insert ke tabel user
    $validatedDataUser = [
      'kader_nik' => $request->nik,
      'no_ponsel' => $request->no_ponsel,
      'nama' => $request->nama,
      'password' => Hash::make($request->password),
      'kategori_user_id' => 1,
    ];
    User::create($validatedDataUser);

    // ambil data user 
    $id_user = User::where('kader_nik', $request->nik)->where('nama', $request->nama)->where('no_ponsel', $request->no_ponsel)->first()->id;
    // inser ke tabel kader
    $validatedDataKader = [
      'nik' => $request->nik,
      'nama' => $request->nama,
      'daerah_id_daerah' => Daerah::get()->first()->id_daerah,
      'cabang_id_cabang' => $request->cabang_id_cabang,
      'ranting_id_ranting' => $request->ranting_id_ranting,
      'user_id' => $id_user,
      'no_ponsel' => $request->no_ponsel,
      'foto' => 'foto profil/avatar-3.png'
    ];

    // insert ke tabel kader
    Kader::create($validatedDataKader);

    return redirect('/login')->with('message_login', 'Registrasi berhasil! Silahkan login.');
  }

  public function ranting(Ranting $ranting)
  {
    $nama_ranting = Ranting::where('cabang_id_cabang', $ranting->cabang_id_cabang)->orderBy('nama_ranting', 'asc')->get();
    return $nama_ranting;
  }
}
