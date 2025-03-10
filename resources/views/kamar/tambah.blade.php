@extends('layouts.backend')

@section('content')
    <div class="row ">
        <div class="col-8">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h3 class="card-title d-flex justify-content-center">Form Tambah Data Kamar Hotel Hebat</h3>
                    <p class="card-description d-flex justify-content-center">Isi data di bawah ini dengan lengkap!</p>

                    <form action="/kamar" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tipe">Tipe Kamar</label>
                            <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe"
                                id="name" placeholder="Tipe Kamar......." value="{{ old('tipe') }}">
                            @error('tipe')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="harga">Harga Kamar</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                id="name" placeholder="Harga Kamar......." value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="detail">Detail Kamar</label>
                            <input type="text" class="form-control @error('detail') is-invalid @enderror" name="detail"
                                id="name" placeholder="Detail Kamar......." value="{{ old('detail') }}">
                            @error('detail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload Photo --}}
                        <div class="row my-4 align-items-center">
                            <div class="col-3">
                                <img src="{{ asset('storage/kamar/' . ($kamar->photo ?? 'avatar.png')) }}"
                                    alt="" class="img-thumbnail" width="120px" id="img-preview">
                            </div>
                            <div class="col-9">
                                <label for="photoUpload" class="form-label">Upload Photo Disini</label>
                                <input class="form-control @error('photoUpload') is-invalid @enderror" type="file"
                                    name="photoUpload" id="photoUpload" onchange="previewPhoto(event)">
                                @error('photoUpload')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- End Of Upload Photo --}}

                        <div class="d-flex justify-content-between">
                            <a href="/kamar" class="btn btn-danger">
                                <i class="icon-action-undo"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="icon-wallet"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewPhoto(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
