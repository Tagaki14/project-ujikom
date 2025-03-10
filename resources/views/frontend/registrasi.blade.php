@extends('layouts.frontend')

@section('isi')
    <div class="row min-vh-100 align-items-center justify-content-center
    background">
        <style>
            .background {
                background-image: url("../images/bb.jpg");
                background-position: center;
                background-size: cover;
                position: relative;
                background-color: rgba(0, 0, 0, 0.5);

            }

            .login_box {
                backdrop-filter: blur(25%);
                background-color: rgba(255, 255, 255, 0.2);
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }
        </style>
        <div class="col-4">
            @if (session('info'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card p-3 rounded-5 shadow-lg login_box">
                <div class="card-header text-center">
                    <img src="/images/logo.png" style="width: 100px !important;" alt="" class="rounded-pill">
                    <h5>Form Registrasi Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="/registeruser" method="post">
                        @csrf
                        <div class=" form-floating mb-3">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="floatingNama"
                                placeholder="isi dengan nama Lengkap" name="nama">
                            <label for="floatingNama">Nama Lengkap</label>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="floatingEmail" placeholder="name@example.com" name="email">
                            <label for="floatingEmail">Alamat Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                id="floatingNoHp" placeholder="name@example.com" name="no_hp">
                            <label for="floatingNoHp">Nomer Handphone</label>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="floatingPassword" placeholder="***********" name="password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="password" class="form-control @error('password1') is-invalid @enderror"
                                id="floatingPasswordKonfirmasi" placeholder="***********" name="password1">
                            <label for="floatingPassword">Password</label>
                            @error('password1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary my-3 rounded-none btn-lg">Register</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="/loginuser" class="text-decoration-none ">Login Sebagai Pelanggan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
