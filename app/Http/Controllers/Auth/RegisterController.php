<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kader;
use App\Models\Cabang;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index()
  {
    // ambil data nama_cabang dan id_cabang pada tabel cabang
    $nama_cabang = Cabang::pluck('nama_cabang', 'id_cabang')->toArray();
    // ambil data nama_ranting dan id_ranting pada tabel ranting
    $nama_ranting = Ranting::pluck('nama_ranting', 'id_ranting')->toArray();
    return view('auth.register', compact('nama_cabang', 'nama_ranting'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12'],
      'nama' => ['required', 'string'],
      // 'cabang_id_cabang' => ['required'],
      // 'ranting_id_ranting' => ['required'],
      'password' => ['required', 'min:8'],
      'konfirmasi_password' => ['required', 'min:8', 'same:password'],
    ]);

    // insert ke tabel user
    $validatedDataUser = [
      'no_ponsel' => $request->no_ponsel,
      'nama' => $request->nama,
      'password' => Hash::make($request->password),
      'kategori_user' => 0,
    ];
    User::create($validatedDataUser);

    // ambil data user 
    $id_user = User::where('nama', $request->nama)->where('no_ponsel', $request->no_ponsel)->first();
    // inser ke tabel kader
    $validatedDataKader = [
      'nik' => $request->nik,
      'nama' => $request->nama,
      'daerah_id_daerah' => 'ska-1',
      'cabang_id_cabang' => $request->cabang_id_cabang,
      'ranting_id_ranting' => $request->ranting_id_ranting,
      'user_id' => $id_user->id,
      'no_ponsel' => $request->no_ponsel
    ];

    Kader::create($validatedDataKader);

    return redirect('/login')->with('message_login', 'Registrasi berhasil! Silahkan login.');
  }
}
