@extends('layouts.backend')

@section('content')
    <div class="card p-4">
        @if (session('info'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row align-items-center">
            <div class="col-6">
                <table class="table table-striped">
                    <tr>
                        <td class="py-3">Tipe Kamar</td>
                        <td>{{ $reservasi->kamar->tipe }}</td>
                    </tr>
                    <tr>
                        <td class="py-3">Waktu Checkin</td>
                        <td>{{ \Carbon\Carbon::parse($reservasi->tgl_datang)->isoFormat('DD MMMM YYYY') }} - Pukul 13:00 WIB
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3">Waktu Checkout</td>
                        <td>{{ \Carbon\Carbon::parse($reservasi->tgl_pulang)->isoFormat('DD MMMM YYYY') }} - Pukul 12:00 WIB
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3">Nama Pemesan</td>
                        <td>{{ $reservasi->pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <td class="py-3">Jumlah Kamar Dipesan</td>
                        <td>{{ $reservasi->jml_kamar }} kamar</td>
                    </tr>
                </table>
            </div>
            <div class="col-6 text-center">
                <img src="/images/logo.png" width="200">
                <h2>Proses Registrasi Tamu</h2>
                <h1 class="text-primary">(Checkin)</h1>
            </div>
        </div>
        <h3 class="m-0 my-3">Pilih Kamar</h3>
        <p>Silahkan klik tombol kamar yang akan dipilih di bawah ini yang berwarna hijau!</p>
        <div class="d-flex">
            @foreach ($kamar as $item)
                <button class="btn btn-success text-center me-2 text-light p-3 rounded-4 shadow cursor-pointer tombolCheck"
                    role="button" data-id="{{ $item->id }}">
                    <i class="icon-home fs-1"></i>
                    <h3 class="m-0">{{ $item->nomor }}</h3>
                </button>
            @endforeach
        </div>
        <hr class="my-3">
        <form action="/reservasi/checkin" method="POST">
            @csrf
            <input type="hidden" name="reservasi_id" id="reservasi_id" value="{{ $reservasi->id }}">
            <input type="hidden" name="tgl_checkin" value="{{ \Carbon\Carbon::now() }}">
            <div class="tambahTamu row">
                {{-- <div class="col-6">
                <input type="hidden" name="detail_kamar_id[]" value="">
                <h5>Tambahkan Tamu</h5>
                <p>Silahkan Pilih Tamu dan Tambahkan : </p>
                <select name="tamu[]" class="form-select" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                    @foreach ($tamu as $item)
                        <option value=""></option>
                        <option value="{{ $item->id }}">{{ $item->nama_tamu }}</option>
                    @endforeach
                </select>
            </div> --}}
            </div>
            <button type="submit" class="btn btn-success rounded-0 mt-4"><i class="icon-check"></i> Checkin</button>
            <a href="/reservasi" class="btn btn-secondary rounded-0 mt-4 ms-3">
                <i class="icon-action-undo"></i> Kembali
            </a>
        </form>
    </div>
@endsection

@section('script')
    <script>
        let jml = 0;
        $('.tombolCheck').on('click', function(){
            jml += 1;
            if(jml == {{ $reservasi->jml_kamar }}){
                $('.tombolCheck').attr('disabled', true);
            }
            const id = $(this).data('id');
            $(this).attr('disabled', true);
            $(this).addClass('btn-danger');
            const tambah = '<div class="col-6"><input type="hidden" name="detail_kamar_id[]" value="'+ id +'"> <h5>Tambahkan Tamu</h5><p>Silahkan Pilih Tamu dan Tambahkan : </p><select name="tamu['+ id +'][]" class="form-select" id="multiple-select-field'+ id +'" data-placeholder="Pilih tamu" multiple required>@foreach ($tamu as $item)<option value=""></option><option value="{{ $item->id }}">{{ $item->nama_tamu }}</option>@endforeach</select></div>';
            $('.tambahTamu').append(tambah);
            $('#multiple-select-field' + id).select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '75%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: false,
            } );
        });
    </script>
@endsection

