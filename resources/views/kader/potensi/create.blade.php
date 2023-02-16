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
                          <label for="id_kader_has_potensi" class="form-label"><b>Id Ortom</b></label>
                          <input type="text" class="form-control" name="id_kader_has_potensi" id="id_kader_has_potensi"
                            value="{{ 'kdrptns-' . Str::lower(Str::random(15)) }}" readonly>
                          @error('id_kader_has_potensi')
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
                          <label for="potensi_id_potensi" class="form-label"><b>Nama Potensi</b></label>
                          <select class="form-control form-control-lg selectric" name="potensi_id_potensi"
                            id="potensi_id_potensi">
                            @if (old('potensi_id_potensi'))
                              <option disabled>-- Pilih Potensi --</option>
                              @foreach ($potensi as $p)
                                @if (old('potensi_id_potensi') == $p->id_potensi)
                                  <option value="{{ $p->id_potensi }}" selected>{{ $p->potensi }}</option>
                                @else
                                  <option value="{{ $p->id_potensi }}">{{ $p->potensi }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Potensi --</option>
                              @foreach ($potensi as $p)
                                <option value="{{ $p->id_potensi }}">{{ $p->potensi }}</option>
                              @endforeach
                            @endif
                          </select>
                          @error('potensi_id_potensi')
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
                          <label for="potensi_kader_uraian" class="form-label"><b>Uraian Potensi</b></label>
                          <textarea id="summernote" name="potensi_kader_uraian" style="height: 1876px">{!! old('potensi_kader_uraian') !!}</textarea>
                          @error('potensi_kader_uraian')
                            <div class="error-message">
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
