<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\FasilitasKamar;
use App\Models\DetailFasilitas;
use Illuminate\Http\RedirectResponse;

class FasilitasKamarController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Data Fasilitas Kamar',
            'page' => 'Fasilitas Kamar',
            'fasilitasKamar' => FasilitasKamar::all()
        ];

        return view('kamar.fasilitas', $data);
    }
    public function getFasilitasKamarById(Request $request){
        $id = $request->id;
        $fasilitas = FasilitasKamar::find($id);
        return $fasilitas->toJson();
    }
    public function create(){
        $data = [
            'title' => 'Tambah Data Fasilitas',
            'page' => 'Fasilitas Kamar',
        ];

        return view('kamar.fasilitas.tambah', $data);
    }
    public function store(Request $request): RedirectResponse{
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'photoUpload' => 'nullable|image|file|max:1024',
        ],[
            'nama' => 'Nama fasilitas harus di isi!',
            'keterangan' => 'Keterangan fasilitas harus di isi!',
            'photoUpload.image' => 'Yang diupload harus gambar!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!',
        ]);

        if($request->file('photoUpload')){
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('fasilitas', $name);
            $validatedData['photo'] = $name;
        };

        FasilitasKamar::create($validatedData);
        return redirect('/fasilitaskamar')->with('info', 'Data Fasilitas Kamar ditambahkan ke dalam database!');

    }
    public function edit(FasilitasKamar $fasilitas){
        $data = [
            'title' => 'Edit Profile Fasilitas Kamar',
            'page' => 'Fasilitas Kamar',
            'fasilitas' => $fasilitas
        ];

        return view('kamar.fasilitas.edit', $data);
    }
    public function update(Request $request): RedirectResponse{
        $id = $request->id;

        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'photoUpload' => 'nullable|image|file|max:1024',
        ],[
            'nama' => 'Nama fasilitas harus di isi!',
            'keterangan' => 'Keterangan fasilitas harus di isi!',
            'photoUpload.image' => 'Yang diupload harus gambar!',
            'photoUpload.max' => 'Ukuran gambar tidak boleh lebih dari 1MB!',
        ]);

        if($request->file('photoUpload')){
            $file = $request->file('photoUpload');
            $name = $file->hashName();
            $file->storeAs('fasilitas', $name);
            $validatedData['photo'] = $name;

            if($request->photoLama != null){
                unlink(public_path('storage/fasilitas/' . $request->photoLama));
            }
        };

        $fasilitas = FasilitasKamar::find($id);
        $fasilitas->update($validatedData);

        return redirect('/fasilitaskamar')->with('info', 'Data Fasilitas Kamar berhasil diupdate di dalam database!');
    }
    public function destroy(FasilitasKamar $fasilitas): RedirectResponse{
        $fasilitas->delete();
        return redirect('/fasilitaskamar')->with('info', 'Data Fasilitas Kamar dihapus di dalam database!');
    }
    public function pilihFasilitas($id){
        $fasilitas = DetailFasilitas::where('kamar_id', $id)->get();
        $fasilitas_id = [];
        foreach($fasilitas as $fasility){
            $fasilitas_id[] = $fasility->fasilitas_kamar_id;
        }
        
        $fasilitaskamar = FasilitasKamar::whereNotIn('id', $fasilitas_id)->get();
        $data = [
            'title' => 'Tambah Fasilitas Kamar',
            'page' => 'FasilitasKamar',
            'fasilitaskamar' => $fasilitaskamar,
            'kamar' => Kamar::find($id)
        ];
        return view ('kamar.pilih_fasilitas', $data);
    }
    public function simpanDetailFasilitas(Request $request){
        // dd($request);
        
        $kamar = Kamar::find($request->kamar_id);
        foreach($request->fasilitas_kamar_id as $fasilitas){
            DetailFasilitas::create([
                'kamar_id' => $request->kamar_id,
                'fasilitas_kamar_id' => $fasilitas,
            ]);
        }

        return redirect('/kamar')->with('info', 'Kamar Untuk tipe'. $kamar->tipe . 'Deluxe berhasil ditambahkan fasilitasnya!');
    }
}
