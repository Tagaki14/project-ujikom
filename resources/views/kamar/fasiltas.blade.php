@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Fasilitas Kamar</h3>

                    @if (session('info'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <hr>
                    <a href="/fasilitaskamar/create"  class="btn text-bg-primary rounded-5 mb-3">
                        <i class="icon-plus"></i> Tambahkan Data
                    </a>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class=" table-dark">
                                <th class="py-3 text-light">No</th>
                                <th class="py-3 text-light">Nama</th>
                                <th class="py-3 text-light">Keterangan</th>
                                <th class="py-3 text-light">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitasKamar as $key => $fas)
                                <tr class=" table-light">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $fas->nama }}</td>
                                    <td>{{ $fas->keterangan }}</td>
                                    <td>
                                        <a href="/faskamar/edit/{{ $fas->id }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-success tampilPhoto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $fas->id }}">
                                            <i class="fa fa-info-circle"></i> Tampil Gambar
                                        </a>
                                        <a href="/faskamar/delete/{{ $fas->id }}" class="btn btn-sm btn-danger"
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
                                                    <img class="img-thumbnail" style="width: 100%; height: 100vh; object-fit: cover;" src="{{ asset('storage/fasilitas/led.jpg') }}" alt="">
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
    </div>
@endsection

@section('script')
    <script>
        $('.tampilPhoto').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/getFasilitasKamarById',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.info(data);
                    $('#exampleModal .modal-body img').attr("src", 'storage/fasilitas/' + data.photo);
                }
            });
        })
    </script>
@endsection
