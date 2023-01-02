@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Ortom Yang DI Ikuti</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/kader/ortom" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_kader_has_ortom" class="form-label"><b>Id Ortom</b></label>
                          <input type="text" class="form-control @error('id_kader_has_ortom') is-invalid @enderror"
                            name="id_kader_has_ortom" id="id_kader_has_ortom"
                            value="{{ 'ORTM-' . Str::lower(Str::random(4)) }}" readonly>
                          @error('nik')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <select class="form-control form-control-lg select2 @error('nama_ortom') is-invalid @enderror"
                            id="nama_ortom" name="nama_ortom">
                            <option selected disabled>-- Pilih Ortom --</option>
                            <option value="Hizbul Wathan">Hizbul Wathan</option>
                            <option value="Nasyiatul ‘Aisyiyah">Nasyiatul ‘Aisyiyah</option>
                            <option value="Ikatan Pelajar Muhammadiyah">Ikatan Pelajar Muhammadiyah</option>
                            <option value="Ikatan Mahasiswa Muhammadiyah">Ikatan Mahasiswa Muhammadiyah</option>
                            <option value="Tapak Suci Putra Muhammadiyah">Tapak Suci Putra Muhammadiyah</option>
                          </select>
                          @error('nama_ortom')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="ortom_uraian" class="form-label"><b>Uraian Ortom</b></label>
                          <textarea class=" @error('ortom_uraian') is-invalid @enderror" id="summernote" name="ortom_uraian"
                            style="height: 1876px"></textarea>
                          @error('ortom_uraian')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Ortom</button>
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
