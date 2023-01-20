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
              <form action="/settings/ortom" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_ortom" class="form-label"><b>Nama Ortom</b></label>
                          <input type="text" class="form-control" name="nama_ortom" id="nama_ortom"
                            placeholder="Masukan Nama Ortom">
                          @error('nama_ortom')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Ortom</button>
                    </div>
                  </div>
                </div>
              </form>
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
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
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
              <form action="/settings/tempat/lahir" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            placeholder="Masukan Nama Kota (cnth:Surakarta)">
                          @error('tempat_lahir')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Tempat Lahir</button>
                    </div>
                  </div>
                </div>
              </form>
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
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
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
              <form action="/settings/periode" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="periode" class="form-label"><b>Periode</b></label>
                          <input type="text" class="form-control" name="periode" id="periode"
                            placeholder="Masukan Periode (cnth:{{ $last_periode->periode }})">
                          @error('periode')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Periode</button>
                    </div>
                  </div>
                </div>
              </form>
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
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
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
              <form action="/settings/potensi" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="potensi" class="form-label"><b>Jenis Potensi Kader</b></label>
                          <input type="text" class="form-control" name="potensi" id="potensi"
                            placeholder="Masukan Potensi Kader (cnth:Bidang Pendidikan)">
                          @error('potensi')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Potensi</button>
                    </div>
                  </div>
                </div>
              </form>
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
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
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
              <form action="/settings/pekerjaan" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                            placeholder="Masukan Nama Pekerjaan (cnth:Mahasiswa)">
                          @error('pekerjaan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Pekerjaan</button>
                    </div>
                  </div>
                </div>
              </form>
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
                        <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                          Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
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
@endsection
