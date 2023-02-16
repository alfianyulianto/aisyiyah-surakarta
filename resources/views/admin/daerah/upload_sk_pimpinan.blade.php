{{-- @dd(old('sk_pimp_cabang')) --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Upload SK Pimpinan Daerah 'Aisyiyah Kota Surakarta </h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_sk_pimp_daerah'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_sk_pimp_daerah') }}
                  </div>
                </div>
              @endif
              <div class="row">
                <div class="col-lg-6">
                  <form action="/upload/sk/pimpinan/daerah/{{ $id_daerah }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="periode" class="form-label"><b>Periode</b></label>
                          <select class="form-control form-control-lg select2" id="periode" name="periode">
                            <option selected disabled>-- Pilih Periode --</option>
                            @if (!$periode->isEmpty())
                              @foreach ($periode as $p)
                                <option value="{{ $p->id_periode }}">{{ $p->periode }}</option>
                              @endforeach
                            @else
                              <option disabled>Tidak Ada Periode Jabatan</option>
                            @endif
                          </select>
                          @error('periode')
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
                          <label for="sk_pimp_daerah" class="form-label">
                            <b>SK Pimpinan Daerah @error('sk_pimp_daerah')
                                <div class="text-danger d-inline error-message">*Silahkan upload ulang</div>
                              @enderror
                            </b>
                          </label>
                          <small class="d-block mt-0 mb-2" style="font-size:13px;">Pastikan file yang diupload dalam
                            bentuk PDF</small>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="sk_pimp_daerah" id="sk_pimp_daerah">
                            <label class="custom-file-label" for="sk_pimp_daerah">Choose file</label>
                          </div>
                          <div class="error-message">
                            @error('sk_pimp_daerah')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Upload SK Pimpinan Daerah</button>
                    </div>
                  </form>
                </div>
                <div class="col-lg-6">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="scroll-x-sk-pimpinan">
                      <thead>
                        <tr>
                          <th class="text-center">Periode</th>
                          <th class="text-center">SK Pimpinan Daerah</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sk_pimpinan as $s)
                          <tr>
                            <td>{{ $s->periode->periode }}</td>
                            <td>
                              <a href="/sk/pimpinan/daerah/{{ $s->id_sk_pimpinan }}" class="text-decoration-none">
                                <div class="border border-info btn-outline-info text-info rounded-pill text-center py-1">
                                  <i class="fas fa-download"></i> download
                                </div>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="row justify-content-center">
                    {{ $sk_pimpinan->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#sk_pimp_daerah').on('change', function(e) {
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
@endsection
