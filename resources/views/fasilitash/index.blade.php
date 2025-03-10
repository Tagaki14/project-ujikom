@extends('layouts.backend')

@section('content')
    {{-- div <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h5>Data Fasilitas Hotel Hebat</h5>

                    @if (session('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <hr>
                    <a href="/fasilitashotel/create" class="btn btn-primary mb-3">
                        <i class="icon-plus"></i> Tambah Data fasilitas
                    </a>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class=" table-dark">
                                <th class="py-3 text-light">No</th>
                                <th class="py-3 text-light">Nama_Fasilitas</th>
                                <th class="py-3 text-light">Keterangan</th>
                                <th class="py-3 text-light">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitashotel as $key => $fas)
                                <tr class=" table-light">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $fas->nama_fasilitas }}</td>
                                    <td>{{ $fas->keterangan }}</td>
                                    <td>
                                        <a href="/fashotel/edit/{{ $fas->id }}" class="btn btn-sm btn-info">
                                            <i class="icon-pencil"></i> Edit
                                        </a>
                                        <a href="" class="btn btn-sm btn-success tampilPhoto" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-id="{{ $fas->id }}">
                                            <i class="icon-plus"></i> Tampil Gambar
                                        </a>
                                        <a href="/fashotel/delete/{{ $fas->id }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin data ini akan dihapus?')">
                                            <i class="icon-trash"></i> Hapus
                                        </a>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-thumbnail"
                                                        style="width: 100%; height: 100vh; object-fit: cover;"
                                                        src="{{ asset('storage/fasilitas/led.jpg') }}" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Fasilitas Hotel</h3>
                    @if (session('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <hr>
                    <a href="/fasilitashotel/create" class="btn text-bg-primary rounded-5 mb-3">
                        <i class="icon-plus"></i> Tambahkan Data
                    </a>
                    @foreach ($fasilitashotel as $index => $item)
                        <div class="row bg-secondary p-3 align-items-center mt-3">
                            <div class="col-6">
                                <img src="/storage/fasilitas1/{{ $item->photo }}"
                                    class=" img-thumbnail w-50 rounded-5 shadow-l gambar"
                                    style="height: 200px; object-fit: cover;">
                                <style>
                                    .gambar {
                                        transition: transform 0.2s ease-in-out;
                                    }

                                    .gambar:hover {
                                        transform: scale(1.3);
                                    }
                                </style>
                            </div>
                            <div class="col-5 ps-5">
                                <h3 class="text-dark fw-bold">{{ $item->nama_fasilitas }}</h3>
                                <p>{{ $item->keterangan }}</p>
                                <span>
                                    <a href="/user/aktif/{{ $item->id }}"
                                        class="badge @if ($item->status == 'aktif') bg-success text-white mb-3 @else
                                        bg-warning text-dark @endif"
                                        onclick="return confirm('Ubah Status keaktifan')"> {{ $item->status }} </a>
                                </span>
                                <div class="d-flex gap-3">
                                    <a href="/fashotel/edit/{{ $item->id }}" class="btn btn-sm btn-info rounded-3">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="/fashotel/delete/{{ $item->id }}" class="btn btn-sm btn-danger rounded-3"
                                        onclick="return confirm('Yakin data ini akan dihapus?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- @else
                            <div class="row bg-secondary p-3 align-items-center mt-3">
                                <div class="col-6 ps-5">
                                    <h3 class="text-warning">{{ $item->nama_fasilitas }} Room</h3>
                                    <p>{{ $item->keterangan }}</p>
                                    <div class="d-flex">
                                        <button
                                            class="btn btn-warning rounded-0 text-uppercase rounded-3 fw-bold">Check</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="/storage/fasilitas1/{{ $item->photo }}" class=" img-thumbnail w-50 rounded-5 shadow-lg"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                            </div>
                            <hr> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        $('.tampilPhoto').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/getFasilitasHotelById',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.info(data);
                    $('#exampleModal .modal-body img').attr("src", 'storage/fasilitas1/' + data.photo);
                }
            });
        })
    </script>
@endsection --}}
