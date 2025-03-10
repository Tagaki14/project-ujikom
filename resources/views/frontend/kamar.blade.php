@extends('layouts.frontend')

@section('isi')
    {{-- heroFasilitas --}}
    <section id="hero">
        <div class="container d-flex align-items-center text-light justify-content-center">
            <div class="row w-100 d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <div class="title text-center">
                        <h3 class="fs-1">ROOMS ON</h3>
                        <h2>HEAVEN HOTEL</h2>
                        <p class="text-bg-light fw-bold py-2 rounded-4">Our Pledge - Your Satisfaction is Our Top Priority
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of heroFasilitas --}}

    {{-- Room Detail --}}
    <section id="room" class="py-5">
        <div class="container">
            @foreach ($kamar as $index => $item)
                @if ($index % 2 == 0)
                    <div class="row align-items-center mb-5">
                        <div class="col-6">
                            <img src="/storage/kamar/{{ $item->photo }}" class=" w-100 rounded-4 img-thumbnail "
                                style="height: 400px; object-fit: cover;">
                        </div>
                        <div class="col-6 text-light ps-5">
                            <h3 class="text-warning">{{ $item->tipe }} <span class=" text-light"> Room</span></h3>
                            <p>{{ $item->detail }}</p>
                            <h5 class="text-warning fst-italic">Fasilitas kamar</h5>
                            <ul>
                                @foreach ($item->detailfasilitas as $fasilitas)
                                    <li>{{ $fasilitas->fasilitas->nama }}</li>
                                @endforeach
                            </ul>
                            <button class="btn btn-warning rounded-0 text-uppercase rounded-3 fw-bold"
                                data-bs-toggle="modal" data-bs-target="#cekModal">
                                <i class="fas fa-search"></i> Check</button>
                            <div class="col-4 d-flex gap-3 mt-4">
                                @foreach ($item->detailfasilitas as $fasilitas)
                                    <img src="/storage/fasilitas/{{ $fasilitas->fasilitas->photo }}"
                                        class=" w-55 rounded-4 " style="height: 100px; object-fit: cover;">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row align-items-center mb-5">
                        <div class="col-6 text-light ps-5">
                            <h3 class="text-warning">{{ $item->tipe }} <span class=" text-light"> Room</span></h3>
                            <p>{{ $item->detail }}</p>
                            <h5 class="text-warning fst-italic">Fasilitas kamar</h5>
                            <ul>
                                @foreach ($item->detailfasilitas as $fasilitas)
                                    <li>{{ $fasilitas->fasilitas->nama }}</li>
                                @endforeach
                            </ul>
                            <button class="btn btn-warning rounded-0 text-uppercase rounded-3 fw-bold"
                                data-bs-toggle="modal" data-bs-target="#cekModal">
                                <i class="fas fa-search"></i> Check</button>
                        </div>
                        <div class="col-6">
                            <img src="/storage/kamar/{{ $item->photo }}" class=" w-100 rounded-4 img-thumbnail "
                                style="height: 400px; object-fit: cover;">
                        </div>
                        <div class="col-2 d-flex gap-3 mt-4">
                            @foreach ($item->detailfasilitas as $fasilitas)
                                <img src="/storage/fasilitas/{{ $fasilitas->fasilitas->photo }}"
                                    class=" w-55 rounded-4 " style="height: 100px; object-fit: cover;">
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{-- End of Room Detail --}}

    <div class="modal fade" id="cekModal" tabindex="-1" aria-labelledby="cekModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-warning fw-bold" id="cekModalLabel">Check Reservasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/cekkamar" class="p-4" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tgl_datang" class="mb-2">Tanggal Datang</label>
                            <input type="date" class="form-control rounded-2 tgl_datang" name="tgl_datang" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_pulang" class="mb-2">Tanggal Pulang</label>
                            <input type="date" class="form-control rounded-2 tgl_pulang" name="tgl_pulang" required
                                disabled>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-6">
                                <label for="jml_tamu" class="mb-2">Jumlah Tamu</label>
                                <input type="number" class="form-control rounded-2" name="jml_tamu" id="jml_tamu"
                                    required>
                            </div>
                            <div class="col-6">
                                <label for="jml_kamar" class="mb-2">Jumlah Kamar</label>
                                <input type="number" class="form-control rounded-2" name="jml_kamar" id="jml_kamar"
                                    required>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning shadow-lg py-3 text-uppercase fw-bold rounded-4">
                                <i class="fa fa-search"></i> Check Kesediaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#tgl_datang').on('change', function() {
            const tglDatang = $(this).val();
            if (tglDatang) {
                $('#tgl_pulang').removeAttr('disabled').attr('min', tglDatang).focus();
            } else {
                $('#tgl_pulang').attr('disabled', 'disabled');
            }
            const tglPulang = $('#tgl_pulang').val();
            if (tglPulang && tglPulang <= tglDatang) {
                alert('Tanggal pulang harus lebih besar dari tanggal datang!');
                $('#tgl_pulang').val('');
                return false;
            }
        });
        $('.tgl_datang').on('change', function() {
            const tglDatang = $(this).val();
            if (tglDatang) {
                $('.tgl_pulang').removeAttr('disabled').attr('min', tglDatang).focus();
            } else {
                $('.tgl_pulang').attr('disabled', 'disabled');
            }
            const tglPulang = $('.tgl_pulang').val();
            if (tglPulang && tglPulang <= tglDatang) {
                alert('Tanggal pulang harus lebih besar dari tanggal datang!');
                $('.tgl_pulang').val('');
                return false;
            }
        });
    </script>
    {{-- <script>
        $('#tgl_datang').on('change', function() {
            const tglDatang = $(this).val();
            if (tglDatang) {
                $('#tgl_pulang').removeAttr('disabled').attr('min', tglDatang).focus();
            } else {
                $('#tgl_pulang').attr('disabled', 'disabled');
            }
        });
    </script> --}}
@endsection
