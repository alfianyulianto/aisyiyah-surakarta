@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Settings</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Daerah</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Daerah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Kota Surakarta</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Ranting</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Ranting</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Pajang</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sondakan</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Laweyan</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Baron</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Cabang</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Cabang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Laweyan</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Banjarsari</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Kerten</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success">Admin</a>
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
