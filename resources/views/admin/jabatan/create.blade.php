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
                  <form action="/data/jabatan" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_jabatan" class="form-label"><b>Id Jabatan</b></label>
                          <input type="text" class="form-control" name="id_jabatan" id="id_jabatan"
                            value="{{ 'jbtn-' . Str::lower(Str::random(15)) }}" readonly>
                          @error('id_jabatan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_jabatan" class="form-label"><b>Nama Jabatan</b></label>
                          <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan"
                            placeholder="Masukan nama jabatan">
                          @error('nama_jabatan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="multiple_kader" class="form-label"><b>Jumlah Kader di Jabatan</b></label>
                          <div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="multiple_kader"
                                class="custom-control-input" value="false">
                              <label class="custom-control-label" for="customRadioInline1">Satu orang kader</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="multiple_kader"
                                class="custom-control-input" value="true">
                              <label class="custom-control-label" for="customRadioInline2">Lebih dari satu orang
                                kader (e.g: 2, 3, 4, dst)</label>
                            </div>
                          </div>
                          @error('multiple_kader')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Jabatan</button>
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
