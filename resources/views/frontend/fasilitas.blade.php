@extends('layouts.frontend')

@section('isi')
    {{-- heroFasilitas --}}
    <section id="hero">
        <div class="container d-flex align-items-center text-light justify-content-center">
            <div class="row w-100 d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <div class="title text-center">
                        <h3 class="fs-1">FACILITIES ON</h3>
                        <h2>HEAVEN HOTEL</h2>
                        <p class="text-bg-light rounded-4 fw-bold py-2">Our Pledge - Your Satisfaction is Our Top Priority
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of heroFasilitas --}}
    {{-- detail --}}
    <div class="fasilitas">
        <h2 class="fw-bold">Galery, Heaven Hotel</h2>
        <div class="row">
            <div class="list">
                <div class="list-container">
                    <div class="hotel">
                        <h3 class="fst-italic text-warning">Fasilitas hotel</h3>
                        <ul>
                            @foreach ($fasilitash as $item)
                                <li><a href="" data-bs-toggle="modal" data-bs-target="#fasilitasModal"
                                        data-id="{{ $item->id }}"
                                        class="text-decoration-none text-light">{{ $item->nama_fasilitas }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="Guest">
                        <h3 class="fst-italic text-warning">Guest Service</h3>
                        <ul>
                            <li>Check-in and Check-out</li>
                            <li>Reservations</li>
                            <li>Room Service</li>
                            <li>Housekeeping</li>
                            <li>Concierge Services</li>
                            <li>Luggage Services</li>
                            <li>Additional Facilities</li>
                            <li>Emergency Services</li>
                        </ul>
                        </ul>
                    </div>
                </div>
                <div class="image">
                    @foreach ($fasilitash as $item)
                        <img src="{{ asset('storage/fasilitas1/' . $item->photo) }}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- end of detail --}}

    <div class="modal fade" id="fasilitasModal" tabindex="-1" aria-labelledby="fasilitasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="fasilitasModalLabel">Detail Fasilitas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- tagline --}}
    <section id="tagline">
        <div class="container p-5">
            <p class="text-center text-dark-emphasis">Customer satisfaction is our priority. This is why we guarantee a 360
                ° customer service</p>
        </div>
    </section>
    {{-- end of tagline --}}
@endsection

@section('script')
    <script>
        
    </script>
@endsection
