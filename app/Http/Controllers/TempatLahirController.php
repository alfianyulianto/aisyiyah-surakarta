<?php

namespace App\Http\Controllers;

use App\Models\TempatLahir;
use Illuminate\Http\Request;

class TempatLahirController extends Controller
{
  public function index()
  {
    $tempat_lahir = TempatLahir::orderBy('tempat_lahir', 'asc')->get();
    return $tempat_lahir;
  }
}
