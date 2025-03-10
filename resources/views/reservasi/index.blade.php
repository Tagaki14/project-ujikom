@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('info'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    {{-- <div class="card shadow-lg rounded-5">
                    <div class="card-body">
                        <h5>Data Reservasi Hotel Hebat</h5>
                        @if (session('info'))
                            <div class="col-12 mb-2">
                                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    {{ session('info') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <hr>
                        <a href="/reservasi/create" class="btn text-bg-primary rounded-5 mb-3">
                            <i class="icon-plus"></i> Tambah Data Tamu
                        </a>
                        <table class="table table-hover table-striped ">
                            <thea>
                                <tr class=" table-dark">
                                    <th class="py-3 text-center">No</th>
                                    <th class="py-3 text-center">Nama Tamu</th>
                                    <th class="py-3 text-center">Kode Reservasi</th>
                                    <th class="py-3 text-center">Tipe Kamar</th>
                                    <th class="py-3 text-center">Jumlah</th>
                                    <th class="py-3 text-center">Banyaknya Tamu</th>
                                    <th class="py-3 text-center">Tanggal Check-in/Check-out</th>
                                    <th class="py-3 text-center">Status</th>
                                    <th class="py-3 text-center">Aksi</th>
                                </tr>
                            </thea>
                            <tbody class="table-light">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($reservasi as $res)
                                    <tr class=" table-light">
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $res->pelanggan->nama }}</td>
                                        <td class="text-center">{{ $res->kode }}</td>
                                        <td class="text-center">{{ $res->kamar->tipe }}</td>
                                        <td class="text-center">{{ $res->jml_kamar }}</td>
                                        <td class="text-center">{{ $res->jml_tamu }}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($res->tgl_datang)->isoFormat('DD  ') }} -
                                            {{ \Carbon\Carbon::parse($res->tgl_pulang)->isoFormat('DD MMMM  YYYY') }}
                                        </td>
                                        <td class="text-center">{{ $res->status }}</td>
                                        {{-- <td>
                                            <a href="/reservasi/{{ $res->id }}"
                                                class="badge {{ $res->status == '' ? 'bg-success text-white' : 'bg-warning text-dark' }}"
                                                onclick="return confirm('Ubah Status keaktifan')"> {{ $res->status }} </a>
                                        </td>
                                        <td class=" text-center">
                                            <a href="/reservasi/edit/{{ $res->id }} " class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="/reservasi/delete/{{ $res->id }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin data ini akan di hapus?') ">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div> --}}
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Reservasi Heaven Hotel</h3>
                    <hr class="my-4">
                    <table class="table  table-hover table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th class="py-3 text-center">NO</th>
                                <th class="py-3 text-center">NO. Reservasi</th>
                                <th class="py-3 text-center">Pemesanan</th>
                                <th class="py-3 text-center">Tipe Kamar</th>
                                <th class="py-3 text-center">Tamu</th>
                                <th class="py-3 text-center">Jumlah</th>
                                <th class="py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $key => $item)
                                <tr class="table-light">
                                    <td class="py-3 text-center">{{ $key + 1 }}</td>
                                    <td class="py-3 text-center">{{ $item->kode }}</td>
                                    <td class="py-3 text-center">{{ $item->pelanggan->nama }}</td>
                                    <td class="py-3 text-center">{{ $item->kamar->tipe }}</td>
                                    <td class="py-3 text-center">{{ $item->jml_tamu }}</td>
                                    <td class="py-3 text-center">{{ $item->jml_kamar }}</td>
                                    <td class="py-3 text-center">
                                        @if ($item->status == 'dibayar')
                                            <a href="/reservasi/checkin/{{ $item->id }}"
                                                class="btn text-bg-primary btn-sm rounded-3 w-50"
                                                onclick="return confirm('Konfirmasikan proses checkin?')">
                                                <i class="icon-check"></i> Check-in
                                            </a>
                                        @elseif($item->status == 'checkin')
                                            <a href="/reservasi/checkout/{{ $item->id }}"
                                                class="btn text-bg-danger btn-sm rounded-3 w-50"
                                                onclick="return confirm('Konfirmasikan proses checkout?')">
                                                <i class="icon-close"></i> Check-out
                                            </a>
                                        @elseif($item->status == 'selesai')
                                            <button class="btn text-bg-secondary btn-sm rounded-3 w-50">
                                                <i class="icon-notebook"></i> Selesai
                                            </button>
                                        @else
                                            <button class="btn text-bg-warning btn-sm rounded-3 w-50">
                                                <i class="icon-speedometer"></i> Watting..
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="checkinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="checkinModalLabel">Detail Kamar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/checkin" method="post">
                        @csrf
                        <input type="hidden" name="reservasi_id" id="reservasi_id" value="1">
                        <div class="form-group">
                            <label for="" class="form-label">Nomor Kamar</label>
                            <input type="text" class="form-control" name="nomor" id="nomor" value="0001"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="tamu" class="form-label">Nomor Tamu</label>
                            <select class="form-control" name="tamu[]" id="tamu[]">
                                <option value="">Pilih Tamu</option>
                                <option value="dedi">Dedi Nugraha</option>
                                <option value="dodo">Dodo Nugroho</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tamu" class="form-label">Nomor Tamu</label>
                            <select class="form-control" name="tamu[]" id="tamu[]">
                                <option value="">Pilih Tamu</option>
                                <option value="dedi">Dedi Nugraha</option>
                                <option value="dodo">Dodo Nugroho</option>
                            </select>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn text-bg-primary rounded-3 fw-bold">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
