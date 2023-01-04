{{-- @dd($daerah) --}}
@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Pimpinan Daerah 'Aisyiyah Kota Surakarta</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="scroll-x-daerah">
                  <thead>
                    <tr>
                      <th class="text-center">Nama Daerah</th>
                      <th class="text-center">Alamat Daerah</th>
                      <th class="text-center">SK Pimpinan Daerah</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($daerah as $d)
                      <tr>
                        <td>{{ $d->nama_daerah }}</td>
                        <td>{{ $d->alamat_daerah }}</td>
                        <td>{{ $d->sk_pimp_daerah }}</td>
                        <td>
                          <a href="" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i>
                            Edit</a>
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
@endsection
