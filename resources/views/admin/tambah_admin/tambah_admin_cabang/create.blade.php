@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin Cabang {{ $nama_cabang }}</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_admin_cabang'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="left">{{ session('message_admin_cabang') }}</marquee>
                  </div>
                </div>
              @endif
              @if (session('message_delete_admin_cabang'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="left">{{ session('message_delete_admin_cabang') }}</marquee>
                  </div>
                </div>
              @endif
              <form action="/admin/cabang/{{ $id_cabang }}" method="post">
                @csrf
                <input type="hidden" name="cabang" id="cabang" value="{{ $nama_cabang }}">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="mb-3">
                          <label for="kader" class="form-label"><b>Nama - NIK</b></label>
                          <select class="form-control form-control-lg select2" id="kader" name="kader">
                            <option selected disabled>-- Pilih Nama --</option>
                            @if (!$kader->isEmpty())
                              @foreach ($kader as $k)
                                <option value="{{ $k->nik }}">{{ $k->nama }} - {{ $k->nik }}</option>
                              @endforeach
                            @else
                              <option disabled>Tidak Ada Data Kader di Cabang {{ $nama_cabang }}</option>
                            @endif
                          </select>
                          @error('kader')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="NIK" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik" readonly>
                          @error('nik')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_kta" class="form-label"><b>No KTA Aisyiyah</b></label>
                          <input type="text" class="form-control" name="no_kta" id="no_kta" readonly>
                          @error('no_kta')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_ktm" class="form-label"><b>No KTA Muhammadiyah</b></label>
                          <input type="text" class="form-control" name="no_ktm" id="no_ktm" readonly>
                          @error('no_ktm')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="nama" class="form-label"><b>Nama Kader</b></label>
                          <input type="text" class="form-control" name="nama" id="nama" readonly>
                          @error('nama')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Admin Cabang</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-tmbah-admin">
                  <thead>
                    <tr>
                      <th class="text-center align-top">#</th>
                      <th class="text-center align-top">Nama</th>
                      <th class="text-center align-top">NIK</th>
                      <th class="text-center">No KTA Aisyiyah</th>
                      <th class="text-center">No KTA Muhammadiyah</th>
                      <th class="text-center align-top">Tempat Tanggal Lahir</th>
                      <th class="text-center align-top">Nomer Handphone</th>
                      <th class="text-center align-top">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admin as $a)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->kader->nama }}</td>
                        <td>{{ $a->kader_nik }}</td>
                        <td>{{ $a->kader->no_kta }}</td>
                        <td>{{ $a->kader->no_ktm }}</td>
                        <td>{{ $a->kader->tempat_lahir }}, {{ $a->kader->tanggal_lahir }}</td>
                        <td>{{ $a->no_ponsel }}</td>
                        <td>
                          <a href="/data/admin/cabang/kader/{{ $a->kader_nik }}/{{ $id_cabang }}"
                            class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Show</a>
                          <form action="/admin/cabang/{{ $a->kader_nik }}/{{ $id_cabang }}" method="post"
                            class="d-inline-block">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="cabang" id="cabang" value="{{ $nama_cabang }}">
                            <button type="submit" class="btn btn-icon icon-left btn-danger delete-cabang"><i
                                class="far fa-trash-alt"></i>Hapus</button>
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
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-admin.js"></script>
@endsection
