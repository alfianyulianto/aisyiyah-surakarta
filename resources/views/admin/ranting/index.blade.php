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
              <a href="/data/ranting/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
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
                      <th class="text-center">Cabang Ranting</th>
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
                        <td>{{ $r->sk_pimp_ranting }}</td>
                        <td>{{ $r->cabang->nama_cabang }}</td>
                        <td>
                          <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                            Edit</a>
                          <a href="" class="btn btn-icon icon-left btn-danger"><i
                              class="far fa-trash-alt"></i>Hapus</a>
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
