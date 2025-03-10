<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/images/icon.png">
    <title>{{ $title }}</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" alt="" style="width: 100px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" aria-current="page"
                            href="/"><i class="fas fa-home"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'kamar' ? 'active' : '' }}" href="/rooms">
                            <i class="fas fa-bed"></i> Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'fasilitas' ? 'active' : '' }}" href="/facilities"><i
                                class="fas fa-list-alt"></i> Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'kontak' ? 'active' : '' }}" href="/kontak">
                            <i class="fas fa-envelope-open-text"></i> Kontak Kami</a>
                    </li>
                </ul>
                <div class="tombol d-flex align-items-center">
                    @auth('web')
                        @php
                            $pesan = \App\Models\Reservasi::where('pelanggan_id', auth()->user()->id)
                                ->where('status', 'dipesan')
                                ->get();
                            $jmlNotif = $pesan->count();
                        @endphp
                        <a href="/getreservasi"
                            class="d-flex text-decoration-none align-items-center me-3 position-relative">
                            <i class="fas fa-bell me-2 fs-3 text-warning"></i>
                            @if ($jmlNotif > 0)
                                <sup class="badge text-bg-danger rounded-pill position-absolute"
                                    style="top: 2px; left: 7px;"
                                    title="{{ $jmlNotif }} Pesanan Anda belum di bayar! Bayar Woy!">{{ $jmlNotif }}
                                </sup>
                            @endif
                            <div class="notif">
                                <span class="text-dark fw-bold"> Reservasi Anda</span>
                                <hr class="m-0 text-light">
                                <span class="text-warning fst-italic">{{ auth()->user()->nama }}</span>
                            </div>
                        </a>
                        <a href="/logoutuser" class="btn btn-warning rounded-3 shadow fw-bold px-4">
                            <i class="fa fa-sign-out-alt"></i> LOGOUT</a>
                    @elseif(Auth::guard('web')->guest())
                        @auth('admin')
                            <a href="/dashboard" class="btn btn-info rounded-3 shadow fw-bold px-4 me-2">
                                <i class="fa fa-dashboard"></i> DASHBOARD</a>
                            <a href="/logout" class="btn btn-warning rounded-3 shadow fw-bold px-4">
                                <i class="fa fa-sign-out-alt"></i> LOGOUT</a>
                        @else
                            <a href="/loginuser" class="btn btn-info rounded-3 shadow fw-bold px-4">
                                <i class="fa fa-sign-in-alt"></i> LOGIN</a>
                        @endauth
                    @endauth
                </div>
                </a>
            </div>
        </div>
    </nav>
    {{-- Navbar --}}

    {{-- ini adalah section yang diincludekan --}}
    @yield('isi')

    {{-- Footer --}}
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <img src="/images/logo.png" alt="" style="width: 150px">
                    <p class="text-dark">A place to experience and enjoy the life</p>
                </div>
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li class="text-dark mb-2">
                            <i class="fas fa-phone text-warning"></i>
                            <span class="ms-2">0264678901</span>
                        </li>
                        <li class="text-dark mb-2">
                            <i class="fas fa-map-marker-alt text-warning"></i>
                            <span class="ms-2">Jl. Jatiluhur Permai No. 169 Purwakarta</span>
                        </li>
                        <li class="text-dark">
                            <i class="fas fa-envelope text-warning"></i>
                            <span class="ms-2">HeavenHotel@ymail.co.id</span>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <h4 class="text-dark fs-5">Share and Like ❤️</h4>
                    <div class="socmed">
                        <i class="fab fa-facebook-square text-primary fs-3"></i>
                        <i class="fab fa-instagram-square text-danger fs-3"></i>
                        <i class="fab fa-tiktok text-dark fs-3"></i>
                        <i class="fab fa-telegram-plane text-info fs-3"></i>
                        <i class="fab fa-youtube text-danger fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- End of Footer --}}
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.7.1.min.js"></script>
    @yield('script')


</body>

</html>
