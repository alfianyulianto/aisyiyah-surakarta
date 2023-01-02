@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Cabang</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/data/cabang" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_cabang" class="form-label"><b>Id Cabang</b></label>
                          <input type="text" class="form-control @error('id_cabang') is-invalid @enderror"
                            name="id_cabang" id="id_cabang" value="{{ 'CBNG-' . Str::lower(Str::random(4)) }}" readonly>
                          @error('id_cabang')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_cabang" class="form-label"><b>Nama Cabang</b></label>
                          <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror"
                            name="nama_cabang" id="nama_cabang" placeholder="Masukan Nama Cabang (cnth: Laweyan)"
                            autofocus>
                          @error('nama_cabang')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_cabang" class="form-label"><b>Alamat Cabang</b></label>
                          <input type="text" class="form-control @error('alamat_cabang') is-invalid @enderror"
                            name="alamat_cabang" id="alamat_cabang" placeholder="Masukan Alamat Cabang">
                          @error('alamat_cabang')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="sk_pimp_cabang" class="form-label"><b>SK Pimpinan Cabang</b></label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('sk_pimp_cabang') is-invalid @enderror"
                              name="sk_pimp_cabang" id="sk_pimp_cabang">
                            <label class="custom-file-label" for="sk_pimp_cabang">Choose file</label>
                            @error('sk_pimp_cabang')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback" style="margin-top:11px">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Cabang</button>
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
