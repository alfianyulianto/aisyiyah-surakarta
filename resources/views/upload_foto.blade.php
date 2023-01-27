@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Upload Foto</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/upload/foto" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <small class="d-block mt-0 mb-2" style="font-size:13px;">Pastikan file yang diupload dalam
                            bentuk PNG atau JPG</small>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
                          </div>
                          <div class="error-message">
                            @error('foto')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Upload Foto</button>
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
  <script>
    $('#foto').on('change', function(e) {
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
@endsection
