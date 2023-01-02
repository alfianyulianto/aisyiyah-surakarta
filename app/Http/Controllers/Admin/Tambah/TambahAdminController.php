<?php

namespace App\Http\Controllers\Admin\Tambah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TambahAdminController extends Controller
{
  public function index()
  {
    return view('admin.tambah_admin.index');
  }
}
