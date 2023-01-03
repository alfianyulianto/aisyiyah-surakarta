<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'no_ponsel' => ['required', 'numeric', 'max:12', 'min:12'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      // cek apakah seorang user admin atau kader biasa
      // return redirect()->intended('/admin');
    }
    return back()->with('failed', 'Login gagal! Masukan nomer handphone dan password yang benar.');
  }
}
