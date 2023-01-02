@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Potensi Yang Dimiliki</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/kader/potensi" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_kader_has_potensi_kader" class="form-label"><b>Id Ortom</b></label>
                          <input type="text"
                            class="form-control @error('id_kader_has_potensi_kader') is-invalid @enderror"
                            name="id_kader_has_potensi_kader" id="id_kader_has_potensi_kader"
                            value="{{ 'ORTM-' . Str::lower(Str::random(4)) }}" readonly>
                          @error('id_kader_has_potensi_kader')
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
                          <label for="nama_potensi" class="form-label"><b>Nama Potensi</b></label>
                          <select class="form-control form-control-lg select2 @error('nama_potensi') is-invalid @enderror"
                            name="nama_potensi" id="nama_potensi">
                            <option selected disabled>-- Pilih Potensi --</option>
                            <option value="Bidang Pendidiakn">Bidang Pendidiakn</option>
                            <option value="Bidang Kesehatan">Bidang Kesehatan</option>
                            <option value="Bidang Dakwah">Bidang Dakwah</option>
                            <option value="Bidang Ekonomi">Bidang Ekonomi</option>
                          </select>
                          @error('nama_potensi')
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
                          <label for="potensi_uraian" class="form-label"><b>Uraian Potensi</b></label>
                          <textarea class="@error('potensi_uraian') is-invalid @enderror" id="summernote" name="potensi_uraian"
                            style="height: 1876px"></textarea>
                          @error('potensi_uraian')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Potensi</button>
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
