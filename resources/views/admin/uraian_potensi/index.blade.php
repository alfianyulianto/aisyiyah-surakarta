@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Potensi Yang Dimiliki</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_potensi_admin'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_potensi_admin') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_potensi_admin'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_potensi_admin') }}
                  </div>
                </div>
              @endif
              <a href="/admin/potensi/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Potensi Yang Dimiliki</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-potensi-kader">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th class="text-center">Nama Potensi</th>
                      <th class="text-center">Uraian Potensi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($potensi as $p)
                      <tr>
                        <td class="text-center">
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $p->potensi->potensi }}</td>
                        <td>{!! $p->potensi_kader_uraian !!}</td>
                        <td>
                          <a href="/admin/potensi/{{ $p->id_kader_has_potensi }}/edit"
                            class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                            Edit</a>
                          <form action="/admin/potensi/{{ $p->id_kader_has_potensi }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-icon icon-left btn-danger delete"><i
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
  <script src="{{ url('') }}/js/sweetalert/sweetalert-kader-potensi.js"></script>
@endsection
