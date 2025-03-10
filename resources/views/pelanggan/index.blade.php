@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-5">
                <div class="card-body">
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Pelanggan Heaven Hotel</h3>
                    @if (session('info'))
                        <div class="col-12 mb-2">
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <table class="table table-hover table-striped ">
                        <thea>
                            <tr class=" table-dark">
                                <th class="text-center py-3"> NO</th>
                                <th class="text-center py-3"> Nama</th>
                                <th class="text-center py-3"> Email</th>
                                <th class="text-center py-3"> Nomer Hp</th>
                                <th class="text-center py-3"> Aksi</th>
                            </tr>
                        </thea>
                        <tbody class=" table-light">
                            @foreach ($pelanggan as $key => $ta)
                                <tr class=" table-light">
                                    <td class="text-center">{{ $key + 1 }} </td>
                                    <td class="text-center"> {{ $ta->nama }} </td>
                                    <td class="text-center"> {{ $ta->email }} </td>
                                    <td class="text-center"> {{ $ta->no_hp }} </td>
                                    <td class=" text-center">
                                        <a href="/pelanggan/delete/{{ $ta->id }}" class="btn btn-danger btn-sm"
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
