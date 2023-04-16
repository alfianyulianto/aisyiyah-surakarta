@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Ranting Cabang {{ $nama_cabang }} Pimpinan Daerah Aisyiyah Kota Surakarta</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_ranting'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_ranting') }}
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
                      <th class="text-center">Nama Ranting</th>
                      <th class="text-center">Alamat Ranting</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ranting as $r)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $r->nama_ranting }}</td>
                        <td>{{ $r->alamat_ranting }}</td>
                        <td>
                          <a href="/data/ranting/{{ $r->id_ranting }}" class="btn btn-icon icon-left btn-info"><i
                              class="fas fa-file-pdf"></i> sk pimpinan
                          </a>
                          <a href="/data/ranting/{{ $r->id_ranting }}/edit" class="btn btn-icon icon-left btn-warning"><i
                              class="far fa-edit"></i> Edit
                          </a>
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
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-ranting.js"></script>
@endsection
