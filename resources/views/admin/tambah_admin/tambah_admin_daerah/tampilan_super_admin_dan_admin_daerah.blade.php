@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tambah Admin Daerah</h4>
            </div>
            <div class="card-body">
              @if (session('message_admin_daerah'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="right">{{ session('message_admin_daerah') }}</marquee>
                  </div>
                </div>
              @endif
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
                      {{ DB::table('users')->where('kategori_user_id', 3)->where('admin_at', $daerah->id_daerah)->count() ?? 0 }}
                    </td>
                    <td>
                      <a href="/admin/daerah/{{ $daerah->id_daerah }}" target="_blank"
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
              @if (session('message_admin_ranting'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="right">{{ session('message_admin_ranting') }}</marquee>
                  </div>
                </div>
              @endif
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
                      <td class="text-center">
                        {{ DB::table('users')->where('kategori_user_id', 5)->where('admin_at', $r->id_ranting)->count() ?? 0 }}
                      </td>
                      <td>
                        <a href="/admin/ranting/{{ $r->id_ranting }}" target="_blank"
                          class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
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
              @if (session('message_admin_cabang'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="right">{{ session('message_admin_cabang') }}</marquee>
                  </div>
                </div>
              @endif
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
                      <td class="text-center">
                        {{ DB::table('users')->where('kategori_user_id', 4)->where('admin_at', $c->id_cabang)->count() ?? 0 }}
                      </td>
                      <td>
                        <a href="/admin/cabang/{{ $c->id_cabang }}" target="_blank"
                          class="btn btn-icon icon-left btn-success"><i class="fas fa-user-plus"></i>
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
