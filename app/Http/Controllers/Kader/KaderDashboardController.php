<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use App\Models\Kader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaderDashboardController extends Controller
{
  public function index()
  {
    return view('kader.dashboard', [
      'kader' => Kader::where('nik', Auth::user()->kader_nik)->first()
    ]);
  }
}
