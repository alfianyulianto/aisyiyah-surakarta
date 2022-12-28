<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaderDashboardController extends Controller
{
  public function index()
  {
    return view('kader.dashboard');
  }
}
