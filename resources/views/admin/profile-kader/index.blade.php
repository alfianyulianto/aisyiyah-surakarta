@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Profile Kader 'Aisyiyah</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <a href="/profile/kader/create" class="btn btn-icon icon-left btn-primary mb-3"><i
                  class="fas fa-user-plus"></i>
                Tambah Kader</a>
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>NIK</th>
                      <th>No KTA Aisyiyah</th>
                      <th>No KTA Muhammadiyah</th>
                      <th>Nama</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Alamat Asal (KTP)</th>
                      <th>Alamat Rumah (Tinggal)</th>
                      <th>Status Pernikahan</th>
                      <th>Pekerjaan</th>
                      <th>No. Handphone</th>
                      <th>Email</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>3372010107000002</td>
                      <td>334455</td>
                      <td>554433</td>
                      <td>Alfian Yulianto</td>
                      <td>Surakarta, 01 Juli 2000</td>
                      <td>Bratan rt 003 / rw 006 Kelurahan Pajang Kecamatan Laweyan Kota Surakarta</td>
                      <td>Ngenden rt 005 rw 008 euraan gentan Kecamatan Baki Kabupaten Sukoharjo</td>
                      <td>Belum Menikah</td>
                      <td>Mahasiswa</td>
                      <td>081217432366</td>
                      <td>alfian@gmail.com</td>
                      <td>S1</td>
                      <td>
                        <a href="" class="btn btn-icon icon-left btn-warning">Edit</a>
                        <a href="" class="btn btn-icon icon-left btn-danger">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
