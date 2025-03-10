<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use Illuminate\Http\RedirectResponse;

class FasilitasHotelController extends Controller
{
    public function index(Request $request){
        $data = [
            'title' => 'Data Fasilitas hotel',
            'page' => 'Fasilitas hotel',
            'fasilitashotel' => FasilitasHotel::all()
        ];

        return view('fasilitash.index', $data);
    }
    public function getFasilitasHotelById(Request $request){
        $id = $request->id;
        $fasilitas = FasilitasHotel::find($id);
        return $fasilitas->toJson();
    }
    public function create() {
        $data = [
            'title' => 'Tambah Data Fasilitas',
            'page' => 'Fasilitas Hotel',
        ];
        
        return view('fasilitash.tambah', $data);
    }
    public function store(Request $request): RedirectResponse{
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required|',
            'photoUpload' => 'nullable|image|file|max:1024',

        ], [
            'nama_fasilitas' => 'Nama fasilitas Harus Di isi!!',
            'keterangan' => 'Keterangan Harus Di isi!!',
            'photoUpload.image' => 'Yang diupload harus gambar!!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!!',
        ]);

        $validatedData['status'] = 'aktif';

        if($request->file('photoUpload')){
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('fasilitas1', $name);
            $validatedData['photo'] = $name;
        };

        FasilitasHotel::create($validatedData);
        return redirect('/fasilitashotel')->with('info', 'Data Fasilitas hotel berhasil ditambahkan ke dalam database!');

    }
    public function edit(FasilitasHotel $fasilitas){
        $data = [
            'title' => 'Edit Fasilitas Hotel',
            'page' => 'Fasilitas hotel',
            'fasilitas' => $fasilitas
        ];

        return view('fasilitash.edit', $data);
    }
    public function update(Request $request): RedirectResponse{
        $id = $request->id;
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required|',
            'photoUpload' => 'nullable|image|file|max:1024',
        ], [
            'nama_fasilitas' => 'Nama fasilitas Harus Di isi!!',
            'keterangan' => 'Keterangan Harus Di isi!!',
            'photoUpload.image' => 'Yang diupload harus gambar!!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!!',
        ]);

        if ($request->file('photoUpload')) {
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('fasilitas1', $name);
            $validatedData['photo'] = $name;

            if ($request->photoLama != null) {
                unlink(public_path('storage/fasilitas1/' . $request->photoLama));
            }
        };


        $fasilitas = FasilitasHotel::find($id);
        $fasilitas->update($validatedData);

        return redirect('/fasilitashotel')->with('info', 'Data Fasilitas Hotel  berhasil diupdate !!');
    
    }
    public function destroy(FasilitasHotel $fasilitas): RedirectResponse{
        $fasilitas->delete();
        return redirect('/fasilitashotel')->with('info', 'Data Fasilitas hotel dihapus di dalam database!');
    }
}
