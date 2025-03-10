<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [

            'title' => 'Data Laporan',
            'page' => 'Laporan',
            'reservasi' => Reservasi::all()
        ];
        return view('laporan.index', $data);
    }
}
