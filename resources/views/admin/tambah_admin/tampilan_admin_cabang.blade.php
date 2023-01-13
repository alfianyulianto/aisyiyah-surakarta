@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Ranting</h4>
            </div>
            <div class="card-body">
              <table class="table table-hover table-responsive" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">Nama Ranting</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ranting as $r)
                    <tr>
                      <td>{{ $r->nama_ranting }}</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
                          Admin</a>
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
  </section>
@endsection
