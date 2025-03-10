@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Fasilitas Kamar</h4>
                    <p class="card-description"> Isi data fasilitas Hotel ini dengan lengkap! </p>
                    <form action="/fasilitashotel" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama_fasilitas">Nama Fasilitas Hotel</label>
                            <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" name="nama_fasilitas"
                                id="nama_fasilitas" placeholder="Nama lengkap ...." value="{{ old('nama_fasilitas') }}">
                            @error('nama_fasilitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Kasih Keterangan Fasilitas"
                                id="keterangan" name="keterangan" style="height: 120px">{{ old('keterangan') }}</textarea>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Upload Photo --}}
                        <div class="row my-4 align-items-center">
                            <div class="col-3">
                                <img src="{{ asset('storage/fasilitas/uploadGambar.png') }}" alt=""
                                    class="img-thumbnail" width="150px" id="img-preview">
                            </div>
                            <div class="col-9">
                                <label for="photoUpload" class="form-label">Upload Gambar di Sini</label>
                                <input class="form-control @error('photoUpload') is-invalid  @enderror" type="file"
                                    name="photoUpload" id="photoUpload" onchange="previewPhoto(event)">
                                @error('photoUpload')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- End of Upload Photo --}}

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">
                                <i class="icon-wallet"></i> Simpan
                            </button>
                            <a href="/fasilitashotel" class="btn btn-danger">
                                <i class="icon-action-undo"></i> Kembali
                            </a>
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
