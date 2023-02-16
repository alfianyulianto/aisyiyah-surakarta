@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Ortom Yang Di Ikuti</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <form action="/admin/ortom" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="id_kader_has_ortom" class="form-label"><b>Id Ortom</b></label>
                          <input type="text" class="form-control" name="id_kader_has_ortom" id="id_kader_has_ortom"
                            value="{{ 'kdortm-' . Str::lower(Str::random(8)) }}" readonly>
                          @error('id_kader_has_ortom')
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
                          <label for="ortom_id_ortom" class="form-label"><b>Nama Ortom</b></label>
                          <select class="form-control form-control-lg selectric" id="ortom_id_ortom"
                            name="ortom_id_ortom">
                            @if (old('ortom_id_ortom'))
                              <option disabled>-- Pilih Ortom --</option>
                              @foreach ($ortom as $o)
                                @if (old('ortom_id_ortom') == $o->id_ortom)
                                  <option value="{{ $o->id_ortom }}" selected>{{ $o->nama_ortom }}</option>
                                @else
                                  <option value="{{ $o->id_ortom }}">{{ $o->nama_ortom }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Ortom --</option>
                              @foreach ($ortom as $o)
                                <option value="{{ $o->id_ortom }}">{{ $o->nama_ortom }}</option>
                              @endforeach
                            @endif
                          </select>
                          @error('ortom_id_ortom')
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
                          <label for="ortom_uraian" class="form-label"><b>Uraian Ortom</b></label>
                          <textarea id="summernote" name="ortom_uraian" style="height: 1876px">{!! old('ortom_uraian') !!}</textarea>
                          @error('ortom_uraian')
                            <div class="error-message">
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
