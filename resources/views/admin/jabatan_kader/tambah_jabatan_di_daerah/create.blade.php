{{-- @dd($kader_jabatan) --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Jabatan Kader Daerah {{ $nama_daerah }}</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_pimp_daerah'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="left">{{ session('message_pimp_daerah') }}</marquee>
                  </div>
                </div>
              @endif
              @if (session('message_delete_pimp_daerah'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <marquee direction="left">{{ session('message_delete_pimp_daerah') }}</marquee>
                  </div>
                </div>
              @endif
              <form action="/jabatan/kader/daerah/{{ $id_daerah }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-6">
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
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="jabatan" class="form-label"><b>Posisi Jabatan</b></label>
                          <select class="form-control form-control-lg select2" id="jabatan" name="jabatan">
                            <option selected disabled>-- Pilih Jabatan --</option>
                            <option disabled>Tidak Ada Posisi Jabatan di Daerah {{ $nama_daerah }}</option>
                          </select>
                          @error('jabatan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kader" class="form-label"><b>Nama - NIK</b></label>
                          <select class="form-control form-control-lg select2" id="kader" name="kader">
                            <option selected disabled>-- Pilih Kader --</option>
                            <option disabled>Tidak Ada Data Kader di {{ $nama_daerah }}</option>
                          </select>
                          @error('kader')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="NIK" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik" readonly>
                          @error('nik')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_kta" class="form-label"><b>No KTA Aisyiyah</b></label>
                          <input type="text" class="form-control" name="no_kta" id="no_kta" readonly>
                          @error('no_kta')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="no_ktm" class="form-label"><b>No KTA Muhammadiyah</b></label>
                          <input type="text" class="form-control" name="no_ktm" id="no_ktm" readonly>
                          @error('no_ktm')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group mb-3">
                          <label for="nama" class="form-label"><b>Nama Kader</b></label>
                          <input type="text" class="form-control" name="nama" id="nama" readonly>
                          @error('nama')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                      <button type="submit" class="btn btn-primary">Add Jabatan Kader</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-tmbah-admin">
                  <thead>
                    <tr>
                      <th class="text-center align-top">#</th>
                      <th class="text-center align-top">NIK</th>
                      <th class="text-center align-top">No KTA Aisyiyah</th>
                      <th class="text-center align-top">No KTA Muhammadiyah</th>
                      <th class="text-center align-top">Nama</th>
                      <th class="text-center align-top">Jabatan</th>
                      <th class="text-center align-top">Periode</th>
                      <th class="text-center align-top">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kader_jabatan as $kj)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kj->kader_nik }}</td>
                        <td>{{ $kj->kader->no_kta ? $kj->kader->no_kta : '-' }}</td>
                        <td>{{ $kj->kader->no_ktm ? $kj->kader->no_ktm : '-' }}</td>
                        <td>{{ $kj->kader->nama }}</td>
                        <td>{{ $kj->jabatan->nama_jabatan }}</td>
                        <td>{{ $kj->periode->periode }}</td>
                        <td>
                          <a href="/data/jabatan/kader/daerah/{{ $kj->kader_nik }}" target="_blank"
                            class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Show</a>
                          <form action="/jabatan/kader/daerah/{{ $kj->kader_nik }}/{{ $id_daerah }}" method="post"
                            class="d-inline-block">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="jabatan" id="jabatan"
                              value="{{ $kj->jabatan->nama_jabatan }}">
                            <button type="submit" class="btn btn-icon icon-left btn-danger delete-daerah"><i
                                class="far fa-trash-alt"></i>Hapus</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="{{ url('') }}/js/sweetalert/sweetalert-delete-kader-jabatan.js"></script>
  <script>
    $("#periode").on("change", function() {
      var id_periode = $(this).val();
      $.ajax({
        type: "get",
        url: "/get/jabatan/kader/daerah/" + id_periode + "/" + <?= json_encode($id_daerah) ?>,
        dataType: "json",
        success: function(response) {
          console.log(response);
          let jabatan = "<option selected disabled>-- Pilih Jabatan --</option>";
          let kader = "<option selected disabled>-- Pilih Kader --</option>";
          response['jabatan'].forEach((j) => {
            jabatan += `<option value="${j.id_jabatan}">${j.nama_jabatan}</option>`;
          });
          response['kader'].forEach((k) => {
            kader += `<option value="${k.nik}">${k.nama}</option>`;
          });
          $("#jabatan").html(jabatan);
          $("#kader").html(kader);
        }
      });
    });
  </script>
@endsection
