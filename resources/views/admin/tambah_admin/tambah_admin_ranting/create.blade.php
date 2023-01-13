@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin Ranting</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="mb-3">
                          <label for="nama" class="form-label"><b>Nama - KTA Aisyiyah</b></label>
                          <select class="form-control form-control-lg select2" id="nama" name="nama">
                            <option selected disabled>-- Pilih Nama --</option>
                            <option value="Alfian Yulianto - 345678">Alfian Yulianto - 345678</option>
                            <option value="Budi Doremi - 456789">Budi Doremi - 456789</option>
                            <option value="David Widiyan - 567890">David Widiyan - 567890</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    - disini rencananya ketika Super Admin melakukan klik pada select option maka input yang ada di bawah
                    akan otomatis terisi
                    - lalu ketika Super Admin melakukan klik "Add" maka data akan tersimpan dan ditampilkan langsung di
                    table
                    - gunakan ajax
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="NIK" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_kta" class="form-label"><b>No KTA Aisyiyah</b></label>
                          <input type="text" class="form-control" name="no_kta" id="no_kta" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_ktm" class="form-label"><b>No KTA Muhammadiyah</b></label>
                          <input type="text" class="form-control" name="no_ktm" id="no_ktm" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="nama" class="form-label"><b>Nama Kader</b></label>
                          <input type="text" class="form-control" name="nama" id="nama" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Admin Ranting</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>No KTA Aisyiyah</th>
                      <th>No KTA Muhammadiyah</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Nomer Handphone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Alfian Yulianto</td>
                      <td>3372010107000002</td>
                      <td>345678</td>
                      <td>876543</td>
                      <td>Surakarta, 01 Juli 2000</td>
                      <td>081217432366</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-primary">Show</a>
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
