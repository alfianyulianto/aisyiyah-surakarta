<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
  public function index()
  {
    $pekerjaan = Pekerjaan::orderBy('nama_pekerjaan', 'asc')->get();
    return $pekerjaan;
  }
}
