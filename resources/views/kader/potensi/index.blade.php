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
              <a href="/kader/potensi/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Potensi Yang Dimiliki</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Potensi</th>
                      <th>Uraian Potensi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Bidang Kesehatan</td>
                      <td>Pernah menjadi dokter di RS. Moewardi Surakarta</td>
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
