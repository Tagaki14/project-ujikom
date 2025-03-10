@extends('layouts.frontend')

@section('isi')
    <section id="hero">
        <div class="container d-flex align-items-center text-light justify-content-center">
            <div class="row w-100 d-flex justify-content-center align-items-center">
                <div class="col-8">
                    <div class="title text-center">
                        <h3 class="fs-1">OUR CONTACT</h3>
                        <h2>HEAVEN HOTEL</h2>
                        <p class="text-bg-light rounded-4 fw-bold py-2">Our Pledge - Your Satisfaction is Our Top Priority
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="background">
        <style>
            .background {
                background-color: rgba(69, 151, 233, 0.867);
            }
        </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 card shadow-lg p-4 m-4">
                    <h2 class="text-center text-warning fw-bold">KONTAK KAMI</h2>
                    <p class="lead fst-italic text-center">Harap isi formulir ini dengan jelas</p>
                    <hr class="mb-4">
                    <form onsubmit="sendMessage()">
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control py-3" id="nama" name="nama"
                               required  placeholder="Nama lengkap ...">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control py-3" id="email" name="email"
                               required  placeholder="Alamat email ...">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label fw-bold">Your Message <span
                                    class="text-danger">*</span></label>
                            <textarea rows="5" class="form-control py-3" id="pesan" name="pesan"required  placeholder="Tuliskan pesan Anda ..."></textarea>
                        </div>
                        <button class="btn text-bg-primary rounded-4 btn-lg w-100 mt-3">
                            <i class="fa fa-paper-plane"></i> Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function sendMessage() {
            event.preventDefault();
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const pesan = document.getElementById('pesan').value;

            const url =
                "https://api.whatsapp.com/send?phone=6282117205811&text=Halo%20Admin%0ASaya%20*" + nama +
                "*%0AEmail%20saya%20*" + email + "*%0A%0A*" + pesan + "*";

           window.open(url);
            
        }
    </script>
@endsection
