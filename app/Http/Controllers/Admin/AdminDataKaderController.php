<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\PendidikanTerakhir;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminDataKaderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.data-kader.index', [
      'kader' => Kader::orderBy('created_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // ambil data cabang pada tabel cabang
    $nama_cabang = Cabang::orderBy('nama_cabang', 'asc')->get();
    // ambil data ranting pada tabel ranting
    $nama_ranting = Ranting::orderBy('nama_ranting', 'asc')->get();
    // ambil data pendidikan_terakhir pada tabel pendidikan_terakhir
    $pendidikan_terakhir = PendidikanTerakhir::orderBy('created_at', 'asc')->get();

    // mendapatkan semua data provinsi dari api
    $data_provinsi = collect([]);
    $provinsi =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
    foreach ($provinsi['provinsi'] as $prov) {
      $data_provinsi->push(collect(['id' => $prov['id'], 'nama' => $prov['nama']]));
    }

    // // mendapatkan semua data kota / kabupaten dari api
    // $id_kota_kabupaten = collect([]);
    // $nama_kota_kabupaten = collect([]);
    // foreach ($id_provinsi as $id) {
    //   $kota_kabupaten =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id)->json();
    //   foreach ($kota_kabupaten['kota_kabupaten'] as $k) {
    //     $id_kota_kabupaten->push($k['id']);
    //     $nama_kota_kabupaten->push($k['nama']);
    //   }
    // }

    // // mendapatkan semua data kecamatan dari api
    // $id_kecamatan = collect([]);
    // $nama_kecamatan = collect([]);
    // foreach ($id_kota_kabupaten as $id) {
    //   $kecamatan =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $id)->json();
    //   foreach ($kecamatan['kecamatan'] as $kec) {
    //     $id_kecamatan->push($kec['id']);
    //     $nama_kecamatan->push($kec['nama']);
    //   }
    // }

    // // mendapatkan semua data kelurahan dari api
    // $id_kelurahan = collect([]);
    // $nama_kelurahan = collect([]);
    // foreach ($id_kecamatan as $id) {
    //   $kelurahan =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $id)->json();
    //   foreach ($kelurahan['kelurahan'] as $kel) {
    //     $id_kelurahan->push($kel['id']);
    //     $nama_kelurahan->push($kel['nama']);
    //   }
    // }


    return view('admin.data-kader.create', [
      'nama_cabang' => $nama_cabang,
      'nama_ranting' => $nama_ranting,
      'pendidikan_terakhir' => $pendidikan_terakhir,
      'data_provinsi' => $data_provinsi,
      // 'nama_kota_kabupaten' => $nama_kota_kabupaten,
      // 'nama_kecamatan' => $nama_kecamatan,
      // 'nama_kelurahan' => $nama_kelurahan,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $role = [
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_kta' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_kta'],
      'no_ktm' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['nullable'],
      'ranting_id_ranting' => ['nullable'],
      'email' => ['nullable', 'email:dns'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_ktp' => ['required', 'min:5'],
      'provinsi_ktp' => ['required'],
      'kabupaten_kota_ktp' => ['required'],
      'kecamatan_ktp' => ['required'],
      'kelurahan_ktp' => ['required'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir_id_pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12']
    ];
    if (!$request->cek_alamat) {
      $role['alamat_domisili'] = ['required', 'min:5'];
      $role['provinsi_domisili'] = ['required'];
      $role['kabupaten_kota_domisili'] = ['required'];
      $role['kecamatan_domisili'] = ['required'];
      $role['kelurahan_domisili'] = ['required'];
    };

    // validasi data
    $validated = $request->validate($role);

    // buat user baru ri tabel user
    $user_data = [
      'nama' => $request->nama,
      'no_ponsel' => $request->no_ponsel,
      'password' => Hash::make($request->no_ponsel),
      'kategori_user' => 0
    ];
    User::create($user_data);

    // cari user
    $id_user = User::where('nama', $request->nama)->where('no_ponsel', $request->no_ponsel)->first();
    $validatedData['user_id'] = $id_user->id;

    // insert ke tabel kader
    $validatedData = [
      'daerah_id_daerah' => Daerah::first()->get()->id_daerah,
      'nik' => $request->nik,
      'no_kta' => $request->no_kta,
      'no_ktm' => $request->no_ktm,
      'nama' => $request->nama,
      'cabang_id_cabang' => $request->cabang_id_cabang,
      'ranting_id_ranting' => $request->ranting_id_ranting,
      'email' => $request->email,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'status_pernikahan' => $request->status_pernikahan,
      'pekerjaan' => $request->pekerjaan,
      'pendidikan_terakhir_id_pendidikan_terakhir' => $request->pendidikan_terakhir_id_pendidikan_terakhir,
      'no_ponsel' => $request->no_ponsel,
      'alamat_asal_ktp' => $request->alamat_ktp . ' ' . $request->kelurahan_ktp . ' ' . $request->kabupaten_kota_ktp . ' ' . $request->provinsi_ktp,
    ];
    if (!$request->cek_alamat) {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_domisili . ' ' . $request->kelurahan_domisili . ' ' . $request->kabupaten_kota_domisili . ' ' . $request->provinsi_domisili;
    }

    // insert ke tabel kader
    Kader::create($validatedData);

    return redirect('/data/kader')->with('message_kader', 'Data ' . $request->nama . ' berhasil ditambahkan sebagai kader.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Kader $kader)
  {
    return view('admin.data-kader.show', [
      'kader' => $kader
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function ranting(Ranting $ranting)
  {
    $nama_ranting = Ranting::where('cabang_id_cabang', $ranting->cabang_id_cabang)->orderBy('nama_ranting', 'asc')->get();
    return $nama_ranting;
  }

  public function kota_kabupaten(Request $request)
  {
    $kota_kabupaten = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $request->id)->json();
    return $kota_kabupaten;
  }

  public function kecamatan(Request $request)
  {
    $kecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $request->id)->json();
    return $kecamatan;
  }

  public function kelurahan(Request $request)
  {
    $kelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $request->id)->json();
    return $kelurahan;
  }

  public function get_kader(Kader $kader)
  {
    return $kader;
  }
}
