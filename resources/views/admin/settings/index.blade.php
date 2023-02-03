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
              <h4 class="text-center">Organisasi Otonom Muhammadiyah</h4>
            </div>
            <div class="card-body">
              @if (session('message_ortom'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_ortom') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_ortom'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_ortom') }}
                  </div>
                </div>
              @endif
              <a href="/ortom/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Ortom</a>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-ortom">
                <thead>
                  <tr>
                    <th>Nama Ortom</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ortom as $o)
                    <tr>
                      <td>{{ $o->nama_ortom }}</td>
                      <td>
                        <a href="/ortom/{{ $o->id_ortom }}/edit" class="btn btn-icon icon-left btn-warning"><i
                            class="far fa-edit"></i>
                          Edit</a>
                        <form action="/ortom/{{ $o->id_ortom }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-icon icon-left btn-danger delete-ortom"><i
                              class="far fa-trash-alt"></i>
                            Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tempat Lahir</h4>
            </div>
            <div class="card-body">
              @if (session('message_tempat_lahir'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_tempat_lahir') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_tempat_lahir'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_tempat_lahir') }}
                  </div>
                </div>
              @endif
              <a href="/tempat/lahir/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Tempat Lahir</a>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tempat_lahir">
                <thead>
                  <tr>
                    <th>Tempat Lahir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tempat_lahir as $tl)
                    <tr>
                      <td>{{ $tl->tempat_lahir }}</td>
                      <td>
                        <a href="/tempat/lahir/{{ $tl->id_tempat_lahir }}/edit"
                          class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <form action="/tempat/lahir/{{ $tl->id_tempat_lahir }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-icon icon-left btn-danger delete-tempat_lahir"><i
                              class="far fa-trash-alt"></i>
                            Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card" id="card-periode">
            <div class="card-header">
              <h4 class="text-center">Periode</h4>
            </div>
            <div class="card-body">
              @if (session('message_periode'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_periode') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_periode'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_periode') }}
                  </div>
                </div>
              @endif
              <a href="/periode/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Periode</a>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-periode">
                <thead>
                  <tr>
                    <th>Periode</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($periode as $prd)
                    <tr>
                      <td>{{ $prd->periode }}</td>
                      <td>
                        <a href="/periode/{{ $prd->id_periode }}/edit" class="btn btn-icon icon-left btn-warning"><i
                            class="far fa-edit"></i>
                          Edit</a>
                        <form action="/periode/{{ $prd->id_periode }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-icon icon-left btn-danger delete-periode"><i
                              class="far fa-trash-alt"></i>
                            Hapus</button>
                        </form>
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
              <h4 class="text-center">Jenis Potensi Kader</h4>
            </div>
            <div class="card-body">
              @if (session('message_potensi'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_potensi') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_potensi'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_potensi') }}
                  </div>
                </div>
              @endif
              <a href="/potensi/create" class="btn btn-icon icon-left btn-primary mb-3"><i class="fas fa-user-plus"></i>
                Tambah Potensi</a>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-potensi">
                <thead>
                  <tr>
                    <th>Nama Potensi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($potensi as $p)
                    <tr>
                      <td>{{ $p->potensi }}</td>
                      <td>
                        <a href="/potensi/{{ $p->id_potensi }}/edit" class="btn btn-icon icon-left btn-warning"><i
                            class="far fa-edit"></i>
                          Edit</a>
                        <form action="/potensi/{{ $p->id_potensi }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-icon icon-left btn-danger delete-potensi"><i
                              class="far fa-trash-alt"></i>
                            Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Pekerjaan</h4>
            </div>
            <div class="card-body">
              @if (session('message_pekerjaan'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_pekerjaan') }}
                  </div>
                </div>
              @endif
              @if (session('message_delete_pekerjaan'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_delete_pekerjaan') }}
                  </div>
                </div>
              @endif
              <a href="/pekerjaan/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Pekerjaan</a>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-pekerjaan">
                <thead>
                  <tr>
                    <th>Nama Pekerjaan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pekerjaan as $pkrjn)
                    <tr>
                      <td>{{ $pkrjn->pekerjaan }}</td>
                      <td>
                        <a href="/pekerjaan/{{ $pkrjn->id_pekerjaan }}/edit"
                          class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <form action="/pekerjaan/{{ $pkrjn->id_pekerjaan }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-icon icon-left btn-danger delete-pekerjaan"><i
                              class="far fa-trash-alt"></i>
                            Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script src="{{ url('') }}/js/sweetalert/sweetalert-admin-settings.js"></script>
@endsection
