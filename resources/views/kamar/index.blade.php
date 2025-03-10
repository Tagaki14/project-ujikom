@extends('layouts.backend')

@section('content')
    <div class="row p-4 bg-secondary rounded">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12 mb-3">
            <a href="/kamar/create" class="btn text-bg-primary rounded-5 mb-3">
                <i class="icon-plus"></i> Tambahkan Data
            </a>
        </div>
        @foreach ($rooms as $room)
            <div class="col-4 mb-3">
                <div class="card p-2 position-relative shadow-lg rounded-5">
                    <span class="badge text-bg-info position-absolute fs-6 rounded-pill" style="top: 15px; right: 15px">Rp.
                        {{ number_format($room->harga, 2, ',', '.') }} / hari</span>
                    <img src="{{ asset('storage/kamar/' . $room->photo) }}" alt=""
                        class="card-img-top rounded-5 shadow-lg" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->tipe }} Room</h5>
                        <p class="card-text">{{ substr($room->detail, 0, 150) }} ...</p>
                        <table>
                            <tr>
                                <td width="100px">Available</td>
                                <td width="20px">:</td>
                                <td>{{ $room->detailKamar->where('status', 'nonaktif')->count() }} rooms</td>
                            </tr>
                            <tr>
                                <td>Used</td>
                                <td>:</td>
                                <td>{{ $room->detailKamar->where('status', 'aktif')->count() }} rooms</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>{{ $room->detailKamar->count() }} rooms</td>
                            </tr>
                        </table>
                        <div class="rating d-flex gap-3 mt-3">
                            <i class="fa fa-star fs-3" style="color: #e6b800;"></i>
                            <i class="fa fa-star fs-3" style="color: #e6b800;"></i>
                            <i class="fa fa-star fs-3" style="color: #e6b800;"></i>
                            <i class="fa fa-star fs-3" style="color: #e6b800;"></i>
                            <i class="fa fa-star fs-3" style="color: #e6b800;"></i>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="tombol justify-content-between d-flex">
                            <button type="button" class="btn btn-info btn-sm tombolDetail" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-id="{{ $room->id }}">
                                <i class="fa fa-info-circle"></i> Detail
                            </button>
                            <a href="/kamar/edit/{{ $room->id }}" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="/kamar/delete/{{ $room->id }}" class="btn btn-danger btn-sm">
                                <i class="icon-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Detail Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deluxe Room Detail</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 detail">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur est maiores culpa, dolorem
                                ipsam architecto voluptas eius! Dolore accusantium praesentium, similique, quod reiciendis
                                tenetur fugit pariatur quo explicabo incidunt iusto numquam veniam hic amet dolorem.
                                Similique architecto suscipit nostrum, veritatis quis adipisci sunt quos illum assumenda
                                reiciendis officiis ab voluptatem?</p>
                            <h5>Fasilitas :</h5>
                            <ul>
                                <li>Kasur dengan ukuran King Size dan Twin Bed</li>
                                <li>Bak mandi dan pancuran</li>
                                <li>Pembuat Kopi dan Teh</li>
                                <li>Akses internet nirkabel berkecepatan tinggi</li>
                                <li>Akses gratis ke kolam renang, pusat kebugaran, dan fasilitas olahraga lainnya</li>
                                <li>LED TV 32 inch</li>
                                <li>Layanan merapikan tempat tidur</li>
                            </ul>
                            <hr class=" my-4">
                            <h5>Detail Kamar :</h5>
                            <div class="row ruang">
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header text-center fw-bold">
                                            <i class="icon-wallet"></i> X001
                                        </div>
                                        <div class="card-body text-center p-2 bg-secondary">
                                            <span class="m-0"> Available</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 gambar">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <img src="/images/fasilitas/coffee.jpg" class="img-thumbnail" alt=""
                                        style="height: 180px; width: 100%; object-fit: cover">
                                </div>
                                <div class="col-6 mb-2">
                                    <img src="/images/fasilitas/shower.jpg" class="img-thumbnail" alt=""
                                        style="height: 180px; width: 100%; object-fit: cover">
                                </div>
                                <div class="col-6 mb-2">
                                    <img src="/images/fasilitas/sofa.jpg" class="img-thumbnail" alt=""
                                        style="height: 180px; width: 100%; object-fit: cover">
                                </div>
                                <div class="col-6 mb-2">
                                    <img src="/images/fasilitas/led.jpg" class="img-thumbnail" alt=""
                                        style="height: 180px; width: 100%; object-fit: cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn text-bg-success me-2 tombolTambah" data-bs-toggle="modal"
                        data-bs-target="#ruangModal">
                        <i class="icon-layers"> Tambah Ruang</i>
                    </button>
                    <a class="btn text-bg-primary me-2 pilihTombol">
                        <i class="icon-plus"> Tambah Fasilitas</i>
                    </a>
                    <button type="button" class="btn text-bg-info" data-bs-dismiss="modal"><i class="icon-close"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Detail Modal --}}

    <!-- Modal -->
    <div class="modal fade" id="ruangModal" tabindex="-1" aria-labelledby="ruangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ruangModalLabel">Tambah Ruang Kamar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ruang" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="kamar_id" value="" id="kamar_id">
                        <h5>Tambahkan Nomor Ruang untuk Tipe Kamar <span class="tipeKamar text-primary fw-bold">test</span>
                        </h5><a href="/ruang/delete/{{ $room->id }}" class="badge text-danger"><i
                                class="fa fa-times-circle position-absolute" style="top: 2px; left: 7px;"></i></a>
                        <div class="form-group" id="input-container">
                            <div class="row mb-2 input-row">
                                <div class="col-9">
                                    <input type="text" name="nomor[]" class="form-control" required>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn text-bg-success btn-sm add-item">
                                        <i class="icon-plus "></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-bg-secondary " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-bg-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End of Detail Modal --}}
@endsection

@section('script')
    <script>
        $('.tombolDetail').on('click', function(e) {
            const id = $(this).data('id');
            const detail = $('#exampleModal .modal-body .detail ul');
            const gambar = $('#exampleModal .modal-body .gambar .row');
            const ruang = $('#exampleModal .modal-body .detail .ruang');
            detail.html('');
            ruang.html('');
            gambar.html('');
            $.ajax({
                url: 'http://127.0.0.1:8000/getKamarById',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    const fasilitas = data.detailfasilitas;
                    const detailRuang = data.detailkamar;
                    fasilitas.forEach(function(item, index) {
                        detail.append('<li>' + item.fasilitas.keterangan + '</li>');
                        gambar.append('<div class="col-6 mb-2"> <img src="/storage/fasilitas/' +
                            item.fasilitas.photo +
                            '" class="img-thumbnail"alt ="" style="height: 180px; width: 100%; object-fit: cover" > </div>'
                        );
                    });
                    detailRuang.forEach(function(item, index) {
                        const status = item.status === 'aktif' ? 'used' : 'available';
                        const warna = item.status === 'aktif' ? 'bg-danger' : 'bg-success';
                        ruang.append(`
                                <div class="col-3 mb-2">
                                    <div class="card">
                                        <div class="card-header text-center fw-bold text-light ${warna}">
                                            <i class="icon-wallet"></i> ${item.nomor}
                                            <a href="/ruang/delete/${item.id}" class="badge text-danger">
                                                <i class="fa fa-times-circle-o position-absolute fs-5" style="top: 2px; right: 7px;"></i>
                                            </a>
                                        </div>
                                        <div class="card-body text-center p-2 bg-secondary">
                                            <span class="m-0">${status}</span>
                                        </div>
                                    </div>
                                </div>
                            `);
                    });

                    $('#exampleModalLabel').html(data.tipe + ' Room Detail');
                    $('#exampleModal .modal-body .col-6 p').html(data.detail);
                    $('#exampleModal .modal-footer .pilihTombol').attr('href',
                        '/fasilitaskamar/pilih/' + data.id);

                    //Menambbahkan kamar_id ke ruang kamar
                    $('#ruangModal #kamar_id').val(id);
                    $('#ruangModal .tipeKamar').html(data.tipe);

                }
            });
        })


        $('#ruangModal').on('click', '.add-item', function() {
            const newitem = ` 
                    <div class="row mb-2 input-row">
                        <div class="col-9">
                            <input type="text" name="nomor[]" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn text-bg-success btn-sm add-item">
                                <i class="icon-plus "></i>
                            </button>
                            <button type="button" class="btn text-bg-danger btn-sm remove-item">
                                <i class="icon-minus "></i>
                            </button>
                        </div>
                    </div>
                `;
            $('#input-container').append(newitem);
        });

        $('#ruangModal').on('click', '.remove-item', function() {
            $(this).closest('.input-row').remove();
        });
    </script>
@endsection
