<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Aisyiyah Surakarta</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

  {{-- My CSS --}}
  <link rel="stylesheet" href="{{ url('') }}/css/show-hide-password.css">

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

            <div class="card card-primary">
              <div class="login-brand mb-1">
                <img src="{{ url('') }}/img/logo-2.png" alt="logo" width="100"
                  class="shadow-light rounded-circle">
              </div>
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <form action="/register" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="nik">Nomer Induk Kependudukan</label>
                      <input type="number" class="form-control" name="nik" id="nik"
                        value="{{ old('nik') }}" placeholder="Nomer Induk Kependudukan (cnth:33720******)" autofocus>
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
                      <input type="number" class="form-control" name="no_ponsel" id="no_ponsel"
                        value="{{ old('no_ponsel') }}" placeholder="Nomer Handphone (cnth: 081*****)">
                      @error('no_ponsel')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ old('nama') }}" placeholder="Nama Lengkap (cnth:Alfian Yulianto)">
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
                          <option></option>
                          @foreach ($nama_cabang as $nc)
                            @if (old('cabang_id_cabang') == $nc->id_cabang)
                              <option value="{{ $nc->id_cabang }}" selected>{{ $nc->nama_cabang }}</option>
                            @else
                              <option value="{{ $nc->id_cabang }}">{{ $nc->nama_cabang }}</option>
                            @endif
                          @endforeach
                        @else
                          <option></option>
                          @foreach ($nama_cabang as $nc)
                            <option value="{{ $nc->id_cabang }}">{{ $nc->nama_cabang }}</option>
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
                      <input type="hidden" name="kader_ranting" id="kader_ranting"
                        value="{{ old('ranting_id_ranting') }}">
                      <label for="ranting_id_ranting" class="form-label">Ranting Aisyiyah</label>
                      <select class="form-control form-control-lg select2" name="ranting_id_ranting"
                        id="ranting_id_ranting">
                        <option></option>
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
                      <span class="fas fa-eye field-icon toggle-password" style="font-size:17px;"></span>
                      @error('password')
                        <div class="error-message">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="konfirmasi_password">Konfrimasi Password</label>
                      <input type="password" class="form-control" name="konfirmasi_password"
                        id="konfirmasi_password">
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
  {{-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script>
    // select2
    $("#cabang_id_cabang").select2({
      placeholder: "--Pilih Cabang--",
      allowClear: true,
    });
    $("#ranting_id_ranting").select2({
      placeholder: "--Pilih Ranting--",
      allowClear: true,
    });
  </script>
  <script src="{{ url('') }}/library/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="{{ url('') }}/library/stisla/node_modules/moment/min/moment.min.js"></script>
  <script src="{{ url('') }}/library/stisla/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ url('') }}/library/stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>

  {{-- My Script --}}
  <script src="{{ url('') }}/js/show-hide-password.js"></script>

  <!-- Template JS File -->
  <script src="{{ url('') }}/library/stisla/assets/js/scripts.js"></script>
  <script src="{{ url('') }}/library/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('') }}/library/stisla/assets/js/page/auth-register.js"></script>
  @if (old('cabang_id_cabang'))
    <script>
      // ranting
      let id_cabang = $("select#cabang_id_cabang").val();
      let id_ranting = $("#kader_ranting").val();
      $.ajax({
        type: "get",
        url: "/get/ranting/" + id_cabang,
        dataType: "json",
        success: (response) => {
          // console.log(response);
          let ranting;
          // cek jika id_ranting kosong
          if (!id_ranting) {
            ranting = "<option></option>";
          } else {
            ranting = "<option></option>";
          }
          response.forEach(i => {
            if (i.id_ranting == id_ranting) {
              ranting += `<option value="${i.id_ranting}" selected>${ i.nama_ranting }</option>`;
            } else {
              ranting += `<option value="${i.id_ranting}">${ i.nama_ranting }</option>`;
            }
          })
          $("select#ranting_id_ranting").html(ranting);
        }
      });
    </script>
  @endif
  <script>
    // select cabang
    $("select#cabang_id_cabang").on("change", function() {
      let id_cabang = $(this).val();
      $.ajax({
        type: "get",
        url: "/get/ranting/" + id_cabang,
        dataType: "json",
        success: (response) => {
          console.log(response);
          let ranting =
            "<option></option>";
          response.forEach((i) => {
            ranting += `<option value="${i.id_ranting}">${i.nama_ranting}</option>`;
          });
          $("select#ranting_id_ranting").html(ranting);
        },
      });
    });

    // password
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
        $("#konfirmasi_password").addClass("is-valid");
        $("#konfirmasi_password").removeClass("is-invalid");
      } else {
        $("#not-matches").removeClass("d-none");
        $("#matches").addClass("d-none");
        $("#konfirmasi_password").addClass("is-invalid");
        $("#konfirmasi_password").removeClass("is-valid");
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
        $("#konfirmasi_password").removeClass("is-invalid");
        $("#konfirmasi_password").addClass("is-valid");
      } else {
        $("#not-matches").removeClass("d-none");
        $("#matches").addClass("d-none");
        $("#konfirmasi_password").removeClass("is-valid");
        $("#konfirmasi_password").addClass("is-invalid");
      }
    });
  </script>
</body>

</html>
