<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} &mdash; Aisyiyah Surakarta</title>

  <!-- General CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  {{-- <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet"
    href="{{ url('') }}/library/stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/dataTables.bootstrap4.min.css">
  {{-- <link rel="stylesheet"
    href="{{ url('') }}/library/stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/select.bootstrap4.min.css">
  {{-- <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/select2/dist/css/select2.min.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/select2.min.css">
  {{-- <link rel="stylesheet" href="{{ url('') }}/library/stisla/node_modules/selectric/public/selectric.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/selectric.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!-- Template CSS -->
  {{-- <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/style.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/assets/style.css">
  {{-- <link rel="stylesheet" href="{{ url('') }}/library/stisla/assets/css/components.css"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/assets/components.css">

  {{-- My CSS --}}
  <link rel="stylesheet" href="{{ url('') }}/css/my-style.css">
  <link rel="stylesheet" href="{{ url('') }}/css/show-hide-password.css">

  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}

  {{-- Autocomplate --}}
  <script src="{{ url('') }}/js/jquery.autocomplete.min.js"></script>

  {{-- Sweet Alert --}}
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/sweetalert/dist/sweetalert.min.js"></script> --}}
  <script src="{{ url('') }}/js/sweetalert.min.js"></script>

  <link rel="shortcut icon" href="{{ url('') }}/img/logo-2.png">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      {{-- Navbar --}}
      <div class="navbar-bg"></div>
      @include('partials.navbar')

      {{-- Sidebar --}}
      @include('partials.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      {{-- Footer --}}
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div>Pimpinan Daerah Aisyiyah Surakarta
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}
  <script src="{{ url('') }}/js/bootstrap.bundle.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script> --}}
  <script src="{{ url('') }}/js/jquery.nicescroll.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/moment/min/moment.min.js"></script> --}}
  <script src="{{ url('') }}/js/moment.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/assets/js/stisla.js"></script> --}}
  <script src="{{ url('') }}/js/assets/stisla.js"></script>

  {{-- My Script --}}
  <script src="{{ url('') }}/js/my-scripts.js"></script>
  <script src="{{ url('') }}/js/show-hide-password.js"></script>

  <!-- JS Libraies -->
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/datatables/media/js/jquery.dataTables.min.js"></script> --}}
  <script src="{{ url('') }}/js/jquery.dataTables.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"> --}}
  <script src="{{ url('') }}/js/dataTables.bootstrap4.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"> --}}
  <script src="{{ url('') }}/js/select.bootstrap4.min.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/node_modules/select2/dist/js/select2.full.min.js"></script> --}}
  <script src="{{ url('') }}/js/select2.full.min.js"></script>
  <script src="{{ url('') }}/js/jquery.selectric.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script src="{{ url('') }}/js/dataTables/dataTables.buttons.min.js"></script>
  <script src="{{ url('') }}/js/dataTables/pdfmake.min.js"></script>
  <script src="{{ url('') }}/js/dataTables/jszip.min.js"></script>
  <script src="{{ url('') }}/js/dataTables/vfs_fonts.js"></script>
  <script src="{{ url('') }}/js/dataTables/buttons.html5.min.js"></script>

  <!-- Template JS File -->
  {{-- <script src="{{ url('') }}/library/stisla/assets/js/scripts.js"></script> --}}
  <script src="{{ url('') }}/js/assets/scripts.js"></script>
  {{-- <script src="{{ url('') }}/library/stisla/assets/js/custom.js"></script> --}}
  <script src="{{ url('') }}/js/assets/custom.js"></script>

  <!-- Page Specific JS File -->
  {{-- <script src="{{ url('') }}/library/stisla/assets/js/page/modules-sweetalert.js"></script> --}}
  <script src="{{ url('') }}/js/assets/page/modules-sweetalert.js"></script>
</body>

</html>
