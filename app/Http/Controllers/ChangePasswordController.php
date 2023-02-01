<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
  public function edit()
  {
    return view('change_password');
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'password' => ['required', 'current_password:api'],
      'password_baru' => ['required', 'min:8'],
      'konfirmasi_password' => ['required', 'min:8', 'same:password_baru']
    ]);

    $validatedData = [
      'password' => Hash::make($request->password_baru)
    ];

    // update tabel user
    User::where('id', Auth::id())->update($validatedData);
  }
}
