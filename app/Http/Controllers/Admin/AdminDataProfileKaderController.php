<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Kader;
use App\Models\PendidikanTerakhir;
use App\Models\Ranting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AdminDataProfileKaderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.profil-kader.index', [
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
    // ambil data nama_cabang dan id_cabang pada tabel cabang
    $nama_cabang = Cabang::pluck('nama_cabang', 'id_cabang')->toArray();
    // ambil data nama_ranting dan id_ranting pada tabel ranting
    $nama_ranting = Ranting::pluck('nama_ranting', 'id_ranting')->toArray();
    // ambil data pendidikan_terakhir pada tabel pendidikan_terakhir
    $pendidikan_terakhir = PendidikanTerakhir::pluck('pendidikan', 'id_pendidikan_terakhir')->toArray();

    // $id_provinsi = collect([]);
    // // mendapatkan semua data provinsi dari api
    // $response =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->json();
    // foreach ($response['provinsi'] as $p) {
    //   $id_provinsi->push($p['id']);
    // }
    // // mendapatkan semua nama kota / kabupaten dari api
    // $nama_kota_kabupaten = collect([]);
    // foreach ($id_provinsi as $id) {
    //   $kota_kabupaten =  Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id)->json();
    //   foreach ($kota_kabupaten['kota_kabupaten'] as $k) {
    //     $nama_kota_kabupaten->push($k['nama']);
    //   }
    // }

    return view('admin.profil-kader.create', compact('nama_cabang', 'nama_ranting', 'pendidikan_terakhir'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'],
      'no_kta' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_kta'],
      'no_ktm' => ['nullable', 'numeric', 'unique:App\Models\Kader,no_ktm'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['required'],
      'ranting_id_ranting' => ['required'],
      'email' => ['nullable', 'email:dns'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_asal_ktp' => ['required', 'min:10'],
      'alamat_rumah_tinggal' => ['required', 'min:10'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir_id_pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12']
    ]);
    // tambah id daerah di tabel daerah
    $validated['daerah_id_daerah'] = 'ska-1';

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

    $validated['user_id'] = $id_user->id;

    // insert ke tabel kader
    Kader::create($validated);

    return redirect('/profil/kader')->with('message_kader', 'Data kader ' . $request->nama . ' berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
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
}
