<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\DetailFasilitas;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Homepage',
            'active' => 'home',
            'kamar' => Kamar::all(),
        ];
        return view('frontend.home', $data);
    }
    public function kamar()
    {
        $data = [
            'title' => 'Rooms',
            'active' => 'kamar',
            'kamar' => Kamar::all(),
            'detailfasilitas' => DetailFasilitas::all(),
        ];
        return view('frontend.kamar', $data);
    }
    public function fasilitas()
    {
        $data = [
            'title' => 'Facilities',
            'active' => 'fasilitas',
            'fasilitash' => FasilitasHotel::all(),
            'fasilitas' => FasilitasKamar::all(),
        ];
        return view('frontend.fasilitas', $data);
    }
    public function kontak()
    {
        $data = [
            'title' => 'Kontak',
            'active' => 'Kontak',
        ];
        return view('frontend.KOntak', $data);
    }
    public function cekkamar(Request $request)
    {
        $tglDatang = $request->tgl_datang;
        $tglPulang = $request->tgl_pulang;
        $jmlPesan = $request->jml_kamar;
        $jmlTamu = $request->jml_tamu;

        $kamar = Kamar::with('reservasi')->get();
        $kamar_filter = $kamar->filter(function ($kamar) use ($tglDatang, $tglPulang) {
            return $kamar->reservasi->contains(function ($reservasi) use ($tglDatang, $tglPulang) {
                return $reservasi->tgl_datang <= $tglPulang && $reservasi->tgl_pulang > $tglDatang;
            });
        });

        // dd($kamar_filter)
        $jmlkamar = [];
        foreach ($kamar as $kmr) {
            $jmlkamar[$kmr->id] = $kmr->jumlah;
            foreach ($kamar_filter as $kf) {
                $jmlKamarReservasi = $kmr->reservasi->sum('jml_kamar');
                if ($kmr->id == $kf->id) {
                    $jmlkamar[$kmr->id] = $kmr->jumlah - $jmlKamarReservasi;
                }
            }
        }

        // dd($jmlkamar);

        $data = [
            'title' => 'cekkamar',
            'active' => 'cekkamar',
            'kamar' => Kamar::all(),
            'jmlKamar' => $jmlkamar,
            'tgl_datang' => $tglDatang,
            'tgl_pulang' => $tglPulang,
            'jml_kamar' => $jmlPesan,
            'jml_tamu' => $jmlTamu,
        ];
        return view('frontend.booking.cek_kamar', $data);
    }
    public  function reservasi(Request $request)
    {
        //cek harga kamar
        $kamar = Kamar::find($request->kamar_id);
        $harga = $kamar->harga;

        //cek brp lama tamu menghinap
        $tglDatang = $request->tgl_datang;
        $tglPulang = $request->tgl_pulang;
        $datang = Carbon::parse($tglDatang);
        $pulang = Carbon::parse($tglPulang);
        $jmlHari = $pulang->diff($datang)->day;

        //hitung total harga
        $total_bayar = $harga * $jmlHari * $request->jml_kamar;

        //tentukan harga dan waktu reservasi, waktu expired
        $reservasi = Carbon::now();
        $expired = $reservasi->addHours(1);

        //dapatkan kode
        $kodeKamar = sprintf('%02d', $kamar->id);
        $kodeTanggal = strtotime($reservasi);

        $kode = "resv" . Auth::user()->id . '-'  . $kodeTanggal . '-' . $kodeKamar;

        $data = [
            'title' => 'Reservasi Hotel',
            'active' => 'reservasi',
            'kamar' => $kamar,
            'reservasi' => $reservasi,
            'kode' => $kode,
            'tgl_expired' => $expired,
            'tgl_datang' => $tglDatang,
            'tgl_pulang' => $tglPulang,
            'jml_kamar' => $request->jml_kamar,
            'jml_tamu' => $request->jml_tamu,
            'total_bayar' => $total_bayar,

        ];
        return  view('frontend.booking.reservasi', $data);
    }
    public function konfirmasi(Request $request)
    {

        $reservasi = Carbon::now()->addHours(12);
        $expired = $reservasi->addHours(1);
        $data = [
            'kamar_id' => $request->kamar_id,
            // 'user_id' => $request->pelanggan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'total_bayar' => $request->total_bayar,
            'kode' => $request->kode,
            'jml_kamar' => $request->jml_kamar,
            'jml_tamu' => $request->jml_tamu,
            'tgl_datang' => $request->tgl_datang,
            'tgl_pulang' => $request->tgl_pulang,
            'status' => 'dipesan',
            'tgl_reservasi' => $reservasi,
            'tgl_expired' => $expired,
        ];
        // dd($data);

        Reservasi::create($data);
        return redirect()->route('home')->with('info', 'Reservasi hotel berhasil dibuat. Check Reservasi untuk segera melakukan pembayaran');
    }
    public function getReservasi(Request  $request)
    {
        $reservasi = Reservasi::where('pelanggan_id', Auth::user()->id)->get();
        $data = [
            'title' => 'getReservasi',
            'active' => 'getreservasi',
            'reservasi' => $reservasi,
        ];
        return  view('frontend.booking.riwayat_reservasi', $data);
    }
    public function bayarInvoice(Reservasi $reservasi)
    {
        $data = [
            'title' => 'Konfirmasi Pembayaran',
            'active' => 'bayarinvoice',
            'reservasi' => $reservasi,
        ];
        return  view('frontend.booking.bayar_reservasi', $data);
    }
    public function konfirmasiBayar(Request $request)
    {
        $reservasi = Reservasi::find($request->id);
        $namaFile = $request->file('bukti')->hashName();
        $request->file('bukti')->storeAs('bukti', $namaFile);
        $data =  [
            'bukti' => $namaFile,
            'status' => 'dibayar',
        ];

        $reservasi->update($data);
        return redirect('/getreservasi')->with('info', 'Pesanan Berhasil dbayar');
    }
    public function cetakInvoice(Reservasi $reservasi)
    {
        $data = [
            'title' => 'Cetak Pembayaran',
            'reservasi' => $reservasi,
        ];
        return  view('frontend.booking.cetak_invoice', $data);
    }
}
