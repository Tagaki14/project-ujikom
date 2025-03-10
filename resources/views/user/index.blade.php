@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-4">
                <div class="card-body">
                    <h3 class="text-center fw-bold text-primary-emphasis">Data Petugas Heaven Hotel</h3>

                    @if(session('info'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <hr>
                    <a href="/user/create"  class="btn text-bg-primary rounded-5 mb-3">
                        <i class="icon-plus"></i> Tambahkan Data
                    </a>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class=" table-dark">
                                <th class="py-3 text-light">No</th>
                                <th class="py-3 text-light">Nama</th>
                                <th class="py-3 text-light">Username</th>
                                <th class="py-3 text-light">Email</th>
                                <th class="py-3 text-light">Nomor HP</th>
                                <th class="py-3 text-light">Level</th>
                                <th class="py-3 text-light">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr class=" table-light">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>
                                        <a href="/user/edit/{{ $user->id }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="/user/delete/{{ $user->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data ini akan dihapus?')">
                                            <i class="icon-trash"></i> Hapus
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
