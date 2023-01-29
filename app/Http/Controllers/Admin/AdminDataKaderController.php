<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KaderExport;
use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Daerah;
use App\Models\Kader;
use App\Models\Pekerjaan;
use App\Models\PendidikanTerakhir;
use App\Models\Ranting;
use App\Models\TempatLahir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('admin.data-kader.create', [
      'nama_cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'pendidikan_terakhir' => PendidikanTerakhir::orderBy('created_at', 'asc')->get(),
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
      'alamat_asal_ktp' => ['required', 'min:5'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir_id_pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12', 'unique:App\Models\User,no_ponsel']
    ];
    // cek jika tidak ada request cek_alamat
    if (!$request->cek_alamat) {
      $role['alamat_rumah_tinggal'] = ['required', 'min:5'];
    };

    // validasi data
    $validated = $request->validate($role);

    // ambil tempat_lahir dari form input dan ubah kata awal menjadi huruf kapital
    $tempat_lahir = $request->tempat_lahir;
    $lower_tempat_lahir = Str::lower($tempat_lahir);
    $result_tempat_lahir = ucwords($lower_tempat_lahir);

    // cek apakah tabel tempat_lahir sudah ada tempat_lahir
    $cek_tempat_lahir = TempatLahir::where('tempat_lahir', $result_tempat_lahir)->first();
    if (!$cek_tempat_lahir) {
      // insert ke tabel tempat_lahir
      $data_tempat_lahir = [
        'tempat_lahir' => $result_tempat_lahir,
        'id_tempat_lahir' => 'pkrjn-' . Str::random(4)
      ];
      // insert ke tabel tempat_lahir
      TempatLahir::create($data_tempat_lahir);
    }

    // ambil pekerjaan dari form input dan ubah kata awal menjadi huruf kapital
    $pekerjaan = $request->pekerjaan;
    $lower_pekerjaan = Str::lower($pekerjaan);
    $result_pekerjaan = ucwords($lower_pekerjaan);

    // cek apakah tabel pekerjaan sudah ada pekerjaan
    $cek_pekerjaan = Pekerjaan::where('pekerjaan', $result_pekerjaan)->first();
    if (!$cek_pekerjaan) {
      // insert ke tabel pekerjaan
      $data_pekerjaan = [
        'pekerjaan' => $result_pekerjaan,
        'id_pekerjaan' => 'pkrjn-' . Str::random(4)
      ];
      // insert ke tabel pekerjaan
      Pekerjaan::create($data_pekerjaan);
    }

    // buat user baru di tabel user
    $user_data = [
      'kader_nik' => $request->nik,
      'nama' => $request->nama,
      'no_ponsel' => $request->no_ponsel,
      'password' => Hash::make($request->no_ponsel),
      'kategori_user_id' => 1
    ];
    User::create($user_data);

    // cari user
    $user = User::where('kader_nik', $request->nik)->first();
    $validatedData['user_id'] = $user->id;

    // insert ke tabel kader
    $validatedData = [
      'daerah_id_daerah' => Daerah::get()->first()->id_daerah,
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
      'alamat_asal_ktp' => $request->alamat_asal_ktp,
    ];
    // cek jika user melakukan cek list
    if (!$request->cek_alamat) {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_rumah_tinggal;
    } else {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_asal_ktp;
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
      'kader' => $kader,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Kader $kader)
  {
    return view('admin.data-kader.edit', [
      'kader' => $kader,
      'nama_cabang' => Cabang::orderBy('nama_cabang', 'asc')->get(),
      'pendidikan_terakhir' => PendidikanTerakhir::orderBy('created_at', 'asc')->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Kader $kader)
  {
    $role = [
      'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16'],
      'no_kta' => ['nullable', 'numeric'],
      'no_ktm' => ['nullable', 'numeric'],
      'nama' => ['required', 'string', 'min:5'],
      'cabang_id_cabang' => ['nullable'],
      'ranting_id_ranting' => ['nullable'],
      'email' => ['nullable', 'email:dns'],
      'tempat_lahir' => ['required', 'string'],
      'tanggal_lahir' => ['required'],
      'alamat_asal_ktp' => ['required', 'min:15'],
      'status_pernikahan' => ['required'],
      'pekerjaan' => ['required', 'min:5'],
      'pendidikan_terakhir_id_pendidikan_terakhir' => ['required'],
      'no_ponsel' => ['required', 'numeric', 'max_digits:12', 'min_digits:12']
    ];
    // cek jika tidak ada request cek_alamat
    if (!$request->cek_alamat) {
      $role['alamat_rumah_tinggal'] = ['required', 'min:15'];
    };

    // cek jika user tidak mengganti nik, no_kta, no_ktm
    if ($kader->nik != $request->nik) {
      $role['nik'] = ['required', 'numeric', 'max_digits:16', 'min_digits:16', 'unique:App\Models\Kader,nik'];
    } elseif ($kader->no_kta != $request->no_kta) {
      $role['no_kta'] = ['nullable', 'numeric', 'unique:App\Models\Kader,no_kta'];
    } elseif ($kader->no_ktm != $request->no_ktm) {
      $role['no_ktm'] =  ['nullable', 'numeric', 'unique:App\Models\Kader,no_ktm'];
    } elseif ($kader->email != $request->email) {
      $role['email'] = ['nullable', 'email:dns', 'unique:App\Models\Kader,email'];
    }

    // validasi data
    $validated = $request->validate($role);

    // ambil tempat_lahir dari form input dan ubah kata awal menjadi huruf kapital
    $tempat_lahir = $request->tempat_lahir;
    $lower_tempat_lahir = Str::lower($tempat_lahir);
    $result_tempat_lahir = ucwords($lower_tempat_lahir);

    // cek apakah tabel tempat_lahir sudah ada tempat_lahir
    $cek_tempat_lahir = TempatLahir::where('tempat_lahir', $result_tempat_lahir)->first();
    if (!$cek_tempat_lahir) {
      // insert ke tabel tempat_lahir
      $data_tempat_lahir = [
        'tempat_lahir' => $result_tempat_lahir,
        'id_tempat_lahir' => 'pkrjn-' . Str::random(4)
      ];
      // insert ke tabel tempat_lahir
      TempatLahir::create($data_tempat_lahir);
    }

    // ambil pekerjaan dari form input dan ubah kata awal menjadi huruf kapital
    $pekerjaan = $request->pekerjaan;
    $lower_pekerjaan = Str::lower($pekerjaan);
    $result_pekerjaan = ucwords($lower_pekerjaan);

    // cek apakah tabel pekerjaan sudah ada pekerjaan
    $cek_pekerjaan = Pekerjaan::where('pekerjaan', $result_pekerjaan)->first();
    if (!$cek_pekerjaan) {
      // insert ke tabel pekerjaan
      $data_pekerjaan = [
        'pekerjaan' => $result_pekerjaan,
        'id_pekerjaan' => 'pkrjn-' . Str::random(4)
      ];
      // insert ke tabel pekerjaan
      Pekerjaan::create($data_pekerjaan);
    }

    // update ke tabel kader
    $validatedData = [
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
      'alamat_asal_ktp' => $request->alamat_asal_ktp,
    ];
    // cek jika user melakukan cek list
    if (!$request->cek_alamat) {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_rumah_tinggal;
    } else {
      $validatedData['alamat_rumah_tinggal'] = $request->alamat_asal_ktp;
    }

    // cari user di tabel user
    // $user = User::where('kader_nik', Auth::user()->kader_nik)->first();
    $user = User::where('kader_nik', $kader->nik)->first();

    // cek jika user mengganti nik, nama, no_ponsel
    if ($user->kader_nik != $request->nik || $user->nama != $request->nama || $user->no_ponsel != $request->no_ponsel) {
      $data['kader_nik'] = $request->nik;
      $data['nama'] = $request->nama;
      $data['no_ponsel'] = $request->no_ponsel;

      // update data di tabel user
      // User::where('kader_nik', Auth::user()->kader_nik)->update($data);
      User::where('kader_nik', $kader->nik)->update($data);
    }

    // update data di tabel kader
    // $kader->update($validatedData);
    $kader->update($validatedData);

    return redirect('/data/kader')->with('message_kader', 'Data kader ' . $request->nama . ' berhasil diubah.');
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

  public function get_kader(Kader $kader)
  {
    return $kader;
  }

  public function export()
  {
    return Excel::download(new KaderExport, 'Data Kader per ' . date('d-m-Y') . '.xlsx');
  }
}
