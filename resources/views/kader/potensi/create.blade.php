@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Potensi Yang Dimiliki</h1>
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
                          <label for="id_cabang" class="form-label"><b>Id Ortom</b></label>
                          <input type="text" class="form-control" name="id_cabang" id="id_cabang"
                            value="{{ 'ORTM-' . Str::lower(Str::random(4)) }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="status_pernikahan" class="form-label"><b>Nama Potensi</b></label>
                          <select class="form-control form-control-lg select2">
                            <option selected disabled>-- Pilih Potensi --</option>
                            <option value="Bidang Pendidiakn">Bidang Pendidiakn</option>
                            <option value="Bidang Kesehatan">Bidang Kesehatan</option>
                            <option value="Bidang Dakwah">Bidang Dakwah</option>
                            <option value="Bidang Ekonomi">Bidang Ekonomi</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <textarea id="summernote" name="editordata" style="height: 1876px"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Potensi</button>
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
