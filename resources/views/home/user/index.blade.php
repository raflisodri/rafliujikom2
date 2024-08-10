@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ini Data User</h3>
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismisible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Menambahkan Data</div>
                                @endif

                                @if (session('success1'))
                                    <div class="alert alert-success alert-dismisible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Mengubah Data</div>
                                @endif

                                @if (session('success2'))
                                    <div class="alert alert-success alert-dismisible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Menghapus Data</div>
                                @endif

                                <a href="user/tambah" class="btn btn-info">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table " id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Foto</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Tanggl Daftar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $u)
                                                <tr>
                                                    <td>{{ $u->id }}</td>
                                                    <td>{{ $u->name }}</td>
                                                    <td align="center" style="height: 300px width: 300px">
                                                        <img src="{{ asset("foto/$u->foto") }}" alt="">
                                                    </td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>{{ $u->level }}</td>
                                                    <td>{{ $u->created_at }}</td>
                                                    <td>
                                                        <a href="user/edit/{{ $u->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="Delete('user/delete/{{ $u->id }}')">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
