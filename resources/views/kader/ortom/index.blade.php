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
              <a href="/kader/ortom/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Kegiatan Ortom</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-ortom">
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
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Ikatan Mahasiswa Muhammadiyah</td>
                      <td>Ketua IMM Adam Malik FKI UMS periode 2020</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
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
