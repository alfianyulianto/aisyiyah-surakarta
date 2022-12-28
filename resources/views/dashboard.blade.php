@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <h1>Untuk Admin atau Admin Daerah</h1>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kader</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-building"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Cabang</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-warehouse"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Ranting</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>

    <h1>Untuk Admin Cabang</h1>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kader</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-warehouse"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Ranting</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>

    <h1>Untuk Admin Ranting</h1>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kader</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-lg-2 mb-3">
                  <img src="{{ url('') }}/img/avatar-3.png" class="rounded mx-auto d-block" alt=""
                    width="160">
                </div>
                <div class="col-lg-10">
                  <div class="d-inline py-3">
                    <p class="mb-0 px-0 text-primary" style="font-size: 20px; font-weight: bold; line-height: 28px">
                      <b class="text-uppercase">Alfian Yulianto</b> <b>(Admin)</b>
                    </p>
                    <p class="mb-0">
                      <i class="fas fa-user-tag"></i><span class="mx-3">Jabatan - Ketua</span>
                    </p>
                    <p class="mb-0">
                      <i class="fas fa-phone"></i><span class="mx-3">081217432366</span>
                    </p>
                    <p class="mb-0">
                      <i class="fas fa-envelope"></i><span class="mx-3">alfianyulianto36@gmail.com</span>
                    </p>
                    <div class="buttons mt-2">
                      <a href="/images/upload" class="btn btn-icon icon-left btn-primary"><i class="fas fa-upload"></i>
                        Upload Image</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Nomer Induk Kependudukan</b></p>
                  <p class="lh-none">3372010107000002</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>KTA Aisyiyah</b></p>
                  <p class="lh-none">123456789</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>KTA Muhammadiyah</b></p>
                  <p class="lh-none">987654321</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Tempat Tanggal Lahir</b></p>
                  <p class="lh-none">01 Juli 20000</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Alamat Asal (KTP)</b></p>
                  <p class="lh-none">Bratan RT 003 / RW 006 Kelurahan Pajang Kecamatan Laweyan Kota Surakarta</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Alamat Rumah Tinggal</b></p>
                  <p class="lh-none">Ngenden RT 005 RW 008 Kelurahan Gentan Kecamatan Baki Kabupaten Sukoharjo</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-0"><b>Status Pernikahan</b></p>
                  <p class="lh-none">Belum Menikah</p>
                </div>
                <div class="col-lg-4">
                  <p class="mb-0"><b>Pekerjaan</b></p>
                  <p class="lh-none">Guru Sekolah Menengan Pertama</p>
                </div>
                <div class="col-lg-4">
                  <a href="" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i>Edit
                    Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
