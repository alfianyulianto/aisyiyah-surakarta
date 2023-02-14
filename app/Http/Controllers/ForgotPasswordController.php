<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CheckNewPassword;
use App\Rules\CheckNik;
use App\Rules\CheckNoPonsel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
  public function edit()
  {
    return view('forgot_password');
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', new CheckNik],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12', new CheckNoPonsel],
      'password' => [
        'required', Password::min(8)->letters()->mixedCase()
      ],
      'konfirmasi_password' => ['required', 'min:8', 'same:password']
    ]);

    // cek apakah ada user yang sesuai dengan nik dan no_ponsel
    $user = User::where('kader_nik', $request->nik)->where('no_ponsel', $request->no_ponsel)->first();
    if ($user) {
      $validatedData = ['password' => Hash::make($request->password)];
      // update data di tabel user
      $user->update($validatedData);

      return redirect('/login')->with('message_login', 'Password berhasil di rubah! Silahkan login!');
    } else {
      return redirect('/forgot/password')->with('failed', 'Tidak ditemukan user dengan nik ' . $request->nik . ' dan nomer ponsel ' . $request->no_ponsel);
    }
  }
}
