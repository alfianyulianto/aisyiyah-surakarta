@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>My Profile</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-10">
                  <form action="/data/profil/update" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nik" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                            id="nik" placeholder="Nomer Induk Kependudukan (cnth:3372******)"
                            value="3372010107000002" autofocus>
                          @error('nik')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_kta" class="form-label"><b>No KTA 'Aisyiyah</b></label>
                          <input type="text" class="form-control @error('no_kta') is-invalid @enderror" name="no_kta"
                            id="no_kta" placeholder="Kartu Tanda Anggota 'Aisyiyah" value="345678">
                          @error('no_kta')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <input type="text" class="form-control @error('no_ktm') is-invalid @enderror" name="no_ktm"
                            id="no_ktm" placeholder="Kartu Tanda Anggota Muhammadiyah" value="876543">
                          @error('no_ktm')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nama" class="form-label"><b>Nama Lengkap</b></label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" placeholder="Nama Lengkap (cnth: Budi Doremi)" value="Alfian Yulianto">
                          @error('nama')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <select
                            class="form-control form-control-lg select2 @error('cabang_id_cabang') is-invalid @enderror"
                            name="cabang_id_cabang" id="cabang_id_cabang">
                            <option selected disabled>-- Pilih Cabang --</option>
                            <option value="Jebres">Jebres</option>
                            <option value="Kota Bengawan">Kota Bengawan</option>
                            <option value="Kota Barat">Kota Barat</option>
                            <option value="Laweyan">Laweyan</option>
                            <option value="Solo Selatan">Solo Selatan</option>
                            <option value="Solo Utara">Solo Utara</option>
                          </select>
                          @error('cabang_id_cabang')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="ranting_id_ranting" class="form-label"><b>Ranting Aisyiyah</b></label>
                          <select
                            class="form-control form-control-lg select2 @error('ranting_id_ranting') is-invalid @enderror"
                            name="ranting_id_ranting" id="ranting_id_ranting">
                            <option selected disabled>-- Pilih Ranting --</option>
                            <option value="Sumber Barat">Sumber Barat</option>
                            <option value="Sumber Timur">Sumber Timur</option>
                            <option value="Badran">Badran</option>
                            <option value="Timuran">Timuran</option>
                          </select>
                          @error('ranting_id_ranting')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="email" class="form-label"><b>Email</b></label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Email (cnth:budidoremi@gmail.com)"
                            value="alfianyulianto36@gmail.com">
                          @error('email')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="jenis_kelamin" class="form-label"><b>Jenis Kelamin</b></label>
                          <div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki"
                                value="Laki-Laki" checked>
                              <label class="form-check-label" for="laki-laki">
                                Laki-Laki
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                value="Perempuan">
                              <label class="form-check-label" for="perempuan">
                                Perempuan
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-5">
                            <div class="mb-3">
                              <label for="tempat_lahir" class="form-label"><b>Tempat Lahir</b></label>
                              <select
                                class="form-control form-control-lg select2 @error('tempat_lahir') is-invalid @enderror"
                                name="tempat_lahir" id="tempat_lahir">
                                <option selected disabled>-- Pilih Kota --</option>
                                <option value="Surakarta" selected>Surakarta</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bogor">Bogor</option>
                                <option value="Depok">Depok</option>
                                <option value="Tangerang">Tangerang</option>
                                <option value="Bekasi">Bekasi</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Yogyakarta">Yogyakarta</option>
                                <option value="Surabaya">Surabaya</option>
                              </select>
                              @error('tempat_lahir')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="form-group mb-3">
                              <label for="tempat_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                              <input type="date"
                                class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" id="tanggal_lahir" value="2000-07-01">
                              @error('tanggal_lahir')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <select
                            class="form-control form-control-lg selectric @error('status_pernikahan') is-invalid @enderror"
                            name="status_pernikahan" id="status_pernikahan">
                            <option selected disabled>-- Pilih ProvinStatussi --</option>
                            <option value="Belum Menikah" selected>Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Janda">Janda</option>
                          </select>
                          @error('status_penikahan')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan Anda" value="Mahasiswa">
                          @error('pekerjaan')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="status_pernikahan" class="form-label"><b>Pendidikan Terakhir</b></label>
                          <select
                            class="form-control form-control-lg selectric @error('pendidikan_terakhir') is-invalid @enderror"
                            name="pendidikan_terakhir" id="pendidikan_terakhir">
                            <option selected disabled>-- Pilih Pendidikan Terakhir --</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                          @error('pendidikan_terakhir')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_ponsel" class="form-label"><b>Nomer Handphone</b></label>
                          <input type="text" class="form-control @error('no_ponsel') is-invalid @enderror"
                            name="no_ponsel" id="no_ponsel" placeholder="Nomer Handphone (cnth: 081*****)"
                            value="081217432366">
                          @error('no_ponsel')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <input type="text" class="form-control @error('alamat_ktp') is-invalid @enderror"
                            name="alamat_ktp" id="alamat_ktp"
                            placeholder="Masukan nama jalan atau nama kampung beserta RT / RW">
                          @error('alamat_ktp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <select
                            class="form-control form-control-lg select2 @error('provinsi_ktp') is-invalid @enderror"
                            name="provinsi_ktp" id="provinsi_ktp">
                            <option selected disabled>-- Pilih Provinsi --</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                          </select>
                          @error('provinsi_ktp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kabupaten_kota_ktp" class="form-label"><b>Kabupaten/Kota</b></label>
                          <select
                            class="form-control form-control-lg select2 @error('kabupaten_kota_ktp') is-invalid @enderror"
                            name="kabupaten_kota_ktp" id="kabupaten_kota_ktp">
                            <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                            <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                            <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                            <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                            <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                          </select>
                          @error('kabupaten_kota_ktp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                          <select
                            class="form-control form-control-lg select2 @error('kecamatan_ktp') is-invalid @enderror"
                            name="kecamatan_ktp" id="kecamatan_ktp">
                            <option selected disabled>-- Pilih Kecamatan --</option>
                            <option value="Kecamatan Laweyan">Kecamatan Laweyan</option>
                            <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                            <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                            <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                          </select>
                          @error('provinsi_ktp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kelurahan_ktp" class="form-label"><b>Kelurahan</b></label>
                          <select
                            class="form-control form-control-lg select2 @error('kelurahan_ktp') is-invalid @enderror"
                            name="kelurahan_ktp" id="kelurahan_ktp">
                            <option selected disabled>-- Pilih Kelurahan --</option>
                            <option value="Pajang">Pajang</option>
                            <option value="Sondakan">Sondakan</option>
                            <option value="Bumi">Bumi</option>
                            <option value="Laweyan">Laweyan</option>
                          </select>
                          @error('kelurahan_ktp')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
                    <div class="alamat_rumah {{ old('cek_alamat') ? 'd-none' : '' }}">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="mb-3">
                            <label for="alamat_rumah" class="form-label"><b>Alamat Domisili</b></label>
                            <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror"
                              name="alamat_rumah" id="alamat_rumah"
                              placeholder="Masukan nama jalan atau nama kampung beserta RT / RW">
                            @error('alamat_rumah')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="provinsi_rumah" class="form-label"><b>Domisili Provinsi</b></label>
                            <select
                              class="form-control form-control-lg select2 @error('provinsi_rumah') is-invalid @enderror"
                              name="provinsi_rumah" id="provinsi_rumah">
                              <option selected disabled>-- Pilih Provinsi --</option>
                              <option value="Jawa Tengah">Jawa Tengah</option>
                              <option value="Jawa Barat">Jawa Barat</option>
                              <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                            @error('provinsi_rumah')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="kabupaten_kota_rumah" class="form-label"><b>Domisili Kabupaten/Kota</b></label>
                            <select
                              class="form-control form-control-lg select2 @error('kabupaten_kota_rumah') is-invalid @enderror"
                              name="kabupaten_kota_rumah" id="kabupaten_kota_rumah">
                              <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                              <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                              <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                              <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                              <option value="Kabupaten Sukoharjo">Kabupaten Sukoharjo</option>
                            </select>
                            @error('kabupaten_kota_rumah')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="kecamatan_rumah" class="form-label"><b>Domisili Kecamatan</b></label>
                            <select
                              class="form-control form-control-lg select2 @error('kecamatan_rumah') is-invalid @enderror"
                              name="kecamatan_rumah" id="kecamatan_rumah">
                              <option selected disabled>-- Pilih Kecamatan --</option>
                              <option value="Kecamatan Laweyan">Kecamatan Laweyan</option>
                              <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                              <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                              <option value="Kecamatan Banjarsari">Kecmatan Banjarsari"</option>
                            </select>
                            @error('provinsi_rumah')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                            <label for="kelurahan_rumah" class="form-label"><b>Domisili Kelurahan</b></label>
                            <select
                              class="form-control form-control-lg select2 @error('kelurahan_rumah') is-invalid @enderror"
                              name="kelurahan_rumah" id="kelurahan_rumah">
                              <option selected disabled>-- Pilih Kelurahan --</option>
                              <option value="Pajang">Pajang</option>
                              <option value="Sondakan">Sondakan</option>
                              <option value="Bumi">Bumi</option>
                              <option value="Laweyan">Laweyan</option>
                            </select>
                            @error('kelurahan_rumah')
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
  <script>
    $("#cek_alamat").on("change", function() {
      if ($("#cek_alamat:checked").val()) {
        $("div.alamat_rumah").addClass('d-none');
        console.log(1)
        $("#cek_alamat:checked").val()
      } else {
        $("div.alamat_rumah").removeClass('d-none');;
        console.log(0)
        $("#cek_alamat:checked").val()
      }
    });
  </script>
@endsection
