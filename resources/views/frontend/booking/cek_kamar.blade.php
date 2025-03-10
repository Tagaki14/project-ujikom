@extends('layouts.frontend')

@section('isi')
    <section id="cekkamar">
        <div class="container-fluid bg-dark">
            <div class="row">
                <h1 class="text-center text-light fw-bold mt-5"> Chek Kesediaan Kamar</h1>
                <p class="lead text-center text-light fst-italic mt-3">
                    Berikut adalah kamar tersedia pada
                    {{ \Carbon\Carbon::parse($tgl_datang)->isoFormat('DD') }} -
                    {{ \Carbon\Carbon::parse($tgl_pulang)->isoFormat('DD MMMM YYYY') }}
                </p>
                @foreach ($kamar as $item)
                    <div class="row align-items-center p-3 justify-content-center"
                        {{ $jmlKamar[$item->id] < 1 ? 'hidden' : '' }}>
                        <div class="col-4 mb-5">
                            <img src="/storage/kamar/{{ $item->photo }}" alt="" class="w-100 img-thubnail rounded-5">
                        </div>
                        <div class="col-4">
                            <h3 class=" text-primary  fw-bold">{{ $item->tipe }} Room</h3>
                            <p class=" text-light">Harga per Malam : Rp.{{ number_format($item->harga, 2, ',', '.') }}</p>
                            <p class=" text-light">Jumlah Tersedia : {{ $jmlKamar[$item->id] }}</p>
                            <ul class=" text-light">
                                @foreach ($item->detailfasilitas as $fasilitas)
                                    <li>{{ $fasilitas->fasilitas->nama }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-2">
                            <form action="/pemesanan" method="post">
                                @csrf
                                <input type="hidden" name="kamar_id" value="{{ $item->id }}">
                                <input type="hidden" name="jml_tamu" value="{{ $jml_tamu }}">
                                <input type="hidden" name="jml_kamar" value="{{ $jml_kamar }}">
                                <input type="hidden" name="tgl_datang" value="{{ $tgl_datang }}">
                                <input type="hidden" name="tgl_pulang" value="{{ $tgl_pulang }}">
                                <button type="submit" class="btn btn-warning btn-lg rounded-4">
                                    <i class="fas fa-bookmark"></i> Pesan</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
