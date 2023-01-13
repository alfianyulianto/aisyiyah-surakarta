@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Jabatan</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_jabatan" class="form-label"><b>Id Jabatan</b></label>
                          <input type="text" class="form-control" name="id_jabatan" id="id_jabatan"
                            value="{{ 'jbtn-' . Str::lower(Str::random(4)) }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_jabatan" class="form-label"><b>Nama Jabatan</b></label>
                          <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan"
                            placeholder="Masukan Nama Jabatan">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group mb-3">
                          <label for="periode" class="form-label"><b>Periode</b></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control daterange-cus" name="periode" id="periode">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
