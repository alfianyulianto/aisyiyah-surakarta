@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Tempat Lahir</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/tempat/lahir" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_tempat_lahir" class="form-label"><b>Id Tempat Lahir</b></label>
                          <input type="text" class="form-control" name="id_tempat_lahir" id="id_tempat_lahir"
                            value="{{ 'tmptlhr-' . Str::random(4) }}" readonly>
                          @error('id_tempat_lahir')
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
                          <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            placeholder="Masukan Tempat Lahir (cnth:Surakarta)" value="{{ old('tempat_lahir') }}">
                          @error('tempat_lahir')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Tempat Lahir</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
