<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tamu;
use App\Models\Reservasi;
use App\Models\DetailKamar;
use Illuminate\Http\Request;
use App\Models\DetailReservasi;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Reservasi Hotel',
            'page' => 'reservasi',
            'reservasi' => Reservasi::all()
        ];

        return view('reservasi.index', $data);
    }
    public function checkin(Reservasi $reservasi)
    {
        $kamar = DetailKamar::where('kamar_id', $reservasi->kamar_id)->get();
        $tamu = Tamu::where('status', 'nonaktif')->get();

        $data = [
            'title' => 'Proses Registrasi Checkin',
            'page' => 'checkin',
            'reservasi' => $reservasi,
            'kamar' => $kamar,
            'tamu' => $tamu
        ];

        return view('reservasi.checkin', $data);
    }
    public function prosesCheckin(Request $request)
    {
        $detail = $request->detail_kamar_id;
        if (!$detail) {
            return redirect()->back()->with('info', 'Belum ada kamar yang dipilih. Pilih kamar terlebih dahulu!');
        }
        $jmlDetail = count($detail);
        for ($i = 0; $i < $jmlDetail; $i++) {
            $tamu = $request->tamu[$detail[$i]];
            $strTamu = implode(',', $tamu);
            $data = [
                'reservasi_id' => $request->reservasi_id,
                'detail_kamar_id' => $detail[$i],
                'tgl_checkin' => $request->tgl_checkin,
                'tamu' => $strTamu,
                'status' => 'checkin'
            ];

            DetailReservasi::create($data);

            // Ubah status kamar menjadi nonaktif
            $kamar = DetailKamar::where('id', $detail[$i])->first();
            $kamar->update(['status' => 'aktif']);

            foreach ($tamu as $item) {
                $dataTamu = Tamu::where('id', $item)->first();
                $dataTamu->update(['status' => 'aktif']);
            }
        }
        // Ubah status reservasi menjadi checkin
        $reservasi = Reservasi::find($request->reservasi_id);
        $reservasi->update(['status' => 'checkin']);

        return redirect('/reservasi')->with('info', 'Proses checkin berhasil dikonfirmasi!');
    }
    public function checkout(Reservasi $reservasi)
    {
        // mendapatkan detail reservasi dan merubah status dan tanggal checkout
        $detail = DetailReservasi::where('reservasi_id', $reservasi->id)->get();
        $tamu = "";
        foreach ($detail as $det) {
            $det->update([
                'status' => 'checkout',
                'tgl_checkout' => Carbon::now()
            ]);

            // Merubah status di detail kamar
            $kamarId = $det->detailkamar->id;
            $detailKamar = DetailKamar::where('id', $kamarId)->first();
            $detailKamar->update(['status' => 'nonaktif']);

            // mendapatkan tamu pada setiap detail reservasi
            $tamu .= $det->tamu;
            $tamu .= ",";
        }
        $tamu = rtrim($tamu, ",");
        $tamu = explode(',', $tamu);
        $dataTamu = Tamu::whereIn('id', $tamu)->get();

        // Merubah status tamu ke nonaktif kerena sudah checkout
        foreach ($dataTamu as $data) {
            $data->update(['status' => 'nonaktif']);
        }

        // Mengupdate status di reservasi menjadi selesai
        $reservasi->update(['status' => 'selesai']);
        return redirect('/reservasi')->with('info', 'Proses checkout berhasil dikonfirmasi!');
    }
}
