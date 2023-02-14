<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/bootstrap-social/bootstrap-social.css">

  {{-- My CSS --}}
  <link rel="stylesheet" href="{{ url('') }}/css/show-hide-password.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/style.css">
  <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary">
              <div class="login-brand mb-1">
                <img src="{{ url('') }}/img/logo-2.png" alt="logo" width="100"
                  class="shadow-light rounded-circle">
              </div>
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                @if (session('message_login'))
                  <div class="alert alert-success alert-dismissible">
                    <div class="alert-body">
                      {{ session('message_login') }}
                    </div>
                  </div>
                @endif
                @if (session('failed'))
                  <div class="alert alert-danger alert-dismissible">
                    <div class="alert-body">
                      {{ session('failed') }}
                    </div>
                  </div>
                @endif
                <form action="/login" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="no_ponsel">Nomer Ponsel</label>
                    <input type="number" class="form-control @error('no_ponsel') is-invalid @enderror" name="no_ponsel"
                      id="no_ponsel" autofocus autocomplete="off">
                    @error('no_ponsel')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                      id="password" autocomplete="pager">
                    <span class="fas fa-eye field-icon toggle-password" style="font-size:17px;"></span>
                    @error('password')
                      <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Login
                    </button>
                  </div>
                </form>
                <div class="mt-2 text-muted">
                  <a href="/forgot/password">Lupa password?</a>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum punya akun? <a href="/register">Buat akun</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; {{ date('Y') }} <div class="bullet"></div>Alfian Yulianto
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

  {{-- My Script --}}
  <script src="{{ url('') }}/js/show-hide-password.js"></script>

  <!-- Template JS File -->
  <script src="{{ url('') }}/library/stisla/assets/js/scripts.js"></script>
  <script src="{{ url('') }}/library/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>
