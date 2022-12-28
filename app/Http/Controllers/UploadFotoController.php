<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFotoController extends Controller
{
    public function index()
    {
      return view('upload_foto');
    }
}
