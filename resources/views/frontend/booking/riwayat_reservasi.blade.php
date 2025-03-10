@extends('layouts.frontend')

@section('isi')
    <section id="riwayat">
        <div class="container">
            <div class="row justify-content-center">
                @if (session('info'))
                    <div class="alert alert-secondary alert-dismissible fade show position-absolute py-3" role="alert"
                        style="z-index: 999; left: 50%; transform:translateX(-50%);">
                        <strong>Selamat!</strong> {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-12 card p-4 shadow-lg border-2 m-4 rounded-5
                ">
                    <h1 class="mt-5">RIWAYAT RESERVASI</h1>
                    <hr class="my-4">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="table-dark ">
                                <th class="py-3 text-center">No</th>
                                <th class="py-3 text-center">Kode Reservasi</th>
                                <th class="py-3 text-center">Tipe Kamar</th>
                                <th class="py-3 text-center">Jumlah</th>
                                <th class="py-3 text-center">Banyaknya Tamu</th>
                                <th class="py-3 text-center">Tanggal Check-in</th>
                                <th class="py-3 text-center">Tanggal Check-out</th>
                                <th class="py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $key => $res)
                                <tr class="table-light">
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $res->kode }}</td>
                                    <td class="text-center">{{ $res->kamar->tipe }}</td>
                                    <td class="text-center">{{ $res->jml_kamar }}</td>
                                    <td class="text-center">{{ $res->jml_tamu }}</td>
                                    <td class="text-center">{{ $res->tgl_datang }}</td>
                                    <td class="text-center">{{ $res->tgl_pulang }}</td>
                                    <td class="text-center">
                                        @if ($res->status == 'dipesan')
                                            <a href="/bayarinvoice/{{ $res->id }}"
                                                class="btn btn-sm btn-success rounded-3 ">
                                                <i class="fas fa-money-bill-wave-alt"></i> Bayar Invoice</a>
                                        @else
                                            <a href="/cetakinvoice/{{ $res->id }}"
                                                class="btn btn-sm btn-info rounded-3 ">
                                                <i class="fas fa-file-pdf"></i> Cetak Invoice</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
