@extends('layouts.frontend')

@section('isi')
    <section id="reservasi">
        <div class="container">
            <div class="row min-vh-100 justify-content-center align-items-center">
                <div class="col-6  card p-4 shadow-lg border-1 mb-4">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <img src="/images/logo.png" alt="" width="110px">
                        </div>
                        <div class="col-6">
                            <div class="card text-bg-info border-0 text-center">
                                <p class=" m-0">Kode Reservasi</p>
                                <h5 class="m-0 text-danger">{{ $kode }}</h5>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-3 text-center text-primary fw-bold">FORM RESERVASI HOTEL</h1>
                    <hr class="my-3">
                    <div class="card-body">
                        <h6 class="text-dark fw-bold">Indentitas Pemesanan</h6>
                        <form action="/konfirmasi" method="POST">
                            @csrf
                            <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">
                            <input type="hidden" name="total_bayar" value="{{ $total_bayar }}">
                            <input type="hidden" name="pelanggan_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="kode" value="{{ $kode }}">
                            <div class="row mb-3">
                                <label for="nama" class="col-3 col-form-label">Nama Pemesanan</label>
                                <div class="col-8">
                                    <input type="nama" class="form-control bg-secondary" id="nama" readonly
                                        value="{{ auth()->user()->nama }}" name="nama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-3 col-form-label">Alamat Email</label>
                                <div class="col-8">
                                    <input type="email" class="form-control bg-secondary" id="email" readonly
                                        value="{{ auth()->user()->email }}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-3 col-form-label">Nomer Hp</label>
                                <div class="col-8">
                                    <input type="no_hp" class="form-control bg-secondary" id="no_hp" readonly
                                        value="{{ auth()->user()->no_hp }}" name="no_hp">
                                </div>
                            </div>
                            <hr class=" my-3">
                            <h6 class="text-dark fw-bold">Detail Reservasi</h6>
                            <div class="row mb-3">
                                <label for="tipe" class="col-4 col-form-label">Tipe Kamar</label>
                                <div class="col-8">
                                    <input type="text" class="form-control bg-primary" id="tipe" readonly
                                        value="{{ $kamar->tipe }}" name="tipe">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_datang" class="col-4 col-form-label">Tanggal Kedatangan</label>
                                <div class="col-8">
                                    <input type="date" class="form-control bg-primary" id="tgl_datang" readonly
                                        value="{{ $tgl_datang }}" name="tgl_datang">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_pulang" class="col-4 col-form-label">Tanggal Kepulangan</label>
                                <div class="col-8">
                                    <input type="date" class="form-control bg-primary" id="tgl_pulang" readonly
                                        value="{{ $tgl_pulang }}" name="tgl_pulang">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jml_kamar" class="col-4 col-form-label">Jumlah Kamar</label>
                                <div class="col-8">
                                    <input type="number" class="form-control bg-primary" id="jml_kamar" readonly
                                        value="{{ $jml_kamar }}" name="jml_kamar">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jml_tamu" class="col-4 col-form-label">Jumlah Tamu</label>
                                <div class="col-8">
                                    <input type="number" class="form-control bg-primary" id="jml_tamu" readonly
                                        value="{{ $jml_tamu }}" name="jml_tamu">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="total_bayar" class="col-4 col-form-label">Total Bayar</label>
                                <div class="col-8">
                                    <input type="text" class="form-control bg-danger" id="total_bayar" readonly
                                        value="Rp. {{ number_format($total_bayar, 2, ',', '.') }}" >
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-danger">
                                    <i class="icon-action-undo"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Yakin Konfirmasi?')">
                                    <i class="icon-wallet"></i> konfirmasi Pemesanan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
