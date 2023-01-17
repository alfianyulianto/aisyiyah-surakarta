@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>My Profile</h1>
    </div>

    {{-- {{ old('provinsi_ktp') }}
    {{ old('kabupaten_kota_ktp') }}
    {{ old('kecamatan_ktp') }}
    {{ old('kelurahan_ktp') }} --}}
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-10">
                  <form action="/profil/kader" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nik" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik"
                            placeholder="Nomer Induk Kependudukan (cnth:3372******)" value="{{ old('nik') }}"
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
                            placeholder="Kartu Tanda Anggota 'Aisyiyah" value="{{ old('no_kta') }}">
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
                            placeholder="Kartu Tanda Anggota Muhammadiyah" value="{{ old('no_ktm') }}">
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
                            placeholder="Nama Lengkap (cnth:Alfian Yulianto)" value="{{ old('nama') }}">
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
                            @if (old('cabang_id_cabang'))
                              <option disabled>-- Pilih Cabang --</option>
                              @foreach ($nama_cabang as $nc)
                                @if (old('cabang_id_cabang') == $nc->id_cabang)
                                  <option value="{{ $nc->id_cabang }}" selected>{{ $nc->nama_cabang }}</option>
                                @else
                                  <option value="{{ $nc->id_cabang }}">{{ $nc->nama_cabang }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Cabang --</option>
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
                          <label for="ranting_id_ranting" class="form-label"><b>Ranting Aisyiyah</b></label>
                          <select class="form-control form-control-lg select2" name="ranting_id_ranting"
                            id="ranting_id_ranting">
                            @if (old('ranting_id_ranting'))
                              <option disabled>-- Pilih Ranting --</option>
                              @foreach ($nama_ranting as $nr)
                                @if (old('ranting_id_ranting') == $nr->id_ranting)
                                  <option value="{{ $nr->id_ranting }}" selected>{{ $nr->nama_ranting }}</option>
                                @else
                                  <option value="{{ $nr->id_ranting }}">{{ $nr->nama_ranting }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Ranting --</option>
                              @foreach ($nama_ranting as $nr)
                                <option value="{{ $nr->id_ranting }}">{{ $nr->nama_ranting }}</option>
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
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="email" class="form-label"><b>Email</b></label>
                          <input type="email" class="form-control" name="email" id="email"
                            placeholder="Email (cnth:alfianyulianto36@gmail.com)" value="{{ old('email') }}">
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
                                placeholder="Tempat lahir (cnth:Surakarta)" value="{{ old('tempat_lahir') }}">
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
                                id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
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
                            @if (old('status_pernikahan') == 'Belum Menikah')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah" selected>Belum Menikah</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                            @if (old('status_pernikahan') == 'Menikah')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Menikah" selected>Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                            @if (old('status_pernikahan') == 'Janda')
                              <option disabled>-- Pilih ProvinStatussi --</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Janda" selected>Janda</option>
                            @endif
                            @if (!old('status_pernikahan'))
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
                            placeholder="Pekerjaan Anda" value="{{ old('pekerjaan') }}">
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
                            @if (old('pendidikan_terakhir_id_pendidikan_terakhir'))
                              <option disabled>-- Pilih Pendidikan Terakhir --</option>
                              @foreach ($pendidikan_terakhir as $pk)
                                @if (old('pendidikan_terakhir_id_pendidikan_terakhir') == $pk->id_pendidikan_terakhir)
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
                            placeholder="Nomer Handphone (cnth: 081*****)" value="{{ old('no_ponsel') }}">
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
                          <label for="alamat_ktp" class="form-label"><b>Alamat KTP</b></label>
                          <input type="text" class="form-control" name="alamat_ktp" id="alamat_ktp"
                            placeholder="Masukan nama jalan atau nama kampung beserta RT / RW"
                            value="{{ old('alamat_ktp') }}">
                          @error('alamat_ktp')
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
                          <label for="provinsi_ktp" class="form-label"><b>Provinsi</b></label>
                          <select class="form-control form-control-lg select2" name="provinsi_ktp" id="provinsi_ktp">
                            @if (old('provinsi_ktp'))
                              <option disabled>-- Pilih Provinsi --</option>
                              @foreach ($data_provinsi as $dp)
                                @if (old('provinsi_ktp') == $dp['id'])
                                  <option value="{{ $dp['id'] }}" selected>{{ $dp['nama'] }}</option>
                                @else
                                  <option value="{{ $dp['id'] }}">{{ $dp['nama'] }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Provinsi --</option>
                              @foreach ($data_provinsi as $dp)
                                <option value="{{ $dp['id'] }}">{{ $dp['nama'] }}</option>
                              @endforeach
                            @endif
                          </select>
                          @error('provinsi_ktp')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kabupaten_kota_ktp" class="form-label"><b>Kabupaten/Kota</b></label>
                          <select class="form-control form-control-lg select2" name="kabupaten_kota_ktp"
                            id="kabupaten_kota_ktp">
                            <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                            <option disabled>Silahkan pilih provinsi dahulu</option>
                          </select>
                          @if (old('kabupaten_kota_ktp'))
                            <input type="text" name="old_kabupaten_kota_ktp" id="old_kabupaten_kota_ktp"
                              value="{{ old('kabupaten_kota_ktp') }}" hidden>
                          @endif
                          @error('kabupaten_kota_ktp')
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
                          <label for="kecamatan_ktp" class="form-label"><b>Kecamatan</b></label>
                          <select class="form-control form-control-lg select2" name="kecamatan_ktp" id="kecamatan_ktp">
                            <option selected disabled>-- Pilih Kecamatan --</option>
                            <option disabled>Silahkan pilih kabupaten/kota dahulu</option>
                          </select>
                          @if (old('kecamatan_ktp'))
                            <input type="text" name="old_kecamatan_ktp" id="old_kecamatan_ktp"
                              value="{{ old('kecamatan_ktp') }}" hidden>
                          @endif
                          @error('kecamatan_ktp')
                            <div class="error-message">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kelurahan_ktp" class="form-label"><b>Kelurahan</b></label>
                          <select class="form-control form-control-lg select2" name="kelurahan_ktp" id="kelurahan_ktp">
                            <option selected disabled>-- Pilih Kelurahan --</option>
                            <option disabled>Silahkan pilih kecamatan dahulu</option>
                          </select>
                          @if (old('kelurahan_ktp'))
                            <input type="text" name="old_kelurahan_ktp" id="old_kelurahan_ktp"
                              value="{{ old('kelurahan_ktp') }}" hidden>
                          @endif
                          @error('kelurahan_ktp')
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
                                {{ old('cek_alamat') ? 'checked' : '' }}>
                              <label for="cek_alamat" class="form-label"><b> Ceklist jika alamat domisili anda sesuai
                                  dengan ktp!</b></label>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="alamat_domisili {{ old('cek_alamat') ? 'd-none' : '' }}">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="alamat_domisili" class="form-label"><b>Alamat Domisili</b></label>
                            <input type="text" class="form-control" name="alamat_domisili" id="alamat_domisili"
                              placeholder="Masukan nama jalan atau nama kampung beserta RT / RW"
                              value="{{ old('alamat_domisili') }}">
                            @error('alamat_domisili')
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
                            <label for="provinsi_domisili" class="form-label"><b>Domisili Provinsi</b></label>
                            <select class="form-control form-control-lg select2" name="provinsi_domisili"
                              id="provinsi_domisili">
                              @if (old('provinsi_domisili'))
                                <option disabled>-- Pilih Provinsi --</option>
                                @foreach ($data_provinsi as $dp)
                                  @if (old('provinsi_domisili') == $dp['id'])
                                    <option value="{{ $dp['id'] }}" selected>{{ $dp['nama'] }}</option>
                                  @else
                                    <option value="{{ $dp['id'] }}">{{ $dp['nama'] }}</option>
                                  @endif
                                @endforeach
                              @else
                                <option selected disabled>-- Pilih Provinsi --</option>
                                @foreach ($data_provinsi as $dp)
                                  <option value="{{ $dp['id'] }}">{{ $dp['nama'] }}</option>
                                @endforeach
                              @endif
                            </select>
                            @error('provinsi_domisili')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="kabupaten_kota_domisili" class="form-label"><b>Domisili
                                Kabupaten/Kota</b></label>
                            <select class="form-control form-control-lg select2" name="kabupaten_kota_domisili"
                              id="kabupaten_kota_domisili">
                              <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                              <option disabled>Silahkan pilih comisili provinsi dahulu</option>
                            </select>
                            @error('kabupaten_kota_domisili')
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
                            <label for="kecamatan_domisili" class="form-label"><b>Domisili Kecamatan</b></label>
                            <select class="form-control form-control-lg select2" name="kecamatan_domisili"
                              id="kecamatan_domisili">
                              <option selected disabled>-- Pilih Kecamatan --</option>
                              <option disabled>Silahkan pilih domisili kabupaten/kota dahulu</option>
                            </select>
                            @error('kecamatan_domisili')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="kelurahan_domisili" class="form-label"><b>Domisili Kelurahan</b></label>
                            <select class="form-control form-control-lg select2" name="kelurahan_domisili"
                              id="kelurahan_domisili">
                              <option selected disabled>-- Pilih Kelurahan --</option>
                              <option disabled>Silahkan pilih domisili kecamatan dahulu</option>
                            </select>
                            @error('kelurahan_domisili')
                              <div class="error-message">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      <button type="submit" class="btn btn-primary">Add Kader</button>
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
  @if (old('cabang_id_cabang') && !old('ranting_id_ranting'))
    <script>
      let id_cabang = $("select#cabang_id_cabang").val();
      $.ajax({
        type: "get",
        url: "/get/ranting/" + id_cabang,
        dataType: "json",
        success: (response) => {
          console.log(response);
          let ranting = "<option selected disabled>-- Pilih Ranting --</option>";
          response.forEach(i => {
            ranting += `<option value="${i.ranting}">${ i.nama_ranting }</option>`;
          })
          $("select#ranting_id_ranting").html(ranting);
        }
      });
    </script>
  @endif
  @if (old('provinsi_ktp'))
    <script>
      let old_kabupaten_kota_ktp = $("#old_kabupaten_kota_ktp").val();
      let id_provinsi = $("select#provinsi_ktp").val();
      $.ajax({
        type: "get",
        url: "/data/kota/kabupaten/",
        data: {
          id: id_provinsi
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kabupaten_kota = `<option selected disabled>-- Pilih Kabupaten/Kota --</option>`;
          let kota_kabupaten = response.kota_kabupaten;
          kota_kabupaten.forEach(i => {
            if (old_kabupaten_kota_ktp == i.id) {
              tag_kabupaten_kota += `<option value="${i.id}" selected>${ i.nama }</option>`;
            } else {
              tag_kabupaten_kota += `<option value="${i.id}">${ i.nama }</option>`;
            }
          });
          $("#kabupaten_kota_ktp").html(tag_kabupaten_kota);
        }
      });
    </script>
  @endif
  @if (old('kabupaten_kota_ktp'))
    <script>
      let old_kecamatan_ktp = $("#old_kecamatan_ktp").val();
      let id_kabupaten_kota = $("#old_kabupaten_kota_ktp").val();

      $.ajax({
        type: "get",
        url: "/data/kecamatan/",
        data: {
          id: id_kabupaten_kota
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kecamatan = "<option selected disabled>-- Pilih Kecamatan --</option>";
          let kecamatan = response.kecamatan;
          kecamatan.forEach(i => {
            if (old_kecamatan_ktp == i.id) {
              tag_kecamatan += `<option value="${i.id}" selected>${ i.nama }</option>`;
            } else {
              tag_kecamatan += `<option value="${i.id}">${ i.nama }</option>`;
            }
          });
          $("#kecamatan_ktp").html(tag_kecamatan);
        }
      });
    </script>
  @endif
  @if (old('kecamatan_ktp'))
    <script>
      let old_kelurahan_ktp = $("#old_kelurahan_ktp").val();
      let id_kecamatan = $("#old_kecamatan_ktp").val();

      $.ajax({
        type: "get",
        url: "/data/kelurahan/",
        data: {
          id: id_kecamatan
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kelurahan = "<option selected disabled>-- Pilih Kelurahan --</option>";
          let kelurahan = response.kelurahan;
          kelurahan.forEach(i => {
            if (old_kelurahan_ktp == i.id) {
              tag_kelurahan += `<option value="${i.id}" selected>${ i.nama }</option>`;
            } else {
              tag_kelurahan += `<option value="${i.id}">${ i.nama }</option>`;
            }
          });
          $("#kelurahan_ktp").html(tag_kelurahan);
        }
      });
    </script>
  @endif
  <script>
    $("select#cabang_id_cabang").on("change", function() {
      let id_cabang = $(this).val();
      $.ajax({
        type: "get",
        url: "/get/ranting/" + id_cabang,
        dataType: "json",
        success: (response) => {
          console.log(response);
          let ranting = "<option selected disabled>-- Pilih Ranting --</option>";
          response.forEach(i => {
            ranting += `<option value="${i.ranting}">${ i.nama_ranting }</option>`;
          })
          $("select#ranting_id_ranting").html(ranting);
        }
      });
    });

    // alamat ktp
    $("#provinsi_ktp").on("change", function() {
      let id_provinsi = $(this).val();
      $.ajax({
        type: "get",
        url: "/data/kota/kabupaten/",
        data: {
          id: id_provinsi
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_provinsi = "<option selected disabled>-- Pilih Kabupaten/Kota --</option>";
          let kota_kabupaten = response.kota_kabupaten;
          kota_kabupaten.forEach(i => {
            tag_provinsi += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kabupaten_kota_ktp").html(tag_provinsi);
        }
      });
    });
    $("#kabupaten_kota_ktp").on("change", function() {
      let id_kabupaten_kota = $(this).val();

      $.ajax({
        type: "get",
        url: "/data/kecamatan/",
        data: {
          id: id_kabupaten_kota
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kecamatan = "<option selected disabled>-- Pilih Kecamatan --</option>";
          let kecamatan = response.kecamatan;
          kecamatan.forEach(i => {
            tag_kecamatan += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kecamatan_ktp").html(tag_kecamatan);
        }
      });
    });
    $("#kecamatan_ktp").on("change", function() {
      let id_kecamatan = $(this).val();

      $.ajax({
        type: "get",
        url: "/data/kelurahan/",
        data: {
          id: id_kecamatan
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kelurahan = "<option selected disabled>-- Pilih Kelurahan --</option>";
          let kelurahan = response.kelurahan;
          kelurahan.forEach(i => {
            tag_kelurahan += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kelurahan_ktp").html(tag_kelurahan);
        }
      });
    });

    // alamat domisili
    $("#provinsi_domisili").on("change", function() {
      let id_provinsi = $(this).val();
      $.ajax({
        type: "get",
        url: "/data/kota/kabupaten/",
        data: {
          id: id_provinsi
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_provinsi = "<option selected disabled>-- Pilih Kabupaten/Kota --</option>";
          let kota_kabupaten = response.kota_kabupaten;
          kota_kabupaten.forEach(i => {
            tag_provinsi += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kabupaten_kota_domisili").html(tag_provinsi);
        }
      });
    });
    $("#kabupaten_kota_domisili").on("change", function() {
      let id_kabupaten_kota = $(this).val();

      $.ajax({
        type: "get",
        url: "/data/kecamatan/",
        data: {
          id: id_kabupaten_kota
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kecamatan = "<option selected disabled>-- Pilih Kecamatan --</option>";
          let kecamatan = response.kecamatan;
          kecamatan.forEach(i => {
            tag_kecamatan += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kecamatan_domisili").html(tag_kecamatan);
        }
      });
    });
    $("#kecamatan_domisili").on("change", function() {
      let id_kecamatan = $(this).val();

      $.ajax({
        type: "get",
        url: "/data/kelurahan/",
        data: {
          id: id_kecamatan
        },
        dataType: "json",
        success: (response) => {
          console.log(response);
          let tag_kelurahan = "<option selected disabled>-- Pilih Kelurahan --</option>";
          let kelurahan = response.kelurahan;
          kelurahan.forEach(i => {
            tag_kelurahan += `<option value="${i.id}">${ i.nama }</option>`;
          });
          $("#kelurahan_domisili").html(tag_kelurahan);
        }
      });
    });

    $("#cek_alamat").on("change", function() {
      if ($("#cek_alamat:checked").val()) {
        $("div.alamat_domisili").addClass('d-none');
        console.log(1)
        $("#cek_alamat:checked").val()
      } else {
        $("div.alamat_domisili").removeClass('d-none');;
        console.log(0)
        $("#cek_alamat:checked").val()
      }
    });
  </script>
@endsection
