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
                  <form action="/data/daerah/{{ $daerah->id_daerah }}" method="post">
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
@endsection
