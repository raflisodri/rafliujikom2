@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ini Data Sepatu</h3>
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
                                <a href="sepatu/tambah" class="btn btn-info">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table " id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>Merk</th>
                                                <th>Stok</th>
                                                <th>Ukuran</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sepatu as $u)
                                                <tr>
                                                    <td>{{ $u->id }}</td>
                                                    <td>{{ $u->nama }}</td>
                                                    <td>{{ $u->merk }}</td>
                                                    <td>{{ $u->stok }}</td>
                                                    <td>{{ $u->ukuran }}</td>
                                                    <td>Rp.{{ $u->harga }}</td>
                                                    <td>
                                                        <a href="sepatu/edit/{{ $u->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="sepatu/detail/{{ $u->id }}"
                                                            class="btn btn-success">Detail</a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="Delete('sepatu/delete/{{ $u->id }}')">Hapus</a>
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
