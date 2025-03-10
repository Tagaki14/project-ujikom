<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PelangganController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Data Pelanggan',
            'page' => 'Pelanggan',
            'pelanggan' => Pelanggan::all(),
        // dd($data);
        ];
        return view('pelanggan.index', $data);
    }
    public function destroy(Pelanggan $pelanggan): RedirectResponse{
        $pelanggan->delete();
        return redirect('/pelanggan')->with('info', 'Data pelanggan berhasil dihapus !!');
    }
}
