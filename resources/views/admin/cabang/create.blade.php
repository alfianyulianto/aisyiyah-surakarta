{{-- @dd(old('sk_pimp_cabang')) --}}
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
                          <input type="text" class="form-control" name="id_cabang" id="id_cabang"
                            value="{{ 'cbng-' . Str::lower(Str::random(8)) }}" readonly>
                          @error('id_cabang')
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
                          <label for="nama_cabang" class="form-label"><b>Nama Cabang</b></label>
                          <input type="text" class="form-control" name="nama_cabang" id="nama_cabang"
                            placeholder="Masukan Nama Cabang (cnth: Laweyan)" value="{{ old('nama_cabang') }}" autofocus>
                          <div class="error-message">
                            @error('nama_cabang')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_cabang" class="form-label"><b>Alamat Cabang</b></label>
                          <input type="text" class="form-control" name="alamat_cabang" id="alamat_cabang"
                            placeholder="Masukan Alamat Cabang" value="{{ old('alamat_cabang') }}">
                          <div class="error-message">
                            @error('alamat_cabang')
                              <div class="error-message">
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
  <script>
    $('#sk_pimp_cabang').on('change', function(e) {
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
@endsection
