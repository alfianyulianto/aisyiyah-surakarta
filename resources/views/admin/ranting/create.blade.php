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
                          <input type="text" class="form-control" name="id_ranting" id="id_ranting"
                            value="{{ 'rntng-' . Str::lower(Str::random(15)) }}" readonly>
                          @error('id_ranting')
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
                          <label for="cabang_id_cabang" class="form-label"><b>Cabang Aisyiyah</b></label>
                          <select class="form-control form-control-lg select2" name="cabang_id_cabang"
                            id="cabang_id_cabang">
                            @if (old('cabang_id_cabang'))
                              <option disabled>-- Pilih Cabang --</option>
                              @foreach ($cabang as $c)
                                @if (old('cabang_id_cabang') == $c->id_cabang)
                                  <option value="{{ $c->id_cabang }}" selected>{{ $c->nama_cabang }}</option>
                                @else
                                  <option value="{{ $c->id_cabang }}">{{ $c->nama_cabang }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Cabang --</option>
                              @foreach ($cabang as $c)
                                <option value="{{ $c->id_cabang }}">{{ $c->nama_cabang }}</option>
                              @endforeach
                            @endif
                          </select>
                          @error('cabang_id_cabang')
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
                          <label for="nama_ranting" class="form-label"><b>Nama Ranting</b></label>
                          <input type="text" class="form-control" name="nama_ranting" id="nama_ranting"
                            placeholder="Masukan Nama Ranting (cnth: Pajang)" value="{{ old('nama_ranting') }}" autofocus>
                          @error('nama_ranting')
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
                          <label for="alamat_ranting" class="form-label"><b>Alamat Ranting</b></label>
                          <input type="text" class="form-control" name="alamat_ranting" id="alamat_ranting"
                            placeholder="Masukan Alamat Ranting" value="{{ old('alamat_ranting') }}">
                          @error('alamat_ranting')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
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
  <script>
    $('#sk_pimp_ranting').on('change', function(e) {
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
@endsection
