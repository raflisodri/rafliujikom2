@extends('layout.master')
@section('content')
    
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ini Data Suplier</h3>
                            @if (session('success'))             
                            <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Menambahkan Data</div>
                      @endif

                      @if (session('success1'))             
                      <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Mengubah Data</div>
                      @endif

                      @if (session('success2'))             
                      <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Menghapus Data</div>
                      @endif
                            <a href="suplier/tambah" class="btn btn-info">Tambah</a>
                        </div>
                        <div class="card body">
                            <div class="table-responsive">
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suplier as $u)
                                        <tr>
                                            <td>{{$u->id}}</td>
                                            <td>{{$u->nama}}</td>
                                            <td>{{$u->nama_perusahaan}}</td>
                                            <td>{{$u->alamat}}</td>
                                            <td>{{$u->no_telp}}</td>
                                            <td>
                                                <a href="suplier/edit/{{$u->id}}" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger" onclick="Delete('suplier/delete/{{$u->id}}')">Hapus</a>
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