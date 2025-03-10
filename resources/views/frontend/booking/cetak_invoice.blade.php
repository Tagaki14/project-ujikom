<html lang="Id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" href="/images/icon.png">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 card p-4 shadow-lg border-2">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-primary fw-bold">Pembayaran<span class="text-warning"> Hotel Hebat</span>
                        </h2>
                        <img src="/images/logo.png" alt="logo" class="img-fluid" style="height: 75px;">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-5 lh-1">
                        <h4 class="fw-semibold">Itinerary ID</h4>
                        <p class="fw-semibold  fs-5">{{ $reservasi->kode }}</p>
                        <p class="text-sm">Booked and payable by Traveloka</p>
                    </div>
                    <div class="col-8 lh-1">
                        <h4 class="fw-bold">YATS Colony <span class="text-warning">★★★</span></h4>
                        <p class="text-sm">Jalan. Jatiluhur Permai No. 169 Purwakarta</p>
                        <p class="text-sm"> Telepon: +0264678901 / +0264678901</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end lh-1 text-center">
                    <div class="col-3 border-start border-2 border-primary">
                        <p class="text-md">Tanggal Check-in</p>
                        <p class="fw-bold">
                            {{ \Carbon\Carbon::parse($reservasi->tgl_datang)->isoFormat('DD MMMM YYYY') }}</p>
                        <p class="text-sm text-primary"><i class="fas fa-clock"></i> 14:00</p>
                    </div>
                    <div class="col-4  border-start border-2 border-primary">
                        <p class="text-md">Tanggal Check-out</p>
                        <p class="text-sm fw-bold">
                            {{ \Carbon\Carbon::parse($reservasi->tgl_pulang)->isoFormat('DD MMMM YYYY') }}</p>
                        <p class="text-sm text-primary
                        "><i class="fas fa-clock"></i> 12:00</p>
                    </div>
                </div>
                <hr class="">
                <div class="mb-4">
                    <h4 class="text-lg fw-semibold">Detail Pesanan</h4>
                    <table class="table table-striped table-light">
                        <thead>
                            <tr class="">
                                <th class="py-2 text-center">No.</th>
                                <th class="py-2 text-center">Tipe Kamar</th>
                                <th class="py-2 text-center">Tamu</th>
                                <th class="py-2 text-center">Banyaknya Tamu</th>
                                <th class="py-2 text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="py-2 text-center">{{ $reservasi->id }}</td>
                                <td class="py-2 text-center">{{ $reservasi->kamar->tipe }}</td>
                                <td class="py-2 text-center">{{ $reservasi->pelanggan->nama }}</td>
                                <td class="py-2 text-center">{{ $reservasi->jml_tamu }}</td>
                                <td class="py-2 text-center">
                                    Rp.{{ number_format($reservasi->total_bayar, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="col-5">
                        <h5 class="text-lg fw-bold">Termasuk</h5>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h5 class="text-lg fw-bold">Permintaan Khusus</h5>
                        <ul>
                            <li>Bebas Asap Rokok</li>
                        </ul>
                    </div>
                </div>
                <hr class="">
                <div class="list1">
                    <h4 class="text-lg fw-semibold">Kebijakan Pembatalan Hotel</h4>
                    <ul class="list-disc pl-5 text-sm">
                        <li>Biaya pembatalan sebelum tanggal
                            {{ \Carbon\Carbon::parse($reservasi->tgl_expired)->isoFormat('DD MMMM YYYY') }}.</li>
                        <li>Pesanan tidak dapat dibatalkan setelah
                            {{ \Carbon\Carbon::parse($reservasi->tgl_expired)->isoFormat('DD MMMM YYYY') }}.</li>
                        <li>Waktu yang ditampilkan sesuai dengan waktu lokal akomodasi.</li>
                        <li>Reservasi ini bisa di-reschedule sebelum 21 Mei 2024 13:00, namun dapat dikenakan biaya
                            pembatalan.
                        </li>
                        <li>Jika Anda melakukan reschedule, kupon atau poin yang digunakan di pesanan awal tidak berlaku
                            dalam
                            pesanan baru.</li>
                        <li>Selain itu, biaya reschedule tambahan dapat berlaku, berdasarkan perbedaan harga dari
                            pesanan baru.</li>
                    </ul>
                </div>
                <hr class="">
                <div class="list">
                    <h4 class="text-lg fw-semibold">Catatan Penting</h4>
                    <ul class="list-disc pl-5 text-sm">
                        <li>Tamu mungkin perlu menunjukkan sertifikat vaksinasi COVID-19 untuk dapat menginap di
                            akomodasi.
                            Silahkan hubungi hotel untuk info lebih lanjut sebelum Anda check-in.</li>
                        <li>Kebijakan Mengenai Deposit</li>
                        <li>Deposit Rp. 500.000,00 akan diminta saat check-in. Akomodasi menerima tunai, kartu debit
                            atau kredit.
                        </li>
                    </ul>
                </div>
                <hr class="">
                <h5 class="fw-semibold">Kami siap membantu</h5>
                <div class="d-flex justify-content-between">
                    <div class="col-5">
                        <p>Informasikan {{ $reservasi->kode }} pesanan Resepsionis-mu 0264678901 saat menghubungi kami
                            melalui telepon atau email.</p>
                    </div>
                    <div class="col-2">
                        <p class="mb-0"><i class="fas fa-phone-alt"></i> 0804-1500-308</p>
                        <p class="mb-0"><i class="fas fa-envelope"></i> cs@traveloka.com</p>
                    </div>
                    <div class="col-2">
                        <p class="text-primary mb-0 "><i class="fas fa-headset"></i> Hubungi Kami</p>
                        <p class="text-primary mb-0 "><i class="fas fa-question"></i> Pusat Bantuan</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/hlkh9RoTdjTJdLxBJO7LvEsgP5fuS_8lZE6026Ac3hc.jpg"
                            alt="No need to print icon" class="img-fluid" style="height: 50px;">
                        <p class="mb-0">Tidak Perlu Dicetak</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/S2LR0hlR-MPiH12Bkn7vSCAjWThyZulOlWAomLcLeF0.jpg"
                            alt="Check-in problem icon" class="img-fluid" style="height: 50px;">
                        <p class="mb-0">Masalah Check-In?</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/0RpFiWhzQRsfgrH6dZYYriwd-rmUUsVyu2U8FdyEWHM.jpg"
                            alt="Traveloka app icon" class="img-fluid" style="height: 50px;">
                        <p class="mb-0">Download Traveloka App</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


