@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Update Periode</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/periode/{{ $periode->id_periode }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_periode" class="form-label"><b>Id Periode</b></label>
                          <input type="text" class="form-control" name="id_periode" id="id_periode"
                            value="{{ old('id_periode', $periode->id_periode) }}" readonly>
                          @error('id_periode')
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
                          <label for="periode" class="form-label"><b>Periode</b></label>
                          <input type="text" class="form-control" name="periode" id="periode"
                            placeholder="Masukan Periode (cnth:{{ $last_periode->periode }})"
                            value="{{ old('periode', $periode->periode) }}">
                          @error('periode')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Update Periode</button>
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
