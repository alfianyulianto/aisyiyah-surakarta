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
    $validated = $request->validate([]);
  }
}
