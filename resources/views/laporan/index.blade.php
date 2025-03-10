@extends('layouts.backend')

{{-- @section('content')
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
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Laporan Heaven Hotel</h3>
                    <hr class="my-4">
                    <table class="table  table-hover table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th class="py-3 text-center">NO</th>
                                <th class="py-3 text-center">NO. Reservasi</th>
                                <th class="py-3 text-center">Nama Pelanggan</th>
                                <th class="py-3 text-center">Tipe Kamar</th>
                                <th class="py-3 text-center">Tamu</th>
                                <th class="py-3 text-center">Jumlah</th>
                                <th class="py-3 text-center"> Check-in/Check-out</th>
                                <th class="py-3 text-center">Status</th>
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
                                        {{ \Carbon\Carbon::parse($item->tgl_datang)->isoFormat('D') }} -
                                        {{ \Carbon\Carbon::parse($item->tgl_pulang)->isoFormat('D MMMM YYYY') }}
                                    </td>
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
                                    <td class="py-3 text-center">
                                        <a href="/laporan/delete/{{ $item->id }}" class="btn text-bg-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

