@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Settings</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Organisasi Otonom Muhammadiyah</h4>
            </div>
            <div class="card-body">
              @if (session('message_ortom'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_ortom') }}
                  </div>
                </div>
              @endif
              <form action="/settings/ortom" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="nama_ortom" class="form-label"><b>Nama Ortom</b></label>
                          <input type="text" class="form-control" name="nama_ortom" id="nama_ortom"
                            placeholder="Masukan Nama Ortom">
                          @error('nama_ortom')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Ortom</button>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-ortom">
                <thead>
                  <tr>
                    <th>Nama Ortom</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ortom as $o)
                    <tr>
                      <td>{{ $o->nama_ortom }}</td>
                      <td>
                        <button type="button" class="btn btn-icon icon-left btn-warning" id="btn-edit-ortom"
                          data-bs-toggle="modal" data-bs-target="#exampleModalOrtom" data-key="{{ $o->nama_ortom }}"
                          data-message="Organisasi Otonom Muhammadiyah"><i class="far fa-edit"></i>
                          Edit</button>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Tempat Lahir</h4>
            </div>
            <div class="card-body">
              @if (session('message_tempat_lahir'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_tempat_lahir') }}
                  </div>
                </div>
              @endif
              <form action="/settings/tempat/lahir" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                            placeholder="Masukan Nama Kota (cnth:Surakarta)">
                          @error('tempat_lahir')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Tempat Lahir</button>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-tempat_lahir">
                <thead>
                  <tr>
                    <th>Tempat Lahir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tempat_lahir as $tl)
                    <tr>
                      <td>{{ $tl->tempat_lahir }}</td>
                      <td>
                        <button type="button" class="btn btn-icon icon-left btn-warning" id="btn-edit-tempat_lahir"
                          data-bs-toggle="modal" data-bs-target="#exampleModalTempatLahir"
                          data-key="{{ $tl->tempat_lahir }}" data-message="Tempat Lahir"><i class="far fa-edit"></i>
                          Edit</button>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Periode</h4>
            </div>
            <div class="card-body">
              @if (session('message_periode'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_periode') }}
                  </div>
                </div>
              @endif
              <form action="/settings/periode" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="periode" class="form-label"><b>Periode</b></label>
                          <input type="text" class="form-control" name="periode" id="periode"
                            placeholder="Masukan Periode (cnth:{{ $last_periode->periode }})">
                          @error('periode')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Periode</button>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-periode">
                <thead>
                  <tr>
                    <th>Periode</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($periode as $prd)
                    <tr>
                      <td>{{ $prd->periode }}</td>
                      <td>
                        <button type="button" class="btn btn-icon icon-left btn-warning" id="btn-edit-periode"
                          data-bs-toggle="modal" data-bs-target="#exampleModalPeriode" data-key="{{ $prd->periode }}"
                          data-message="Periode"><i class="far fa-edit"></i>
                          Edit</button>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Jenis Potensi Kader</h4>
            </div>
            <div class="card-body">
              @if (session('message_potensi'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_potensi') }}
                  </div>
                </div>
              @endif
              <form action="/settings/potensi" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="potensi" class="form-label"><b>Jenis Potensi Kader</b></label>
                          <input type="text" class="form-control" name="potensi" id="potensi"
                            placeholder="Masukan Potensi Kader (cnth:Bidang Pendidikan)">
                          @error('potensi')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Potensi</button>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-potensi">
                <thead>
                  <tr>
                    <th>Nama Potensi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($potensi as $p)
                    <tr>
                      <td>{{ $p->potensi }}</td>
                      <td>
                        <button type="button" class="btn btn-icon icon-left btn-warning" id="btn-edit-potensi"
                          data-bs-toggle="modal" data-bs-target="#exampleModalPotensi" data-key="{{ $p->potensi }}"
                          data-message="Jenis Potensi Kader"><i class="far fa-edit"></i>
                          Edit</button>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Pekerjaan</h4>
            </div>
            <div class="card-body">
              @if (session('message_pekerjaan'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_pekerjaan') }}
                  </div>
                </div>
              @endif
              <form action="/settings/pekerjaan" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                            placeholder="Masukan Nama Pekerjaan (cnth:Mahasiswa)">
                          @error('pekerjaan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Pekerjaan</button>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-bordered table-hover table-responsive" id="scroll-x-pekerjaan">
                <thead>
                  <tr>
                    <th>Nama Pekerjaan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pekerjaan as $pkrjn)
                    <tr>
                      <td>{{ $pkrjn->pekerjaan }}</td>
                      <td>
                        <button type="button" class="btn btn-icon icon-left btn-warning" id="btn-edit-pekerjaan"
                          data-bs-toggle="modal" data-bs-target="#exampleModalPekerjaan"
                          data-key="{{ $pkrjn->pekerjaan }}" data-message="Pekerjaan"><i class="far fa-edit"></i>
                          Edit</button>
                        <a href="" class="btn btn-icon icon-left btn-danger"><i class="far fa-trash-alt"></i>
                          Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>

  {{-- modal ortom --}}
  <div class="modal fade" id="exampleModalOrtom" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="message-ortom"></h4>
        </div>
        <form action="/settings/ortom" method="post" class="form-ortom">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="mb-3">
              <label for="ortom" class="form-label"><b>Ortom</b></label>
              <input type="text" class="form-control" name="ortom" id="ortom_modal"
                placeholder="Masukan Nama Ortom">
              <div class="error-message">
                {{-- {{ $message }} --}}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-update">Update Ortom</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- modal tempat_lahir --}}
  <div class="modal fade" id="exampleModalTempatLahir" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="message-tempat_lahir"></h4>
        </div>
        <form action="/settings/tempat/lahir" method="post" class="form-tempat_lahir">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="mb-3">
              <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir_modal"
                placeholder="Masukan Nama Kota (cnth:Surakarat)">
              <div class="error-message">
                {{-- {{ $message }} --}}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-update">Update Tempat Lahir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- modal periode --}}
  <div class="modal fade" id="exampleModalPeriode" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="message-periode"></h4>
        </div>
        <form action="/settings/periode" method="post" class="form-periode">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="mb-3">
              <label for="periode" class="form-label"><b>Periode</b></label>
              <input type="text" class="form-control" name="periode" id="periode_modal"
                placeholder="Masukan periode">
              <div class="error-message">
                {{-- {{ $message }} --}}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-update">Update Periode</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- modal potensi --}}
  <div class="modal fade" id="exampleModalPotensi" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="message-potensi"></h4>
        </div>
        <form action="/settings/potensi" method="post" class="form-potensi">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="mb-3">
              <label for="potensi" class="form-label"><b>Potensi</b></label>
              <input type="text" class="form-control" name="potensi" id="potensi_modal"
                placeholder="Masukan Potensi Kader(cnth:Bidang Pendidikan)">
              <div class="error-message-">
                {{-- {{ $message }} --}}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-update">Update Potensi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- modal pekerjaan --}}
  <div class="modal fade" id="exampleModalPekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="message-pekerjaan"></h4>
        </div>
        <form action="/settings/pekerjaan" method="post" class="form-pekerjaan">
          @csrf
          @method('put')
          <div class="modal-body">
            <div class="mb-3">
              <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
              <input type="text" class="form-control" name="pekerjaan" id="pekerjaan_modal"
                placeholder="Masukan Nama Pekerjaan (cnth:Mahasiswa)">
              <div class="error-message">
                {{-- {{ $message }} --}}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-update">Update Pekerjaan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $("button#btn-edit-ortom").each(function(index, element) {
      $(this).on('click', function() {
        $("h4#message-ortom").text($(this).data('message'));
        $("input#ortom_modal").val($(this).data('key'));
      });
    });
    $(".form-ortom").on('submit', function(e) {
      console.log("OKOK");
      var form = $(this);

      $.ajax({
        type: "put",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(data, textStatus, jqXHR) {
          var data = jqXHR.responseJSON;
          window.location.href = data.url;
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
        }
      });
      e.preventDefault();
    });
    $("button#btn-edit-tempat_lahir").each(function(index, element) {
      $(this).on('click', function() {
        $("h4#message-tempat_lahir").text($(this).data('message'));
        $("input#tempat_lahir_modal").val($(this).data('key'));
      });
    });
    $("button#btn-edit-periode").each(function(index, element) {
      $(this).on('click', function() {
        $("h4#message-periode").text($(this).data('message'));
        $("input#periode_modal").val($(this).data('key'));
      });
    });
    $("button#btn-edit-potensi").each(function(index, element) {
      $(this).on('click', function() {
        $("h4#message-potensi").text($(this).data('message'));
        $("input#potensi_modal").val($(this).data('key'));
      });
    });
    $("button#btn-edit-pekerjaan").each(function(index, element) {
      $(this).on('click', function() {
        $("h4#message-pekerjaan").text($(this).data('message'));
        $("input#pekerjaan_modal").val($(this).data('key'));
      });
    });
  </script>
@endsection
