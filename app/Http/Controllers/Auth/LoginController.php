<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12'],
      'password' => ['required'],
    ]);

    // cek apakah user admin atau kader
    $user = User::where('no_ponsel', $request->no_ponsel)->first();
    if ($user->kategori_user_id != 1) { // jika admin
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // cek apakah seorang user admin atau kader biasa
        return redirect()->intended('/admin');
      }
    }

    if (Auth::attempt($credentials)) { // jika kader
      $request->session()->regenerate();

      // cek apakah seorang user admin atau kader biasa
      return redirect()->intended('/kader');
    }

    return back()->with('failed', 'Login gagal! Masukan nomer handphone dan password yang benar.');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
  }
}
