@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header mb-2">
      <h1>Ubah Password</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            @if (session('not_match'))
              <div class="alert alert-danger alert-dismissible show fade mt-3 mx-4">
                <div class="alert-body">
                  {{ session('not_match') }}
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                </div>
              </div>
            @endif
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form action="/change/password" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="nik" class="form-label"><b>Password Saat Ini</b></label>
                      <input type="password" class="form-control" name="password" id="password"
                        placeholder="Password Saat Ini" autofocus autocomplete>
                      <span class="fas fa-eye field-icon toggle-password"></span>
                      @error('password')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password_baru" class="form-label"><b>Password Baru</b></label>
                      <input type="password" class="form-control" name="password_baru" id="password_baru"
                        placeholder="Password baru (minimal 6 karakter)" autocomplete>
                      <span class="fas fa-eye field-icon toggle-new-password"></span>
                      @error('password_baru')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="konfirmasi_password" class="form-label"><b>Konfirmasi Password Baru</b></label>
                      <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password"
                        placeholder="Konfirmasi password baru" autocomplete>
                      @error('konfirmasi_password')
                        <div id="laravel-error" class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                      <div class="valid-feedback">
                        Ok Match!
                      </div>
                      <div id="matches" class="invalid-feedback @error('ulangi_password') d-none @enderror">
                        Don't Match!
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary">Change Password</button>
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
