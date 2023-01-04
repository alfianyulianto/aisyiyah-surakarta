@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Cabang 'Aisyiyah Kota Surakarta</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <a href="/data/cabang/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Cabang</a>
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
                        <td>{{ $c->sk_pimp_cabang }}</td>
                        <td>
                          <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                            Edit</a>
                          <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                            Hapus</a>
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
