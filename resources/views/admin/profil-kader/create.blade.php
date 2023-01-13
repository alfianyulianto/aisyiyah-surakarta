{{-- @dd($cabang) --}}
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
                          <label for="no_kta" class="form-label"><b>No KTA 'Aisyiyah <div
                                class="text-danger d-inline error-message">*Optional</div></b></label>
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
                          <label for="no_ktm" class="form-label"><b>No KTA Muhammadiyah <div
                                class="text-danger d-inline error-message">*Optional</div></b></label>
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
                            placeholder="Nama Lengkap (cnth: Alfian Yulianto)" value="{{ old('nama') }}">
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
                              @foreach ($nama_cabang as $id_cabang => $nama_cabang)
                                @if (old('cabang_id_cabang') == $id_cabang)
                                  <option value="{{ $id_cabang }}" selected>{{ $nama_cabang }}</option>
                                @else
                                  <option value="{{ $id_cabang }}">{{ $nama_cabang }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Cabang --</option>
                              @foreach ($nama_cabang as $id_cabang => $nama_cabang)
                                <option value="{{ $id_cabang }}">{{ $nama_cabang }}</option>
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
                              @foreach ($nama_ranting as $id_ranting => $nama_ranting)
                                @if (old('ranting_id_ranting') == $id_ranting)
                                  <option value="{{ $id_ranting }}" selected>{{ $nama_ranting }}</option>
                                @else
                                  <option value="{{ $id_ranting }}">{{ $nama_ranting }}</option>
                                @endif
                              @endforeach
                            @else
                              <option selected disabled>-- Pilih Cabang --</option>
                              @foreach ($nama_ranting as $id_ranting => $nama_ranting)
                                <option value="{{ $id_ranting }}">{{ $nama_ranting }}</option>
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
                          <label for="email" class="form-label"><b>Email <div
                                class="text-danger d-inline error-message">
                                *Optional</div></b></label>
                          <input type="email" class="form-control" name="email" id="email"
                            placeholder="Email (cnth:budidoremi@gmail.com)" value="{{ old('email') }}">
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
                              <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
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
                      <div class="col-lg-12">
                        <div class="mb-3">
                          <label for="alamat_asal_ktp" class="form-label"><b>Alamat KTP</b></label>
                          <input type="text" class="form-control" name="alamat_asal_ktp" id="alamat_asal_ktp"
                            placeholder="Alamat Sesuai KTP" value="{{ old('alamat_asal_ktp') }}">
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
                          <label for="alamat_rumah_tinggal" class="form-label"><b>Alamat Rumah</b></label>
                          <input type="text" class="form-control" name="alamat_rumah_tinggal"
                            id="alamat_rumah_tinggal" placeholder="Alamat Domisili"
                            value="{{ old('alamat_rumah_tinggal') }}">
                          @error('alamat_rumah_tinggal')
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
                          <label for="status_pernikahan" class="form-label"><b>Status Pernikahan</b></label>
                          <select class="form-control form-control-lg selectric" name="status_pernikahan"
                            id="status_pernikahan">
                            @if (old('status_pernikahan'))
                              @if (old('status_pernikahan') == 'Menikah')
                                <option disabled>-- Pilih Status --</option>
                                <option value="Menikah" selected>Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Janda">Janda</option>
                              @endif
                              @if (old('status_pernikahan') == 'Belum Menikah')
                                <option disabled>-- Pilih Status --</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah" selected>Belum Menikah</option>
                                <option value="Janda">Janda</option>
                              @endif
                              @if (old('status_pernikahan') == 'Janda')
                                <option disabled>-- Pilih Status --</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Janda" selected>Janda</option>
                              @endif
                            @else
                              <option selected disabled>-- Pilih Status --</option>
                              <option value="Menikah">Menikah</option>
                              <option value="Belum Menikah">Belum Menikah</option>
                              <option value="Janda">Janda</option>
                            @endif
                          </select>
                          @error('status_pernikahan')
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
                          <select class="form-control form-control-lg selectric"
                            name="pendidikan_terakhir_id_pendidikan_terakhir"
                            id="pendidikan_terakhir_id_pendidikan_terakhir">
                            @if (old('pendidikan_terakhir_id_pendidikan_terakhir'))
                              <option disabled>-- Pilih Pendidikan Terakhir --</option>
                              @foreach ($pendidikan_terakhir as $id_pendidikan_terakhir => $pendidikan_terakhir)
                                @if (old('pendidikan_terakhir_id_pendidikan_terakhir') == $id_pendidikan_terakhir)
                                  <option value="{{ $id_pendidikan_terakhir }}" selected>{{ $pendidikan_terakhir }}
                                  </option>
                                @else
                                  <option value="{{ $id_pendidikan_terakhir }}">{{ $pendidikan_terakhir }}</option>
                                @endif
                              @endforeach
                            @else
                              @foreach ($pendidikan_terakhir as $id_pendidikan_terakhir => $pendidikan_terakhir)
                                <option value="{{ $id_pendidikan_terakhir }}">{{ $pendidikan_terakhir }}</option>
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
  <script></script>
@endsection
