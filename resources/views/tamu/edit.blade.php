@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Tamu Hotel</h4>
                    <p class="card-description">Isi data di bawah ini dengan lengkap</p>
                    <form action="/tamu" class="forms-sample" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $tamu->id }}">
                        {{-- <input type="hidden" name="photoLama" value="{{ $tamu->photo }}"> --}}
                        @csrf
                        <div class="form-group mb-3">
                            <label for="no_identitas">No Identitas</label>
                            <input type="text" class=" form-control  @error('no_identitas') is-invalid @enderror"
                                name="no_identitas" id="no_identitas" placeholder="Isi Identitas kau lahh...."
                                value="{{ old('no_indentitas') ?? $tamu->no_identitas }}">
                            @error('no_identitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_identitas">Jenis Identitas</label>
                            <input type="text" class=" form-control  @error('jenis_identitas') is-invalid @enderror"
                                name="jenis_identitas" id="jenis_identitas" placeholder="Isi Jenis Identitas kau lahh...."
                                value="{{ old('jenis_identitas') ?? $tamu->jenis_identitas }}">
                            @error('jenis_identitas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_tamu">Nama Tamu</label>
                            <input type="text" class=" form-control  @error('nama_tamu') is-invalid @enderror"
                                name="nama_tamu" id="nama_tamu" placeholder="Isi Nama Tamu kau lahh...."
                                value="{{ old('nama_tamu') ?? $tamu->nama_tamu }}">
                            @error('nama_tamu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomer hp</label>
                            <input type="number" class=" form-control  @error('no_hp') is-invalid @enderror" name="no_hp"
                                id="no_hp" placeholder="Isi Nomer HP kau lahh...."
                                value="{{ old('no_hp') ?? $tamu->no_hp }}">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror">
                                <option value="">pilih jenis kelamin</option>
                                <option value="l" {{ (old('jk') == 'l' || $tamu->jk == 'l') ? "selected" : "" }}>Laki-laki</option>
                                <option value="p"{{ (old('jk') == 'p' || $tamu->jk == 'p') ? "selected" : "" }}>Perempuan</option>
                                @error('jk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class=" form-control  @error('alamat') is-invalid @enderror"
                                name="alamat" id="alamat" placeholder="Isi alamat kau lahh...."
                                value="{{ old('alamat') ?? $tamu->alamat }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" d-flex justify-content-between">
                            <a href="/tamu" class="btn btn-danger">
                                <i class="icon-action-undo"></i> cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="icon-wallet"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        function previewPhoto(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById('img-preview');
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection --}}
