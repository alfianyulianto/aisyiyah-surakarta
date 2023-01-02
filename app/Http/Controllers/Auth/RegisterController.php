<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'no_ponsel' => ['required', 'numeric', 'max:12', 'min:12'],
      'nama' => ['required', 'string'],
      'password' => ['required', 'min:8'],
      'password2' => ['required', 'min:8', 'same:password'],
    ]);
  }
}
