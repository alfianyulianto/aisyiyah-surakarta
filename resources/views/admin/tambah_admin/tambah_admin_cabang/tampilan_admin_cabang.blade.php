@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin Cabang</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Cabang</h4>
            </div>
            @if (session('message_admin_cabang'))
              <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  {{ session('message_admin_daerah') }}
                </div>
              </div>
            @endif
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-admin-daerah">
                <thead>
                  <tr>
                    <th>Nama Daerah</th>
                    <th>Total Admin</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $daerah->nama_daerah }}</td>
                    <td class="text-center">
                      {{ DB::table('users')->where('admin_at', $daerah->id_daerah)->count() ?? 0 }}</td>
                    <td>
                      <a href="/tambah/admin/daerah/{{ $daerah->id_daerah }}"
                        class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
                        Admin</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Ranting</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-admin-ranting">
                <thead>
                  <tr>
                    <th>Nama Ranting</th>
                    <th>Total Admin</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ranting as $r)
                    <tr>
                      <td>{{ $r->nama_ranting }}</td>
                      <td class="text-center">{{ DB::table('users')->where('admin_at', $r->id_ranting)->count() ?? 0 }}
                      </td>
                      <td>
                        <a href="/tambah/admin/ranting/{{ $r->id_ranting }}" class="btn btn-icon icon-left btn-success"><i
                            class="fas fa-user-plus"></i>
                          Admin</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Cabang</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tambah-admin-cabang">
                <thead>
                  <tr>
                    <th>Nama Cabang</th>
                    <th>
                      Total Admin
                    </th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cabang as $c)
                    <tr>
                      <td>{{ $c->nama_cabang }}</td>
                      <td class="text-center">{{ DB::table('users')->where('admin_at', $c->id_cabang)->count() ?? 0 }}
                      </td>
                      <td>
                        <a href="/tambah/admin/cabang/{{ $c->id_cabang }}" class="btn btn-icon icon-left btn-success"><i
                            class="fas fa-user-plus"></i>
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
