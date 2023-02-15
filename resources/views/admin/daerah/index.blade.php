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
                <table class="table table-bordered" id="scroll-x-daerah">
                  <thead>
                    <tr>
                      <th class="text-center">Nama Daerah</th>
                      <th class="text-center">Alamat Daerah</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $daerah->nama_daerah }}</td>
                      <td>{{ $daerah->alamat_daerah }}</td>
                      {{-- <td>
                        <a href="/sk/pimpinan/daerah/{{ $daerah->id_daerah }}" class="text-decoration-none">
                          <div class="border border-info btn-outline-info text-info rounded-pill text-center py-1">
                            <i class="fas fa-download"></i> download
                          </div>
                        </a>
                      </td> --}}
                      <td>
                        <a href="/data/daerah/{{ $daerah->id_daerah }}" class="btn btn-icon icon-left btn-info"><i
                            class="fas fa-file-pdf"></i> sk pimpinan
                        </a>
                        <a href="/data/daerah/{{ $daerah->id_daerah }}/edit" class="btn btn-icon icon-left btn-warning"><i
                            class="far fa-edit"></i> Edit
                        </a>
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
