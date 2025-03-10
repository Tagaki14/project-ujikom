@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h4 class="card-title">Form Edit Profile Petugas</h4>
                    <p class="card-description"> Isi data di bawah ini dengan lengkap! </p>
                    <form action="/user" class="forms-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="photoLama" value="{{ $user->photo }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="name" placeholder="Nama lengkap ...." value="{{ old('nama') ?? $user->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" id="username" placeholder="Username ...."
                                value="{{ old('username') ?? $user->username }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Email ...." value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                id="no_hp" placeholder="Nomor HP ...." value="{{ old('no_hp') ?? $user->no_hp }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Upload Photo --}}
                        <div class="row my-4 align-items-center">
                            <div class="col-3">
                                <img src="{{ asset('storage/profile/' . ($user->photo ?? 'admin.png')) }}" alt=""
                                    class="img-thumbnail" width="150px" id="img-preview">
                            </div>
                            <div class="col-9">
                                <label for="photoUpload" class="form-label">Upload Photo di Sini</label>
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
                            <a href="/user" class="btn btn-danger">
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
