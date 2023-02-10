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
                        {{ DB::table('users')->where('kategori_user_id', 5)->where('admin_at', $c->id_ranting)->count() ?? 0 }}
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
      </div>
    </div>
  </section>
@endsection
