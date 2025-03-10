@extends('layouts.frontend')

@section('isi')
    <section id="bayarinvoice">
        <div class="container">
            <div class="row min-vh-100 justify-content-center align-items-center ">
                <div class="col-9 card p-4 shadow-lg border-1 m-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-10 text-center align-items-center">
                            <img src="/images/logo.png" alt="Logo" width="200px" class="img-fluid">
                        </div>
                    </div>
                    <h2 class="mt-3 text-center text-primary fw-bold">KONFIRMASI PEMBAYARAN RESERVASI</h2>
                    <hr class="my-3">
                    <div class="card-body">
                        <h4 class="text-dark fw-bold">Indentitas Pemesanan</h4>
                        <table class="table table-striped table-liight ">
                            <tr>
                                <td width="300">Kode Reservasi :</td>
                                <td>{{ $reservasi->kode }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pemesan :</td>
                                <td>{{ $reservasi->pelanggan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Check-in :</td>
                                <td>{{ \Carbon\Carbon::parse($reservasi->tgl_datang)->isoFormat('DD MMMM YYYY') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Check-out :</td>
                                <td>{{ \Carbon\Carbon::parse($reservasi->tgl_pulang)->isoFormat('DD MMMM YYYY') }}</td>
                            </tr>
                            <tr>
                                <td width="300">Tipe Kamar :</td>
                                <td>{{ $reservasi->kamar->tipe }}</td>
                            </tr>
                            <tr>
                                <td width="300">Jumlah Kamar :</td>
                                <td>{{ $reservasi->jml_kamar }}</td>
                            </tr>
                            <tr>
                                <td width="300">Jumlah Tamu :</td>
                                <td>{{ $reservasi->jml_tamu }}</td>
                            </tr>
                        </table>
                        <hr class="my-3">
                        <h4 class="text-dark fw-bold">Tata Cara Pembayaran</h4>
                        <p>Lakukan transfer ke BRI dengan ketentuan sebagai berikut;</p>
                        <ul>
                            <li>Nomor Rekening : <span class="text-danger fw-bold">2442067854</span></li>
                            <li>Tambahkan keterangan pada Transaksi: "Pembayaran reservasi untuk nomer reservasi <span
                                    class="fw-bold">{{ $reservasi->kode }}</span>"</li>
                            <li>Jumlah yang harus di bayar : <span
                                    class="text-danger fw-bold">Rp.{{ number_format($reservasi->total_bayar, 2, ',', '.') }}</span>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img src="/images/nofile.png" alt="" class="w-100" id="preview-img"
                                    style="width: 100%; height: 250px; object-fit: cover;">
                            </div>
                            <div class="col-8">
                                <form action="/konfirmasibayar" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $reservasi->id }}">
                                    <div class="mb-3">
                                        <label for="bukti" class="form-label fst-italic">Upload Bukti Pembayaran</label>
                                        <input type="file" class="form-control" name="bukti" id="bukti"
                                            onchange="return previewPhoto(event)" required>
                                    </div>
                                    <button class="btn btn-success rounded-2 btn-lg mt-3"
                                        onclick="return confirm('Yakin data pembayaran ini akan diKonfirmasi?')">
                                        <i class="fa fa-check-circle"></i> Konfirmasi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function previewPhoto(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview-img");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
