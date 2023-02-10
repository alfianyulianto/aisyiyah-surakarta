<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
  public function index()
  {
    $periode = Periode::orderBy('created_at', 'asc')->get();
    return $periode;
  }
}
