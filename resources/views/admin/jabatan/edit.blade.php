@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Edit Jabatan {{ $jabatan->nama_jabatan }}</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/data/jabatan/{{ $jabatan->id_jabatan }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_jabatan" class="form-label"><b>Id Jabatan</b></label>
                          <input type="text" class="form-control" name="id_jabatan" id="id_jabatan"
                            value="{{ old('id_jabatan', $jabatan->id_jabatan) }}" readonly>
                          @error('id_jabatan')
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
                          <label for="nama_jabatan" class="form-label"><b>Nama Jabatan</b></label>
                          <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan"
                            placeholder="Masukan nama jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}">
                          @error('nama_jabatan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Update Jabatan</button>
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
