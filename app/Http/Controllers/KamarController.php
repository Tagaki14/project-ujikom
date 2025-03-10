<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\DetailKamar;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KamarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kamar',
            'page' => 'user',
            'rooms' => Kamar::all()
        ];

        return view('kamar.index', $data);
    }
    public function getKamarById(Request $request)
    {
        $id = $request->id;
        $kamar = Kamar::find($id);
        $detail = $kamar->detailfasilitas;
        $ruang = $kamar->detailkamar;
        foreach ($detail as $det) {
            $fasilitas = $det->fasilitas;
        }
        return $kamar->toJson();
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kamar',
            'page' => ' Kamar',
        ];

        return view('kamar.tambah', $data);
    }
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'tipe' => 'required',
            'harga' => 'required',
            'detail' => 'required',
            'photoUpload' => 'nullable|image|file|max:1024',
        ], [
            'tipe' => 'Tipe Harus Di isi!!',
            'harga' => 'Harga Harus Di isi!!',
            'detail' => 'Detail Harus Di isi!!',
            'photoUpload.image' => 'Yang diupload harus gambar!!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!!',
        ]);

        $validatedData['jumlah'] = ('0');

        if ($request->file('photoUpload')) {
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('kamar', $name);
            $validatedData['photo'] = $name;

            if ($request->photoLama != null) {
                unlink(public_path('storage/kamar/' . $request->photoLama));
            }
        };

        Kamar::create($validatedData);
        return redirect('/kamar')->with('info', 'Data Kamar berhasil Ditambahkan !!');
    }
    public function edit(kamar $kamar)
    {
        $data = [
            'title' => 'Edit Data Kamar',
            'page' => 'kamar',
            'kamar' => $kamar,
        ];

        return view('kamar.edit', $data);
    }
    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'tipe' => 'required',
            'harga' => 'required',
            'detail' => 'required',
            'photoUpload' => 'nullable|image|file|max:1024',
        ], [
            'nama' => 'Nama Lengkap Harus Di isi!!',
            'harga' => 'Harga Harus Di isi!!',
            'detail' => 'Detail Harus Di isi!!',
            'photoUpload.image' => 'Yang diupload harus gambar!!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!!',
        ]);

        if ($request->file('photoUpload')) {
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('kamar', $name);
            $validatedData['photo'] = $name;

            if ($request->photoLama != null) {
                unlink(public_path('storage/kamar/' . $request->photoLama));
            }
        };


        $kamar = Kamar::find($id);
        $kamar->update($validatedData);

        return redirect('/kamar')->with('info', 'Data Kamar berhasil diupdate !!');
    }
    public function destroy(Kamar $kamar): RedirectResponse
    {
        $kamar->delete();
        return redirect('/kamar')->with('info', 'Data kamar berhasil dihapus !!');
    }
    public function tambahRuang(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'unique:detail_kamar,nomor'
        ], [
            'nomor.unique' => 'Nomor Kamar sudah terdaftar'
        ]);

        $jmlRuang =  count($request->nomor);

        $kamar = Kamar::find($request->kamar_id);
        $jmlKamar = $kamar->jumlah;
        $kamar->update(['jumlah' => $jmlKamar + $jmlRuang]);

        for ($i = 0; $i < $jmlRuang; $i++) {
            DetailKamar::create([
                'kamar_id' => $request->kamar_id,
                'nomor' => $request->nomor[$i],
                'status' => 'nonaktif',
            ]);
        }

        $tipeKamar = Kamar::where('id', $request->kamar_id)->tipe;

        return Redirect('/kamar')->with('info', 'Ruang untuk tipe ' . $tipeKamar . ' berhasil ditambahkan sebanyak ' . $jmlRuang . ' ruang!');
    }
    public function delete(DetailKamar $detailkamar): RedirectResponse
    {
        $detailkamar->delete();
        return redirect('/kamar')->with('info', 'Data kamar ruang kamar berhasil dihapus !!');
    }
}
