@extends('layouts.frontend')

@section('isi')
    {{-- Hero Image --}}
    @if (session('info'))
        <div class="alert alert-secondary alert-dismissible fade show position-absolute py-3" role="alert"
            style="z-index: 999; left: 50%; transform:translateX(-50%);">
            <strong>Selamat!</strong> {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="hero">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="row w-100 d-flex justify-content-center align-items-center">
                <div class="col-7">
                    <div class="title">
                        <h2>HEAVEN HOTEL</h1>
                            <p class="text-center text-warning">A place to experience and enjoy the life</p>
                    </div>
                </div>
                <div class="col-5 p-5">
                    <form action="/cekkamar" class="p-5 shadow rounded-4" method="POST">
                        @csrf
                        <h3 class="text-warning mb-3 fw-bold">Reservasi</h3>
                        <hr class="my-3 text-light">
                        <div class="form-group mb-3">
                            <label for="tgl_datang" class="mb-2 text-light">Tanggal Datang</label>
                            <input type="date" class="form-control rounded-2 tgl_datang" name="tgl_datang"
                                id="tgl_datang" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_pulang" class="mb-2 text-light">Tanggal Pulang</label>
                            <input type="date" class="form-control rounded-2 tgl_pulang" name="tgl_pulang"
                                id="tgl_pulang" required disabled>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-6">
                                <label for="jml_tamu" class="mb-2 text-light">Jumlah Tamu</label>
                                <input type="number" class="form-control rounded-2" name="jml_tamu" id="jml_tamu"
                                    required>
                            </div>
                            <div class="col-6">
                                <label for="jml_kamar" class="mb-2 text-light">Jumlah Kamar</label>
                                <input type="number" class="form-control rounded-2" name="jml_kamar" id="jml_kamar"
                                    required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-bg-warning fw-bold rounded-4 button-30">
                            <i class="fa fa-search"></i> Check</button>
                    </form>
                    <style>
                        /* CSS */
                        .button-30 {
                            align-items: center;
                            appearance: none;
                            background-color: #FCFCFD;
                            border-radius: 4px;
                            border-width: 0;
                            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
                            box-sizing: border-box;
                            color: #36395A;
                            cursor: pointer;
                            display: inline-flex;
                            font-family: "JetBrains Mono", monospace;
                            height: 50px;
                            justify-content: center;
                            line-height: 1;
                            list-style: none;
                            overflow: hidden;
                            padding-left: 16px;
                            padding-right: 16px;
                            position: relative;
                            text-align: left;
                            text-decoration: none;
                            transition: box-shadow .15s, transform .15s;
                            user-select: none;
                            -webkit-user-select: none;
                            touch-action: manipulation;
                            white-space: nowrap;
                            will-change: box-shadow, transform;
                            font-size: 18px;
                        }

                        .button-30:focus {
                            box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
                        }

                        .button-30:hover {
                            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
                            transform: translateY(-2px);
                        }

                        .button-30:active {
                            box-shadow: #D6D6E7 0 3px 7px inset;
                            transform: translateY(2px);
                        }
                    </style>
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- About --}}
    <section id="about" class="py-5">
        <div class="container py-5">
            <h1 class="text-center fw-bold mb-4 text-warning">ABOUT <span class="text-primary-emphasis">US</span></h1>
            <p class="lead text-center">Heaven Hotel is a place that offers an unforgettable stay experience with stunning
                views and pampering facilities. Each room is elegantly designed, featuring a private balcony to enjoy the
                beauty of nature, as well as a restaurant serving delicious dishes, making it the perfect choice for
                relaxation and comfort.
            </p>
        </div>
    </section>
    {{-- End of About --}}
    <hr class="my-3">
    {{-- Facilities --}}
    <section id="facilities" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3 class="text-center">Breathtaking Views</h3>
                    <hr class="border border-bottom border-warning w-25 mx-auto mb-4" style="border-width: 2px !important">
                    <img src="/images/facilities1.jpeg" class="img-fluid img-thumbnail rounded-4">
                    <p class="mt-3">"is an accommodation that offers stunning scenery, located in
                        strategic locations such as Gatlinburg and Sedona. Its amenities include a hot tub and access to
                        various outdoor activities, making it an ideal choice for a relaxing and refreshing getaway."</p>
                </div>
                <div class="col-4">
                    <h3 class="text-center">Fine Dining</h3>
                    <hr class="border border-bottom border-warning w-25 mx-auto mb-4" style="border-width: 2px !important">
                    <img src="/images/facilities2.jpg" class="img-fluid img-thumbnail rounded-4">
                    <p class="mt-3">" refers to a sophisticated and upscale dining experience that typically
                        includes high-quality food, exceptional service, and an elegant atmosphere. Here are some key
                        characteristics of fine dining"</p>
                </div>
                <div class="col-4">
                    <h3 class="text-center">Complete Facilities</h3>
                    <hr class="border border-bottom border-warning w-25 mx-auto mb-4" style="border-width: 2px !important">
                    <img src="/images/facilities3.jpg" class="img-fluid img-thumbnail rounded-4">
                    <p class="mt-3">" can refer to a range of amenities and services that are
                        available in various contexts, such as hotels, restaurants, event venues, or recreational centers.
                        Below are some examples of what "complete facilities" might include in different settings"</p>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Facilities --}}

    {{-- Room --}}
    <section id="room" class="py-5">
        <div class="container">
            <h1 class="text-warning fw-bold text-center mb-5">Kamar Heaven Hotel</h1>
            @foreach ($kamar as $index => $item)
                @if ($index % 2 == 0)
                    <div class="row align-items-center mb-5">
                        <div class="col-6">
                            <img src="/storage/kamar/{{ $item->photo }}" class=" w-100 rounded-4 img-thumbnail gambar"
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
                            <img src="/storage/kamar/{{ $item->photo }}" class=" w-100 rounded-4 img-thumbnail gambar"
                                style="height: 400px; object-fit: cover;">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{-- End of Room --}}

    {{-- Testimony --}}
    <section id="testimony" class="bg-light py-5">
        <div class="container py-5">
            <h1 class="text-center text-uppercase mb-5 fw-bold text-warning">What People <span
                    class=" text-primary-emphasis"> Says ?</span></h1>
            <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas adipisci minus
                                        repellendus consequuntur iusto nesciunt quaerat asperiores ipsum, enim nulla
                                        molestiae dolorum libero quis nostrum culpa eligendi quo neque distinctio cumque? Ea
                                        debitis ducimus eveniet culpa soluta aliquam necessitatibus veniam illo, voluptatem
                                        nemo aperiam id velit vitae sed asperiores optio?</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person1.jpg" alt="person1.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Alexandria</h5>
                                            <p class="m-0">Borobudur Executive Manager</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi modi corrupti
                                        reprehenderit dignissimos! Consectetur dolorum, aspernatur explicabo maxime iste
                                        iusto beatae repudiandae exercitationem tempore atque recusandae quo vel commodi
                                        velit dolorem? Omnis maxime minima suscipit ea dolor nisi, officia quibusdam,
                                        deserunt dolores voluptate ratione amet distinctio! Deleniti veritatis quidem</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person2.jpg" alt="person2.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Emily Brailse</h5>
                                            <p class="m-0">Popular Actress</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, adipisci soluta
                                        aperiam quidem, voluptates numquam aliquam ducimus sint, beatae corporis ea fuga
                                        deserunt aliquid molestiae? Ratione laborum error, eum dolorem tempore officia
                                        repellat eligendi cum soluta cumque autem omnis molestias eius quibusdam facere
                                        numquam blanditiis illum. Nesciunt.</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person3.jpg" alt="person3.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Jack Rodriguez</h5>
                                            <p class="m-0">Professional Football Player</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas adipisci minus
                                        repellendus consequuntur iusto nesciunt quaerat asperiores ipsum, enim nulla
                                        molestiae dolorum libero quis nostrum culpa eligendi quo neque distinctio cumque? Ea
                                        debitis ducimus eveniet culpa soluta aliquam necessitatibus veniam illo, voluptatem
                                        nemo aperiam id velit vitae sed asperiores optio?Lorem ipsum dolor sit amet.</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person4.jpg" alt="person4.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Nathan Straight</h5>
                                            <p class="m-0">Executive Manager Sampoerna</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi modi corrupti
                                        reprehenderit dignissimos! Consectetur dolorum, aspernatur explicabo maxime iste
                                        iusto beatae repudiandae exercitationem tempore atque recusandae quo vel commodi
                                        velit dolorem? Omnis maxime minima suscipit ea dolor nisi, officia quibusdam,
                                        deserunt dolores voluptate ratione amet distinctio! Deleniti veritatis quidem
                                        suscipit, impedit error asperiores itaque animi, nihil, similique consequuntur minus
                                        excepturi!</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person5.jpg" alt="person5.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Charlos Albiel</h5>
                                            <p class="m-0">Popular Asian Actor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded ">
                                    <i class="fas fa-quote-right text-primary mb-2"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, adipisci soluta
                                        aperiam quidem, voluptates numquam aliquam ducimus sint, beatae corporis ea fuga
                                        deserunt aliquid molestiae? Ratione laborum error, eum dolorem tempore officia
                                        repellat eligendi cum soluta cumque autem omnis molestias eius quibusdam facere
                                        beatae repudiandae debitis animi doloribus fuga reprehenderit quo, numquam
                                        blanditiis illum. Nesciunt.</p>
                                    <div class="card-footer d-flex">
                                        <img src="/images/person6.jpg" alt="person6.jpg" class="rounded-circle"
                                            style="width: 50px; height: 50px">
                                        <div class="detail ms-3">
                                            <h5 class="m-0">Mohini Dey</h5>
                                            <p class="m-0">Bassist Player</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    {{-- End of Testimony --}}

    {{-- Modal --}}
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
                            <button type="submit"
                                class="btn btn-warning shadow-lg py-3 text-uppercase fw-bold rounded-4">
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
