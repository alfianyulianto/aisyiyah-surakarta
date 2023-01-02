<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
  }
}
