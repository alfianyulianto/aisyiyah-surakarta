@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Admin Cabang</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="/tambah/admin/cabang" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="mb-3">
                          <label for="nama_nik" class="form-label"><b>Nama - NIK</b></label>
                          <select class="form-control form-control-lg select2" id="nama_nik" name="nama_nik">
                            <option selected disabled>-- Pilih Nama --</option>
                            @foreach ($kader as $k)
                              <option value="{{ $k->nik }}">{{ $k->nama }} - {{ $k->nik }}</option>
                            @endforeach
                          </select>
                          @if ($errors->all())
                            <div class="error-message">
                              Pastikan anda memilih nama kader untuk dijadikan admin!
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                    - disini rencananya ketika Super Admin melakukan klik pada select option maka input yang ada di bawah
                    akan otomatis terisi
                    - lalu ketika Super Admin melakukan klik "Add" maka data akan tersimpan dan ditampilkan langsung di
                    table
                    - gunakan ajax
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
                      <button type="submit" class="btn btn-primary">Add Admin Cabang</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-tmbah-admin">
                  <thead>
                    <tr>
                      <th class="text-center align-top">#</th>
                      <th class="text-center align-top">Nama</th>
                      <th class="text-center align-top">NIK</th>
                      <th class="text-center">No KTA Aisyiyah</th>
                      <th class="text-center">No KTA Muhammadiyah</th>
                      <th class="text-center align-top">Tempat Tanggal Lahir</th>
                      <th class="text-center align-top">Nomer Handphone</th>
                      <th class="text-center align-top">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admin_cabang as $ac)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ac->nama }}</td>
                        <td>{{ $ac->kader_nik }}</td>
                        <td>{{ DB::table('kader')->where('nik', $ac->kader_nik)->first()->no_kta }}</td>
                        <td>{{ DB::table('kader')->where('nik', $ac->kader_nik)->first()->no_ktm }}</td>
                        <td>{{ DB::table('kader')->where('nik', $ac->kader_nik)->first()->tempat_lahir }},
                          {{ DB::table('kader')->where('nik', $ac->kader_nik)->first()->tanggal_lahir }}</td>
                        <td>{{ $ac->no_ponsel }}</td>
                        <td>
                          <a href="" class="btn btn-icon icon-left btn-primary">Show</a>
                          <a href="" class="btn btn-icon icon-left btn-danger">Hapus</a>
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
  <script>
    $('select#nama_nik').on('change', function() {
      let nik = $(this).val();
      $.ajax({
        type: "get",
        url: "/tambah/admin/cabang/getkader/" + nik,
        dataType: "json",
        success: (response) => {
          console.log(response.result);
          $("#nik").val(response.result.nik);
          $("#no_kta").val(response.result.no_kta);
          $("#no_ktm").val(response.result.no_ktm);
          $("#nama").val(response.result.nama);
        }
      });
    });
  </script>
@endsection
