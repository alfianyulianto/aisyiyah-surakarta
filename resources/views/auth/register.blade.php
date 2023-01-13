<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Aisyiyah Surakarta</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/select2/dist/css/select2.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/style.css">
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/components.css">

  {{-- My CSS --}}
  <link rel="stylesheet" href="{{ url('') }}/css/my-style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{url('')}}/img/logo-2.png" alt="logo" width="100"
                class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <form action="/register" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="nik">Nomer Induk Kependudukan</label>
                      <input type="text" class="form-control" name="nik" id="nik"
                        value="{{ old('nik') }}" placeholder="Nomer Induk Kependudukan (cnth:33720******)">
                      @error('nik')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="no_ponsel">Nomer Ponsel</label>
                      <input type="text" class="form-control" name="no_ponsel" id="no_ponsel"
                        value="{{ old('no_ponsel') }}" autofocus>
                      @error('no_ponsel')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ old('nama') }}">
                      @error('nama')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="cabang_id_cabang" class="form-label">Cabang Aisyiyah</label>
                      <select class="form-control form-control-lg select2" name="cabang_id_cabang"
                        id="cabang_id_cabang">
                        @if (old('cabang_id_cabang'))
                          <option disabled>-- Pilih Cabang --</option>
                          @foreach ($nama_cabang as $id_cabang => $nama_cabang)
                            @if (old('cabang_id_cabang') == $id_cabang)
                              <option value="{{ $id_cabang }}" selected>{{ $nama_cabang }}</option>
                            @else
                              <option value="{{ $id_cabang }}">{{ $nama_cabang }}</option>
                            @endif
                          @endforeach
                        @else
                          <option selected disabled>-- Pilih Cabang --</option>
                          @foreach ($nama_cabang as $id_cabang => $nama_cabang)
                            <option value="{{ $id_cabang }}">{{ $nama_cabang }}</option>
                          @endforeach
                        @endif
                      </select>
                      @error('cabang_id_cabang')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="ranting_id_ranting" class="form-label">Ranting Aisyiyah</label>
                      <select class="form-control form-control-lg select2" name="ranting_id_ranting"
                        id="ranting_id_ranting">
                        @if (old('ranting_id_ranting'))
                          <option disabled>-- Pilih Ranting --</option>
                          @foreach ($nama_ranting as $id_ranting => $nama_ranting)
                            @if (old('ranting_id_ranting') == $id_ranting)
                              <option value="{{ $id_ranting }}" selected>{{ $nama_ranting }}</option>
                            @else
                              <option value="{{ $id_ranting }}">{{ $nama_ranting }}</option>
                            @endif
                          @endforeach
                        @else
                          <option selected disabled>-- Pilih Ranting --</option>
                          @foreach ($nama_ranting as $id_ranting => $nama_ranting)
                            <option value="{{ $id_ranting }}">{{ $nama_ranting }}</option>
                          @endforeach
                        @endif
                      </select>
                      @error('ranting_id_ranting')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" autofocus>
                      @error('password')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="konfirmasi_password">Konfrimasi Password</label>
                      <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password">
                      @error('konfirmasi_password')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                      <div id="matches" class="valid-message d-none">
                        Ok Match!
                      </div>
                      <div id="not-matches" class="error-message d-none">
                        Don't Match!
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Sudah punya akun? <a href="/login">Login!</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="{{ url('') }}/library/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="{{ url('') }}/library/stisla/node_modules/moment/min/moment.min.js"></script>
  <script src="{{ url('') }}/library/stisla/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ url('') }}/library/stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/selectric/public/jquery.selectric.min.js"></script> --}}
  <script src="{{ url('') }}/library/stisla/node_modules/select2/dist/js/select2.full.min.js"></script>

  <!-- Template JS File -->
  <script src="{{ url('') }}/library/stisla/assets/js/scripts.js"></script>
  <script src="{{ url('') }}/library/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('') }}/library/stisla/assets/js/page/auth-register.js"></script>
  <script>
    var password = "";
    //jika input password berubah
    $("#password").on("change", function() {
      // ambil nilai
      password = $("#password").val();
    });
    // jika input konfirmasi_password focus
    $("#konfirmasi_password").on("focus", function() {
      password = $("#password").val();
      $("#not-matches").removeClass("d-none");
      $("#laravel-error").addClass("d-none");
      // ambil nilai konfirmasi_password
      var konfirmasi_password = $("#konfirmasi_password").val();
      // cek apakah kedua input sama
      if (password === konfirmasi_password) {
        $("#not-matches").addClass("d-none");
        $("#matches").removeClass("d-none");
      } else {
        $("#not-matches").removeClass("d-none");
        $("#matches").addClass("d-none");
      }
    });
    // jika input konfirmasi_password keyup
    $("#konfirmasi_password").on("keyup", function() {
      // ambil nilai
      var konfirmasi_password = $("#konfirmasi_password").val();
      // cek apakah kedua input sama
      if (password === konfirmasi_password) {
        $("#matches").removeClass("d-none");
        $("#not-matches").addClass("d-none");
      } else {
        $("#not-matches").removeClass("d-none");
        $("#matches").addClass("d-none");
      }
    });
  </script>
</body>

</html>
