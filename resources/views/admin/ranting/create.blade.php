@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Ranting</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/data/ranting" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_ranting" class="form-label"><b>Id Ranting</b></label>
                          <input type="text" class="form-control @error('id_ranting') is-invalid @enderror"
                            name="id_ranting" id="id_ranting" value="{{ 'Rntng-' . Str::lower(Str::random(4)) }}"
                            readonly>
                          @error('id_ranting')
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
                          <label for="nama_ranting" class="form-label"><b>Nama Ranting</b></label>
                          <input type="text" class="form-control @error('nama_ranting') is-invalid @enderror"
                            name="nama_ranting" id="nama_ranting" placeholder="Masukan Nama Ranting (cnth: Pajang)"
                            autofocus>
                          @error('nama_ranting')
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
                          <label for="alamat_ranting" class="form-label"><b>Alamat Ranting</b></label>
                          <input type="text" class="form-control @error('alamat_ranting') is-invalid @enderror"
                            name="alamat_ranting" id="alamat_ranting" placeholder="Masukan Alamat Ranting">
                          @error('alamat_ranting')
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
                          <label for="sk_pimp_ranting" class="form-label"><b>SK Pimpinan Ranting</b></label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('sk_pimp_ranting') is-invalid @enderror"
                              name="sk_pimp_ranting" id="sk_pimp_ranting">
                            <label class="custom-file-label" for="sk_pimp_ranting">Choose file</label>
                            @error('sk_pimp_ranting')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback" style="margin-top:11px">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Ranting</button>
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
