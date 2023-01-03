<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
  }
}
