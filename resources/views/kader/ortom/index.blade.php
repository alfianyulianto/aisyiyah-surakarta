@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Ortom Yang Di Ikuti</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_ortom_kader'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_ortom_kader') }}
                  </div>
                </div>
              @endif
              <a href="/kader/ortom/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Kegiatan Ortom</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-ortom-kader">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th class="text-center">Nama Ortom</th>
                      <th class="text-center">Uraian Ortom</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ortom as $o)
                      <tr>
                        <td class="text-center">
                          {{ $loop->iteration }}
                        </td>
                        <td>{{ $o->ortom->nama_ortom }}</td>
                        <td>{!! $o->ortom_uraian !!}</td>
                        <td>
                          <a href="/kader/ortom/{{ $o->id_kader_has_ortom }}"
                            class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit
                          </a>
                          <form action="/kader/ortom/{{ $o->id_kader_has_ortom }}" method="post" class="d-inline-block">
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
