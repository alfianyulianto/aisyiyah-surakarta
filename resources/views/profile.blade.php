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
                  <form action="">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nik" class="form-label"><b>NIK</b></label>
                          <input type="text" class="form-control" name="nik" id="nik"
                            placeholder="Nomer Induk Kependudukan (cnth:3372******)" value="3372010107000002">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="kta" class="form-label"><b>No KTA 'Aisyiyah</b></label>
                          <input type="text" class="form-control" name="kta" id="kta"
                            placeholder="Kartu Tanda Anggota 'Aisyiyah" value="345678">
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="ktm" class="form-label"><b>No KTA Muhammadiyah</b></label>
                          <input type="text" class="form-control" name="ktm" id="ktm"
                            placeholder="Kartu Tanda Anggota Muhammadiyah" value="876543">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="nama" class="form-label"><b>Nama Lengkap</b></label>
                          <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Nama Lengkap (cnth: Budi Doremi)" value="Alfian Yulianto">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="email" class="form-label"><b>Email</b></label>
                          <input type="email" class="form-control" name="email" id="email"
                            placeholder="Email (cnth:budidoremi@gmail.com)" value="alfianyulianto36@gmail.com">
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
                              <select class="form-control form-control-lg select2">
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
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="form-group mb-3">
                              <label for="tempat_lahir" class="form-label"><b>Tanggal Lahir</b></label>
                              <input type="date" class="form-control datepicker" name="tanggal_lahir"
                                id="tanggal_lahir" value="2000-07-01">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_ktp" class="form-label"><b>Alamat KTP</b></label>
                          <input type="text" class="form-control" name="alamat_ktp" id="alamat_ktp"
                            placeholder="Alamat Asal"
                            value="Bratan rt 003 rw 006 Pajang Kecamatan Laweyan Kota Surakarta">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_rumah" class="form-label"><b>Alamat Rumah</b></label>
                          <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah"
                            placeholder="Alamat Domisili"
                            value="Ngenden rt 003 rw 006 Gentan Kecamatan Baki Kabupaten Sukoharjo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="status_pernikahan" class="form-label"><b>Status Pernikahan</b></label>
                          <select class="form-control form-control-lg selectric">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="Belum Menikah" selected>Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Janda">Janda</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="pekerjaan" class="form-label"><b>Pekerjaan</b></label>
                          <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                            placeholder="Pekerjaan Anda" value="Mahasiswa">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="status_pernikahan" class="form-label"><b>Pendidikan Terakhir</b></label>
                          <select class="form-control form-control-lg selectric">
                            <option selected disabled>-- Pilih Pendidikan Terakhir --</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA" selected>SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="no_ponsel" class="form-label"><b>Nomer Handphone</b></label>
                          <input type="text" class="form-control" name="no_ponsel" id="no_ponsel"
                            placeholder="Nomer Handphone (cnth: 081*****)" value="081217432366">
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
@endsection