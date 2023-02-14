@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('change_password'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('change_password') }}
                  </div>
                </div>
              @endif
              <div class="row mb-3 pr-0">
                <div class="col-lg-3 mb-3">
                  <img
                    src="{{ asset('storage/' .DB::table('kader')->where('nik', Auth::user()->kader_nik)->first()->foto) }}"
                    class="rounded mx-auto d-block" alt="" width="200">
                </div>
                <div class="col-lg-9">
                  <div class="d-inline py-3">
                    <p class="mb-0 px-0 text-primary" style="font-size: 20px; font-weight: bold; line-height: 28px">
                      <b class="text-uppercase">{{ $kader->nama }}</b> <b>(Admin)</b>
                    </p>
                    @if ($kader->daerah && !$kader->cabang && !$kader->ranting)
                      <p class="mb-0">
                        <i class="fas fa-user"></i><span class="mx-3">Kader - Daerah {{ $kader->daerah->nama_daerah }}
                        </span>
                      </p>
                    @endif
                    @if ($kader->daerah && $kader->cabang && !$kader->ranting)
                      <p class="mb-0">
                        <i class="fas fa-user"></i><span class="mx-3">Kader - Cabang {{ $kader->cabang->nama_cabang }}
                        </span>
                      </p>
                    @endif
                    @if ($kader->daerah && $kader->cabang && $kader->ranting)
                      <p class="mb-0">
                        <i class="fas fa-user"></i><span class="mx-3">Kader - Ranting
                          {{ $kader->ranting->nama_ranting }}
                        </span>
                      </p>
                    @endif
                    @if (!$kader->kader_memiliki_jabatan->isEmpty())
                      <p class="mb-0">
                        <i class="fas fa-user-tag"></i>
                        <span class="mx-2">Jabatan -
                          {{ DB::table('jabatan')->where('id_jabatan', $kader->kader_memiliki_jabatan->first()->jabatan_id_jabatan)->first()->nama_jabatan }}
                        </span>
                      </p>
                    @endif
                    <p class="mb-0">
                      <i class="fas fa-phone"></i><span class="mx-3">{{ $kader->no_ponsel }}</span>
                    </p>
                    @if ($kader->email)
                      <p class="mb-0">
                        <i class="fas fa-envelope"></i><span class="mx-3">{{ $kader->email }}</span>
                      </p>
                    @endif
                    <div class="buttons mt-2">
                      <a href="/upload/foto" class="btn btn-icon icon-left btn-primary"><i class="fas fa-upload"></i>
                        Upload Image</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Nomer Induk Kependudukan</b></p>
                  <p class="lh-none">{{ $kader->nik }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>KTA Aisyiyah</b></p>
                  <p class="lh-none">{{ $kader->no_kta ? $kader->no_kta : '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>KTA Muhammadiyah</b></p>
                  <p class="lh-none">{{ $kader->no_ktm ? $kader->no_ktm : '-' }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Tempat Tanggal Lahir</b></p>
                  @php
                    $tempat_lahir = $kader->tempat_lahir;
                    $tanggal_lahir = Str::of($kader->tanggal_lahir)
                        ->explode('-')
                        ->reverse()
                        ->join('-');
                    $tempat_tanggal_lahir = $tempat_lahir . ', ' . $tanggal_lahir;
                  @endphp
                  <p class="lh-none">{{ $tempat_tanggal_lahir ?? '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Alamat Asal (KTP)</b></p>
                  <p class="lh-none">{{ $kader->alamat_asal_ktp ?? '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Alamat Rumah Tinggal</b></p>
                  <p class="lh-none">{{ $kader->alamat_rumah_tinggal ?? '-' }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Status Pernikahan</b></p>
                  <p class="lh-none">{{ $kader->status_pernikahan ?? '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Pekerjaan</b></p>
                  <p class="lh-none">{{ $kader->pekerjaan ?? '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Pendidikan Terkahir</b></p>
                  <p class="lh-none">{{ $kader->pendidikan_terakhir->pendidikan ?? '-' }}</p>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-12">
                  <a href="/profil" class="btn btn-icon rounded-pill icon-left btn-warning btn-width mx-auto"><i
                      class="fas fa-edit"></i>Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
