@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Update Potensi</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/potensi/{{ $potensi->id_potensi }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_potensi" class="form-label"><b>Id Potensi</b></label>
                          <input type="text" class="form-control" name="id_potensi" id="id_potensi"
                            value="{{ old('id_otensi', $potensi->id_potensi) }}" readonly>
                          @error('id_potensi')
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
                          <label for="potensi" class="form-label"><b>Potensi</b></label>
                          <input type="text" class="form-control" name="potensi" id="potensi"
                            placeholder="Masukan Potensi (cnth:Bidang Pendidikan)"
                            value="{{ old('potensi', $potensi->potensi) }}">
                          @error('potensi')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Update Potensi</button>
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
