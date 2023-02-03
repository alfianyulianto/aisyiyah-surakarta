@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Update Organisasi Otonom Muhammadiyah</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/ortom/{{ $ortom->id_ortom }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_ortom" class="form-label"><b>Id Ortom</b></label>
                          <input type="text" class="form-control" name="id_ortom" id="id_ortom"
                            value="{{ old('id_ortom', $ortom->id_ortom) }}" readonly>
                          @error('id_ortom')
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
                          <label for="nama_ortom" class="form-label"><b>Nama Ortom</b></label>
                          <input type="text" class="form-control" name="nama_ortom" id="nama_ortom"
                            placeholder="Masukan Nama Ortom" value="{{ old('nama_ortom', $ortom->nama_ortom) }}">
                          @error('nama_ortom')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Update Ortom</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script src="{{ url('') }}/js/autocomplete-ajax.js"></script>
@endsection
