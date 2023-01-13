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
                          <input type="text" class="form-control @error('nama_ortom') is-invalid @enderror"
                            name="nama_ortom" id="nama_ortom" placeholder="Masukan Nama Ortom">
                          @error('nama_ortom')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                    <th>Action</th>
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
                          <input type="text" class="form-control @error('potensi') is-invalid @enderror" name="potensi"
                            id="potensi" placeholder="Masukan Potensi Kader (cnth:Bidang Pendidikan)">
                          @error('potensi')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
        </div>
      </div>
    </div>
  </section>
@endsection
