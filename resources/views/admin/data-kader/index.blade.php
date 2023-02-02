@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Profile Kader 'Aisyiyah</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_kader'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_kader') }}
                  </div>
                </div>
              @endif
              <a href="/data/kader/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Kader</a>
              <div class="mb-3">
                <a href="/kader/export" class="btn btn-icon icon-left btn-warning mb-3"><i class='fas fa-file-excel'></i>
                  Export Excel</a>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-profil-kader">
                  <thead>
                    <tr>
                      <th class="text-center align-top">
                        #
                      </th>
                      <th class="text-center align-top">NIK</th>
                      <th class="text-center align-top">No KTA Aisyiyah</th>
                      <th class="text-center align-top">No KTA Muhammadiyah</th>
                      <th class="text-center align-top">Nama</th>
                      <th class="text-center align-top">Cabang</th>
                      <th class="text-center align-top">Ranting</th>
                      <th class="text-center align-top">Tempat Tanggal Lahir</th>
                      <th class="text-center align-top">Alamat Rumah (Tinggal)</th>
                      <th class="text-center align-top">Nomer Handphone</th>
                      <th class="text-center align-top">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kader as $k)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nik }}</td>
                        <td>{{ $k->no_kta ?? '-' }}</td>
                        <td>{{ $k->no_ktm ?? '-' }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->cabang->nama_cabang ?? '-' }}</td>
                        <td>{{ $k->ranting->nama_ranting ?? '-' }}</td>
                        @php
                          $tempat_lahir = $k->tempat_lahir;
                          $tanggal_lahir = Str::of($k->tanggal_lahir)
                              ->explode('-')
                              ->reverse()
                              ->join('-');
                          $tempat_tanggal_lahir = $tempat_lahir . ', ' . $tanggal_lahir;
                        @endphp
                        <td>{{ $tempat_tanggal_lahir ?? '-' }}</td>
                        <td>{{ $k->alamat_rumah_tinggal ?? '-' }}</td>
                        <td>{{ $k->no_ponsel }}</td>
                        <td>
                          <a href="/data/kader/{{ $k->nik }}" class="btn btn-icon icon-left btn-primary"
                            target="_blank"><i class="far fa-eye"></i>
                            Detail</a>
                          <a href="/data/kader/{{ $k->nik }}/edit" class="btn btn-icon icon-left btn-warning"><i
                              class="far fa-edit"></i>
                            Edit</a>
                          <form action="/data/kader/{{ $k->nik }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-icon icon-left btn-danger"><i
                                class="far fa-trash-alt"></i>
                              Hapus</button>
                          </form>
                        </td>
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
