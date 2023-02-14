@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Update Profile</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              @if (session('message_kader'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    {{ session('message_kader') }}
                  </div>
                </div>
              @endif
              <div class="row">
                <div class="col-lg-10">
                  <form action="/profil/update" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nik" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik"
                            placeholder="Nomer Induk Kependudukan (cnth:3372******)" value="{{ old('nik', $kader->nik) }}"
                            autofocus>
                          @error('nik')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_kta" class="form-label"><b>No KTA 'Aisyiyah</b></label>
                          <input type="text" class="form-control" name="no_kta" id="no_kta"
                            placeholder="Kartu Tanda Anggota 'Aisyiyah" value="{{ old('no_kta', $kader->no_kta) }}">
                          @error('no_kta')
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
                          <label for="no_ktm" class="form-label"><b>No KTA Muhammadiyah</b></label>
                          <input type="text" class="form-control" name="no_ktm" id="no_ktm"
                            placeholder="Kartu Tanda Anggota Muhammadiyah" value="{{ old('no_ktm', $kader->no_ktm) }}">
                          @error('no_ktm')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nama" class="form-label"><b>Nama Lengkap</b></label>
                          <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Nama Lengkap (cnth:Alfian Yulianto)"
                            value="{{ old('nama', $kader->nama), $kader->nama }}">
                          @error('nama')
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
                          <label for="cabang_id_cabang" class="form-label"><b>Cabang Aisyiyah</b></label>
                          <select class="form-control form-control-lg select2" name="cabang_id_cabang"
                            id="cabang_id_cabang">
                            @if (old('cabang_id_cabang', $kader->cabang_id_cabang))
                              <option value="">-- Pilih Cabang --</option>
                              @foreach ($nama_cabang as $nc)
                                @if (old('cabang_id_cabang', $kader->cabang_id_cabang) == $nc->id_cabang)
                                  <option value="{{ $nc->id_cabang }}" selected>{{ $nc->nama_cabang }}</option>
                                @else
                                  <option value="{{ $nc->id_cabang }}">{{ $nc->nama_cabang }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected value="">-- Pilih Cabang --</option>
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
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <input type="hidden" name="kader_ranting" id="kader_ranting"
                            value="{{ old('ranting_id_ranting', $kader->ranting_id_ranting) }}">
                          <label for="ranting_id_ranting" class="form-label"><b>Ranting Aisyiyah</b></label>
                          <select class="form-control form-control-lg select2" name="ranting_id_ranting"
                            id="ranting_id_ranting">
                            <option value="" selected disabled>-- Pilih Ranting --</option>
                            <option disabled>Silahkan pilih cabang terlebih dahulu!</option>
                          </select>
                          @error('ranting_id_ranting')
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
                          <label for="email" class="form-label"><b>Email</b></label>
                          <input type="email" class="form-control" name="email" id="email"
                            placeholder="Email (cnth:alfianyulianto36@gmail.com)"
                            value="{{ old('email', $kader->email) }}">
                          @error('email')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-5">
                            <div class="mb-3">
                              <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Tempat lahir (cnth:Surakarta)"
                                value="{{ old('tempat_lahir', $kader->tempat_lahir) }}">
                              @error('tempat_lahir')
                                <div class="error-message">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="form-group mb-3">
                              <label for="tempat_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                              <input type="date" class="form-control datepicker" name="tanggal_lahir"
                                id="tanggal_lahir" value="{{ old('tanggal_lahir', $kader->tanggal_lahir) }}">
                              @error('tanggal_lahir')
                                <div class="error-message">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="status_pernikahan" class="form-label"><b>Status Pernikahan</b></label>
                          <select class="form-control form-control-lg selectric " name="status_pernikahan"
                            id="status_pernikahan">
                            @if (old('status_pernikahan', $kader->status_pernikahan) == 'Belum Menikah')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah" selected>Belum Menikah</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                            @if (old('status_pernikahan', $kader->status_pernikahan) == 'Menikah')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Menikah" selected>Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                            @if (old('status_pernikahan', $kader->status_pernikahan) == 'Janda')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda" selected>Janda</option>
                            @endif
                            @if (!old('status_pernikahan', $kader->status_pernikahan))
                              <option selected disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                          </select>
                          @error('status_penikahan')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                            placeholder="Pekerjaan Anda" value="{{ old('pekerjaan', $kader->pekerjaan) }}">
                          @error('pekerjaan')
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
                          <label for="pendidikan_terakhir_id_pendidikan_terakhir" class="form-label"><b>Pendidikan
                              Terakhir</b></label>
                          <select class="form-control form-control-lg selectric "
                            name="pendidikan_terakhir_id_pendidikan_terakhir"
                            id="pendidikan_terakhir_id_pendidikan_terakhir">
                            @if (old('pendidikan_terakhir_id_pendidikan_terakhir', $kader->pendidikan_terakhir_id_pendidikan_terakhir))
                              <option disabled>-- Pilih Pendidikan Terakhir --</option>
                              @foreach ($pendidikan_terakhir as $pk)
                                @if (old('pendidikan_terakhir_id_pendidikan_terakhir', $kader->pendidikan_terakhir_id_pendidikan_terakhir) ==
                                        $pk->id_pendidikan_terakhir)
                                  <option value="{{ $pk->id_pendidikan_terakhir }}" selected>{{ $pk->pendidikan }}
                                  </option>
                                @else
                                  <option value="{{ $pk->id_pendidikan_terakhir }}">{{ $pk->pendidikan }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Pendidikan Terakhir --</option>
                              @foreach ($pendidikan_terakhir as $pk)
                                <option value="{{ $pk->id_pendidikan_terakhir }}">{{ $pk->pendidikan }}</option>
                              @endforeach
                            @endif
                          </select>
                          @error('pendidikan_terakhir_id_pendidikan_terakhir')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_ponsel" class="form-label"><b>Nomer Handphone</b></label>
                          <input type="text" class="form-control" name="no_ponsel" id="no_ponsel"
                            placeholder="Nomer Handphone (cnth: 081*****)"
                            value="{{ old('no_ponsel', $kader->no_ponsel) }}">
                          @error('no_ponsel')
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
                          <label for="alamat_asal_ktp" class="form-label"><b>Alamat KTP</b></label>
                          <input type="text" class="form-control" name="alamat_asal_ktp" id="alamat_asal_ktp"
                            placeholder="Masukan alamat sesuai ktp"
                            value="{{ old('alamat_asal_ktp', $kader->alamat_asal_ktp) }}">
                          @error('alamat_asal_ktp')
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
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="cek_alamat" name="cek_alamat" on
                                {{ old('cek_alamat') || $kader->alamat_asal_ktp == $kader->alamat_rumah_tinggal ? 'checked' : '' }}>
                              <label for="cek_alamat" class="form-label"><b> Ceklist jika alamat domisili anda sesuai
                                  dengan alamat pada ktp!</b></label>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="alamat_domisili {{ old('cek_alamat') || $kader->alamat_asal_ktp == $kader->alamat_rumah_tinggal ? 'd-none' : '' }}">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="alamat_rumah_tinggal" class="form-label"><b>Alamat Domisili</b></label>
                            <input type="text" class="form-control" name="alamat_rumah_tinggal"
                              id="alamat_rumah_tinggal" placeholder="Masukan alamat domisili rumah tinggal"
                              value="{{ old('alamat_rumah_tinggal', $kader->alamat_rumah_tinggal) }}">
                            @error('alamat_rumah_tinggal')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Update Profil</button>
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
  <script src="{{ url('') }}/js/autocomplete-ajax.js"></script>
  <script>
    // select cabang
    $("#cabang_id_cabang").on("change", function() {
      let id_cabang = $(this).val();
      if (id_cabang) {
        $.ajax({
          type: "get",
          url: "/get/ranting/kader/daerah/" + id_cabang,
          dataType: "json",
          success: (response) => {
            console.log(response);
            let ranting =
              "<option value='' selected >-- Pilih Ranting --</option>";
            response.forEach((i) => {
              ranting += `<option value="${i.id_ranting}">${i.nama_ranting}</option>`;
            });
            $("#ranting_id_ranting").html(ranting);
          },
        });
      } else {
        $("#ranting_id_ranting").html(`
          <option value='' selected disabled>-- Pilih Ranting --</option>
          <option disabled>Silahkan pilih cabang terlebih dahulu!</option>
        `);
      }
    });
    $("select#ranting_id_ranting").on("change", function() {
      console.log($(this).val());
    });
  </script>
  <script>
    if ($("#cabang_id_cabang").val()) {
      let id_cabang = $("#cabang_id_cabang").val();
      let id_ranting = $("#kader_ranting").val();
      console.log(id_cabang);
      console.log(id_ranting);
      $.ajax({
        type: "get",
        url: "/get/ranting/kader/daerah/" + id_cabang,
        dataType: "json",
        success: (response) => {
          console.log(response);
          let ranting;
          // cek jika id_ranting kosong
          if (!id_ranting) {
            ranting = "<option value='' selected>-- Pilih Ranting --</option>";
          } else {
            ranting = "<option value=''>-- Pilih Ranting --</option>";
          }
          response.forEach(i => {
            if (i.id_ranting == id_ranting) {
              ranting += `<option value="${i.id_ranting}" selected>${ i.nama_ranting }</option>`;
            } else {
              ranting += `<option value="${i.id_ranting}">${ i.nama_ranting }</option>`;
            }
          })
          $("#ranting_id_ranting").html(ranting);
        }
      });
    }
  </script>
@endsection
