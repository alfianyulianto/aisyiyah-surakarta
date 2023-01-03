@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Tambah Kader 'Aisyiyah</h1>
    </div>

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
                          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                            id="nik" placeholder="Nomer Induk Kependudukan (cnth:3372******)" autofocus>
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
                          <input type="text"
                            class="form-control @error('no_kta')
                              is-invalid
                          @enderror"
                            name="no_kta" id="no_kta" placeholder="Kartu Tanda Anggota 'Aisyiyah">
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
                            id="no_ktm" placeholder="Kartu Tanda Anggota Muhammadiyah">
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
                            id="nama" placeholder="Nama Lengkap (cnth: Budi Doremi)">
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
                            id="email" placeholder="Email (cnth:budidoremi@gmail.com)">
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
                              <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                              <input type="date"
                                class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" id="tanggal_lahir">
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
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_ktp" class="form-label"><b>Alamat KTP</b></label>
                          <input type="text" class="form-control @error('alamat_ktp') is-invalid @enderror"
                            name="alamat_ktp" id="alamat_ktp" placeholder="Alamat Sesuai KTP">
                          @error('alamat_ktp')
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
                          <label for="alamat_rumah" class="form-label"><b>Alamat Rumah</b></label>
                          <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror"
                            name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Domisili">
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
                          <label for="status_pernikahan" class="form-label"><b>Status Pernikahan</b></label>
                          <select class="form-control form-control-lg selectric" name="status_pernikahan"
                            id="status_pernikahan">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Janda">Janda</option>
                          </select>
                          @error('status_pernikahan')
                            <div style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;}">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan Anda">
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
                          <label for="pendidikan_terakhir" class="form-label"><b>Pendidikan Terakhir</b></label>
                          <select class="form-control form-control-lg selectric" name="pendidikan_terakhir"
                            id="pendidikan_terakhir">
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
                            <div style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;}">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_ponsel" class="form-label"><b>Nomer Handphone</b></label>
                          <input type="text" class="form-control @error('no_ponsel') is-invalid @enderror"
                            name="no_ponsel" id="no_ponsel" placeholder="Nomer Handphone (cnth: 081*****)">
                          @error('no_ponsel')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
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
@endsection
