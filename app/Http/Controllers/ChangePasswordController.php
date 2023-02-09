<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CheckNewPassword;
use App\Rules\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
  public function edit()
  {
    return view('change_password');
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'password' => ['required', new CurrentPassword],
      'password_baru' => [
        'required',
        new CheckNewPassword,
        Password::min(8)->letters()->mixedCase()
      ],
      'konfirmasi_password' => ['required', 'min:8', 'same:password_baru']
    ]);

    $validatedData = [
      'password' => Hash::make($request->password_baru)
    ];

    // update tabel user
    User::where('id', Auth::id())->update($validatedData);

    if (Auth::user()->kaegori_user_id == 1) {
      return redirect('/kader')->with('message_change_password', 'Password Anda berhasil dirubah.');
    }

    return redirect('/admin')->with('message_change_password', 'Password Anda berhasil dirubah.');
  }
}
