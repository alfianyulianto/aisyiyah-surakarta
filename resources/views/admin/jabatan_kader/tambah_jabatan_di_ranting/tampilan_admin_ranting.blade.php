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
                        <a href="/jabatan/kader/ranting/{{ $r->id_ranting }}" target="_blank"
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
      </div>
    </div>
  </section>
@endsection
