@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Ranting 'Aisyiyah Kota Surakarta</h1>
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
              @if (session('message_delete_ranting'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_ranting') }}
                  </div>
                </div>
              @endif
              <a href="/data/ranting/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Ranting</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-ranting">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th class="text-center">Nama Ranting</th>
                      <th class="text-center">Alamat Ranting</th>
                      <th class="text-center">SK Pimpinan Ranting</th>
                      <th class="text-center">Nama Cabang</th>
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
                          <a href="/sk/pimpinan/ranting/{{ $r->id_ranting }}" class="text-decoration-none">
                            <div class="border border-info btn-outline-info text-info rounded-pill text-center py-1">
                              <i class="fas fa-download"></i> download
                            </div>
                          </a>
                        </td>
                        <td>{{ $r->cabang->nama_cabang }}</td>
                        <td>
                          <a href="/data/ranting/{{ $r->id_ranting }}/edit" class="btn btn-icon icon-left btn-warning"><i
                              class="far fa-edit"></i> Edit
                          </a>
                          <form action="/data/ranting/{{ $r->id_ranting }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-icon icon-left btn-danger delete"><i
                                class="far fa-trash-alt"></i> Hapus</button>
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
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-ranting.js"></script>
@endsection
