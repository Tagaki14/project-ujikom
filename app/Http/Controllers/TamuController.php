<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TamuController extends Controller
{
   public function index()
   {
      $data =
           [
              'title' => 'Data Tamu',
              'page' => 'Tamu',
              'tamu' => Tamu::all(),
           ];
        return view('tamu.index', $data);
     }
   public function create()
   {
      $data = [
         'title' => 'Tambah Data Tamu',
         'page' => 'tamu',
      ];

      return view('tamu.tambah', $data);
   }
   public function store(Request $request): RedirectResponse
   {
      $validatedData = $request->validate([
         'no_identitas' => 'required|unique:tamu,no_identitas',
         'jenis_identitas' => 'required',
         'nama_tamu' => 'required',
         'no_hp' => 'required',
         'jk' => 'required',
         'alamat' => 'required',

      ], [
         'no_identitas.required' => 'Nama Identitas Harus Di isi!!',
         'no_identitas.unique' => 'Nama fasilitas sudah ada!!',
         'jenis_identitas' => 'Jenis Identitas Harus Di isi!!',
         'nama_tamu' => 'Nama Tamu Harus Di isi!!',
         'no_hp' => 'Nomer Hp Harus Di isi!!',
         'jk' => 'kelamin kau Harus Di isi!!',
         'alamat' => 'Alamat Harus Di isi!!',
      ]);
      Tamu::create($validatedData);
      return redirect('/tamu')->with('info', 'Data Tamu hotel berhasil Ditambahkan !!');
   }
   public function edit(Tamu $tamu)
   {
      $data = [
         'title' => 'Edit Tamu Hotel',
         'page' => 'tamu',
         'tamu' => $tamu,
      ];

      return view('tamu.edit', $data);
   }
   public function update(Request $request): RedirectResponse
   {
      $id = $request->id;
      $validatedData = $request->validate([
         'no_identitas' => 'required|unique:tamu,no_identitas,' . $id,
         'jenis_identitas' => 'required',
         'nama_tamu' => 'required',
         'no_hp' => 'required',
         'jk' => 'required',
         'alamat' => 'required',
      ], [
         'no_identitas.required' => 'Nama Identitas Harus Di isi!!',
         'no_identitas.unique' => 'Nama fasilitas sudah ada!!',
         'jenis_identitas' => 'Jenis Identitas Harus Di isi!!',
         'nama_tamu' => 'Nama Tamu Harus Di isi!!',
         'no_hp' => 'Nomer Hp Harus Di isi!!',
         'jk' => 'kelamin kau Harus Di isi!!',
         'alamat' => 'Alamat Harus Di isi!!',
      ]);




      $tamu = Tamu::find($id);
      $tamu->update($validatedData);

      return redirect('/tamu')->with('info', 'Data Tamu  Hotel  berhasil diupdate !!');
   }
   public function destroy(Tamu $tamu): RedirectResponse
   {
      $tamu->delete();
      return redirect('/tamu')->with('info', 'Data tamu Hotel berhasil dihapus !!');
   }
 }
