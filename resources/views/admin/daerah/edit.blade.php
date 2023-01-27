{{-- @dd(old('sk_pimp_cabang')) --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Edit Daerah </h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/data/daerah/{{ $daerah->id_daerah }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_daerah" class="form-label"><b>Id Daerah</b></label>
                          <input type="text" class="form-control" name="id_daerah" id="id_daerah"
                            value="{{ old('id_daerah', $daerah->id_daerah) }}" readonly>
                          @error('id_daerah')
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
                          <label for="nama_daerah" class="form-label"><b>Nama Daerah</b></label>
                          <input type="text" class="form-control" name="nama_daerah" id="nama_daerah"
                            placeholder="Masukan Nama Daerah (cnth: Kota Surakarta)"
                            value="{{ old('nama_daerah', $daerah->nama_daerah) }}" autofocus>
                          <div class="error-message">
                            @error('nama_daerah')
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
                          <label for="alamat_daerah" class="form-label"><b>Alamat Daerah</b></label>
                          <input type="text" class="form-control" name="alamat_daerah" id="alamat_daerah"
                            placeholder="Masukan Alamat Cabang"
                            value="{{ old('alamat_daerah', $daerah->alamat_daerah) }}">
                          <div class="error-message">
                            @error('alamat_daerah')
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
                          <label for="sk_pimp_daerah" class="form-label">
                            <b>SK Pimpinan Daerah @error('sk_pimp_daerah')
                                <div class="text-danger d-inline error-message">*Silahkan upload ulang</div>
                              @enderror
                            </b>
                          </label>
                          <small class="d-block mt-0 mb-2" style="font-size:13px;">Pastikan file yang diupload dalam
                            bentuk PDF</small>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="sk_pimp_daerah" id="sk_pimp_daerah">
                            <label class="custom-file-label" for="sk_pimp_daerah">Choose file</label>
                          </div>
                          <div class="error-message">
                            @error('sk_pimp_daerah')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Update Daerah</button>
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
    $('#sk_pimp_daerah').on('change', function(e) {
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
@endsection
