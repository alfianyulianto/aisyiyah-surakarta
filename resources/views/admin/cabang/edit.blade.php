{{-- @dd(old('sk_pimp_cabang')) --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Edit Cabang </h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/data/cabang/{{ $cabang->id_cabang }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_cabang" class="form-label"><b>Id Cabang</b></label>
                          <input type="text" class="form-control" name="id_cabang" id="id_cabang"
                            value="{{ old('id_cabang', $cabang->id_cabang) }}" readonly>
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
                            placeholder="Masukan Nama Cabang (cnth: Laweyan)"
                            value="{{ old('nama_cabang', $cabang->nama_cabang) }}" autofocus>
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
                            placeholder="Masukan Alamat Cabang"
                            value="{{ old('alamat_cabang', $cabang->alamat_cabang) }}">
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
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="sk_pimp_cabang" class="form-label">
                            <b>SK Pimpinan Cabang @error('sk_pimp_cabang')
                                <div class="text-danger d-inline error-message">*Silahkan upload ulang</div>
                              @enderror
                            </b>
                          </label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="sk_pimp_cabang" id="sk_pimp_cabang">
                            <label class="custom-file-label" for="sk_pimp_cabang">Choose file</label>
                          </div>
                          <div class="error-message">
                            @error('sk_pimp_cabang')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Update Cabang</button>
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
