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
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Ortom</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tapak Suci Putra Muhammadiyah</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-warning">Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Tapak Suci Putra Muhammadiyah</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-warning">Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Tapak Suci Putra Muhammadiyah</td>
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
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Jenis Potensi Kader</h4>
            </div>
            <div class="card-body">
              <form action="/settings/potensi" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="potensi_kader" class="form-label"><b>Jenis Potensi Kader</b></label>
                          <input type="text" class="form-control @error('potensi_kader') is-invalid @enderror"
                            name="potensi_kader" id="potensi_kader"
                            placeholder="Masukan Potensi Kader (cnth:Bidang Pendidikan)">
                          @error('potensi_kader')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Ranting</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Ortom</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Bidang Pendidikan</td>
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
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Pekerjaan</h4>
            </div>
            <div class="card-body">
              <form action="/settings/pekerjaan" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_pekerjaan" class="form-label"><b>Nama Pekerjaan</b></label>
                          <input type="text" class="form-control @error('nama_pekerjaan') is-invalid @enderror"
                            name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Masukan Nama Pekerjaan">
                          @error('nama_pekerjaan')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Nama Pekerjaan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Guru Sekolah Menengah Pertama</td>
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
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Periode</h4>
            </div>
            <div class="card-body">
              <form action="/settings/periode" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group mb-3">
                          <label>Awal Periode</label>
                          <input type="text" class="form-control @error('awal_periode') is-invalid @enderror"
                            name="awal_periode" id="awal_periode" value="Masukan Awal Periode (cnth:2022)">
                          @error('awal_periode')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group mb-3">
                          <label>Akhir Periode</label>
                          <input type="text" class="form-control @error('akhir_periode') is-invalid @enderror"
                            name="akhir_periode" id="akhir_periode" value="Masukan Akhir Periode (cnth:2027)">
                          @error('akhir_periode')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>Awal Periode</th>
                      <th>Akhir Periode</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01-1-2023</td>
                      <td>31-12-2024</td>
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
