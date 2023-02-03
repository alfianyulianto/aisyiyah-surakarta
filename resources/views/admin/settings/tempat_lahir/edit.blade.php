@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Update Tempat Lahir</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/tempat/lahir/{{ $tempat_lahir->id_tempat_lahir }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_tempat_lahir" class="form-label"><b>Id Tempat Lahir</b></label>
                          <input type="text" class="form-control" name="id_tempat_lahir" id="id_tempat_lahir"
                            value="{{ old('id_tempat_lahir', $tempat_lahir->id_tempat_lahir) }}" readonly>
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
                            placeholder="Masukan Tempat Lahir (cnth:Surakarta)"
                            value="{{ old('tempat_lahir', $tempat_lahir->tempat_lahir) }}">
                          @error('tempat_lahir')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Update Tempat Lahir</button>
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
