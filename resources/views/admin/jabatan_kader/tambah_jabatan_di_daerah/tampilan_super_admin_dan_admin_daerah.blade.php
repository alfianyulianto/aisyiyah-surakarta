@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Jabatan Kader</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Pimpinan Daerah</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-pimpinan-daerah">
                <thead>
                  <tr>
                    <th>Nama Daerah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $daerah->nama_daerah }}</td>
                    <td>
                      <a href="/jabatan/kader/daerah/{{ $daerah->id_daerah }}" target="_blank"
                        class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
                        Pimpinan</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Pimpinan Ranting</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-pimpinan-ranting">
                <thead>
                  <tr>
                    <th>Nama Ranting</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ranting as $r)
                    <tr>
                      <td>{{ $r->nama_ranting }}</td>
                      <td>
                        <a href="/jabatan/kader/ranting/{{ $r->id_ranting }}"
                          class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
                          Pimpinan</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Pimpinan Cabang</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-pimpinan-cabang">
                <thead>
                  <tr>
                    <th>Nama Cabang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cabang as $c)
                    <tr>
                      <td>{{ $c->nama_cabang }}</td>
                      <td>
                        <a href="/jabatan/kader/cabang/{{ $c->id_cabang }}" class="btn btn-icon icon-left btn-success"><i
                            class="fas fa-user-plus"></i>
                          Pimpinan</a>
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
  </section>
@endsection
