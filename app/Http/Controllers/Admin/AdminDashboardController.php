<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Kader;
use App\Models\KategoriUser;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
  public function index()
  {
    // // cek user apakah seorang super admin atau admin-daerah
    // if (Auth::user()->kategori_user_id == 2 || Auth::user()->kategori_user_id == 3) {
    //   $total_admin = 0;
    //   $kategori_user = KategoriUser::where('kategori_user', '!=', 'kader')->get();
    //   foreach ($kategori_user as $k) {
    //     $total_admin += User::where('kategori_user_id', $k->id)->count();
    //   }
    //   $total_kader = Kader::count();
    //   $total_cabang = Cabang::count();
    //   $total_ranting = Ranting::count();
    //   return view('admin.dashboard', [
    //     'kader' => Kader::where('nik', Auth::user()->kadr_nik)->first(),
    //     'total_admin' => $total_admin,
    //     'total_kader' => $total_kader,
    //     'total_cabang' => $total_cabang,
    //     'total_ranting' => $total_ranting,
    //   ]);
    // } else if (Auth::user()->ketegori_user_id == 4) { // jika user seorang admin cabang
    //   $total_admin = 0;
    //   $total_admin += User::where('admin_at', Auth::user()->admin_at)->count();
    //   $ranting = Ranting::where('cabang_id_cabang', Auth::user()->admin_at)->get();
    //   $arr_ranting = collect([]);
    //   foreach ($ranting as $r) {
    //     $arr_ranting->push(User::where('admin_at', $r->id_ranting)->count());
    //   }
    //   $total_admin += $arr_ranting->sum();

    //   $total_kader = Kader::where('cabang_id_cabang', Auth::user()->admin_at)->count();
    //   $total_ranting = Ranting::where('cabang_id_cabang', Auth::user()->admin_at)->count();
    //   return view('admin.dashboard', [
    //     'kader'  => Kader::where('nik', Auth::user()->kadr_nik)->first(),
    //     'total_admin' => $total_admin,
    //     'total_kader' => $total_kader,
    //     'total_ranting' => $total_ranting,
    //   ]);
    // } else if (Auth::user()->ketegoori_user_id == 5) { // jika user seorag admin ranting
    //   $total_kader = Kader::where('ranting_id_ranting', Auth::user()->admin_at)->count();
    //   return view('admin.dashboard', [
    //     'kader' => Kader::where('nik', Auth::user()->kadr_nik)->first(),
    //     'total_kader' => $total_kader
    //   ]);
    // }


    $total_admin = 0;
    $kategori_user = KategoriUser::where('kategori_user', '!=', 'kader')->get();
    foreach ($kategori_user as $k) {
      $total_admin += User::where('kategori_user_id', $k->id)->count();
    }
    $total_kader = Kader::count();
    $total_cabang = Cabang::count();
    $total_ranting = Ranting::count();
    return view('admin.dashboard', [
      'kader' => Kader::where('nik', '3372010107000002')->first(),
      'total_admin' => $total_admin,
      'total_kader' => $total_kader,
      'total_cabang' => $total_cabang,
      'total_ranting' => $total_ranting,
    ]);
  }
}
