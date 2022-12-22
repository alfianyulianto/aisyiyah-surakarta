@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Cabang Aisyiyah Surakarta</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <a href="/data/cabang/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Cabang</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Cabang</th>
                      <th>Alamat Cabang</th>
                      <th>SK Pimpinan Cabang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Nama Cabang</td>
                      <td>Alamat Cabang</td>
                      <td>SK Pimpinan Cabang</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-warning">Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger">Hapus</a>
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
