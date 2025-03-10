@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Data Petugas Resepsionis</h4>
                    <p class="card-description"> Isi data di bawah ini dengan lengkap! </p>
                    <form action="/user" class="forms-sample" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="name" placeholder="Nama lengkap ...." value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username ...." value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email ...." value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Nomor HP ...." value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
