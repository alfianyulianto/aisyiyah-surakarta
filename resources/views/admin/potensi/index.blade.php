@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Potensi Yang Dimiliki Setiap Kader</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_potensi_kader_admin'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_potensi_kader_admin') }}
                  </div>
                </div>
              @endif
              <a href="/data/potensi/kader/export" class="btn btn-icon icon-left btn-warning mb-3"><i
                  class='fas fa-file-excel'></i>
                Export Excel</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-data-potensi-kader">
                  <thead>
                    <tr>
                      <th class="text-center align-top">
                        #
                      </th>
                      <th class="text-center align-top">NIK</th>
                      <th class="text-center">No KTA Aisyiyah</th>
                      <th class="text-center">No KTA Muhammadiyah</th>
                      <th class="text-center align-top">Cabang</th>
                      <th class="text-center align-top">Ranting</th>
                      <th class="text-center align-top">Nama</th>
                      <th class="text-center align-top">Potensi</th>
                      <th class="text-center align-top">Uraian Potensi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kader_potensi as $kp)
                      <tr>
                        <td class="text-center">
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $kp->kader_nik }}</td>
                        <td>{{ $kp->kader->no_kta }}</td>
                        <td>{{ $kp->kader->no_ktm }}</td>
                        <td>
                          {{ DB::table('cabang')->where('id_cabang', $kp->kader->cabang_id_cabang)->first()->nama_cabang }}
                        </td>
                        <td>
                          {{ DB::table('ranting')->where('id_ranting', $kp->kader->ranting_id_ranting)->first()->nama_ranting }}
                        </td>
                        <td>{{ $kp->kader->nama }}</td>
                        <td>{{ $kp->potensi->potensi }}</td>
                        <td>{!! $kp->potensi_kader_uraian !!}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
