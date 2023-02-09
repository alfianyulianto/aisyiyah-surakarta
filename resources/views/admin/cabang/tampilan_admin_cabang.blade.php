@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Pimpinan Cabang {{ $nama_cabang }} Kota Surakarta</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_cabang'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_cabang') }}
                  </div>
                </div>
              @endif
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-cabang">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th class="text-center">Nama Cabang</th>
                      <th class="text-center">Alamat Cabang</th>
                      <th class="text-center">SK Pimpinan Cabang</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cabang as $c)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $c->nama_cabang }}</td>
                        <td>{{ $c->alamat_cabang }}</td>
                        <td>
                          <a href="/sk/pimpinan/cabang/{{ $c->id_cabang }}" class="text-decoration-none">
                            <div class="border border-info btn-outline-info text-info rounded-pill text-center py-1">
                              <i class="fas fa-download"></i> download
                            </div>
                          </a>
                        </td>
                        <td>
                          <a href="/data/cabang/{{ $c->id_cabang }}/edit" class="btn btn-icon icon-left btn-warning"><i
                              class="far fa-edit"></i>
                            Edit</a>
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
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-cabang.js"></script>
@endsection
