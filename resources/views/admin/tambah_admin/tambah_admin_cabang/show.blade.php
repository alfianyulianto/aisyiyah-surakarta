{{-- @dd($kader->kader_mimiliki_potensi); --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Profil Kader {{ $kader->nama }}</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3 pr-0">
                <div class="col-lg-3 mb-3">
                  <img src="{{ asset('storage/' . $kader->foto) }}" class="rounded mx-auto d-block" alt=""
                    width="170">
                </div>
                <div class="col-lg-9">
                  <div class="d-inline py-3">
                    <p class="mb-0 px-0 text-primary" style="font-size: 20px; font-weight: bold; line-height: 28px">
                      <b class="text-uppercase">{{ $kader->nama }}</b>
                      @php
                        $admin_at = DB::table('users')
                            ->where('kader_nik', $kader->nik)
                            ->first()->admin_at;
                        $kategori_user_id = DB::table('users')
                            ->where('kader_nik', $kader->nik)
                            ->first()->kategori_user_id;
                      @endphp
                      @if ($kategori_user_id == 2)
                        <b>{{ $admin_at ? '(Super Admin)' : '' }}</b>
                      @endif
                      @if ($kategori_user_id == 3)
                        <b>{{ $admin_at ? '(Admin Daerah)' : '' }}</b>
                      @endif
                      @if ($kategori_user_id == 4)
                        <b>{{ $admin_at? '(Admin Cabang ' .DB::table('cabang')->where('id_cabang', $admin_at)->first()->nama_cabang .')': '' }}</b>
                      @endif
                      @if ($kategori_user_id == 5)
                        <b>{{ $admin_at? '(Admin Ranting ' .DB::table('ranting')->where('id_ranting', $admin_at)->first()->nama_ranting .')': '' }}</b>
                      @endif
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
                    <p class="mb-0">
                      <i class="fas fa-phone"></i><span class="mx-3">{{ $kader->no_ponsel }}</span>
                    </p>
                    @if ($kader->email)
                      <p class="mb-0">
                        <i class="fas fa-envelope"></i><span class="mx-3">{{ $kader->email }}</span>
                      </p>
                    @endif
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
                  <p class="lh-none">{{ $kader->no_kta ?? '-' }}</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>KTA Muhammadiyah</b></p>
                  <p class="lh-none">{{ $kader->no_ktm ?? '-' }}</p>
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
                  <form action="/admin/cabang/{{ $kader->nik }}/{{ $id_cabang }}" method="post"
                    class="d-inline-block btn-width">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="cabang" id="cabang" value="{{ $nama_cabang }}">
                    <button type="submit"
                      class="btn btn-icon rounded-pill icon-left btn-danger delete-cabang btn-width mx-auto"><i
                        class="far fa-trash-alt"></i>Hapus Admin</button>
                  </form>
                </div>
              </div>
              @if (!$kader->kader_memiliki_jabatan->isEmpty())
                <div class="row mt-5">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="scroll-x">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Periode</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($kader->kader_memiliki_jabatan as $kj)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>
                                {{ DB::table('jabatan')->where('id_jabatan', $kj->jabatan_id_jabatan)->first()->nama_jabatan }}
                              </td>
                              <td>{{ $kj->periode }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endif
              @if (!$kader->kader_memiliki_ortom->isEmpty())
                <div class="row mt-4">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="scroll-x">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="text-center">Ortom</th>
                            <th class="text-center">Uraian Ortom</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($kader->kader_memiliki_ortom as $ko)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>{{ DB::table('ortom')->where('id_ortom', $ko->ortom_id_ortom)->first()->nama_ortom }}
                              </td>
                              <td>{!! $ko->ortom_uraian !!}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endif
              @if (!$kader->kader_mimiliki_potensi->isEmpty())
                <div class="row mt-4">
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="scroll-x">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="text-center">Potensi</th>
                            <th class="text-center">Uraian Potensi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($kader->kader_mimiliki_potensi as $ko)
                            <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>
                                {{ DB::table('potensi')->where('id_potensi', $ko->potensi_id_potensi)->first()->potensi }}
                              </td>
                              <td>{!! $ko->potensi_kader_uraian !!}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-admin.js"></script>
@endsection
