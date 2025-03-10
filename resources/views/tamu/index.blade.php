@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Tamu Heaven Hotel</h3>
                    @if (session('info'))
                        <div class="col-12 mb-2">
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <a href="/tamu/create" class="btn text-bg-primary rounded-5 mb-3">
                        <i class="icon-plus"></i> Tambah Data Tamu
                    </a>
                    <table class="table table-hover table-striped ">
                        <thea>
                            <tr class=" table-dark">
                                <th class=" py-3 text-light"> NO</th>
                                <th class=" py-3 text-light"> No_Identitas</th>
                                <th class=" py-3 text-light"> Jenis_Identitas</th>
                                <th class=" py-3 text-light"> Nama_Tamu</th>
                                <th class=" py-3 text-light"> No_HP</th>
                                <th class=" py-3 text-light"> Jk</th>
                                <th class=" py-3 text-light"> alamat</th>
                                {{-- <th>Status</th> --}}
                                <th class=" py-3 text-light text-center"> Aksi</th>
                            </tr>
                        </thea>
                        <tbody class=" table-light">
                            @foreach ($tamu as $key => $ta)
                                <tr class=" table-light">
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $ta->no_identitas }} </td>
                                    <td> {{ $ta->jenis_identitas }} </td>
                                    <td> {{ $ta->nama_tamu }} </td>
                                    <td> {{ $ta->no_hp }} </td>
                                    <td> {{ $ta->jk }} </td>
                                    <td> {{ $ta->alamat }} </td>
                                    {{-- <td>
                            <a href="/user/aktif/{{$ar->id}}" class="badge @if ($ar->status == 'aktif')
                            bg-success text-white @else
                            bg-warning text-dark @endif"
                            onclick="return confirm('Ubah Status keaktifan')"> {{ $ar->status }} </a>
                        </td> --}}
                                    <td class=" text-center">
                                        <a href="/tamu/edit/{{ $ta->id }} " class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="/tamu/delete/{{ $ta->id }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin data ini akan di hapus?') ">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
