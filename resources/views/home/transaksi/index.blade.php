@extends('layout.master')
@section('content')
    
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ini Data Transaksi</h3>
                            @if (session('success'))             
                            <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Menambahkan Data</div>
                      @endif

                      @if (session('success1'))             
                      <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Mengubah Data</div>
                      @endif

                      @if (session('success2'))             
                      <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Berhasil Menghapus Data</div>
                      @endif
                            <a href="transaksi/tambah" class="btn btn-info">Tambah</a>
                            <a href="transaksi/cetak" target="_blank" class="btn btn-success">cetak</a>
                        </div>
                      
                        <div class="card body">
                            <div class="table-responsive">
                                <br>
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Kasir</th>
                                            <th>Member</th>
                                            <th>Sepatu</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $u)
                                        <tr>
                                            <td>{{$u->id}}</td>
                                            <td>{{$u->User->name}}</td>
                                            <td>{{$u->Member->nama}}</td>
                                            <td>{{$u->Sepatu->merk}} - {{$u->Sepatu->nama}}</td>
                                            <td>{{$u->tanggal}}</td>
                                            <td>{{$u->jumlah}}</td>
                                            <td>Rp.{{number_format($u->total,0,'.','.')}}</td>
                                            <td>
                                                <a href="transaksi/edit/{{$u->id}}" class="btn btn-warning">Edit</a>
                                                <a href="transaksi/struk/{{$u->id}}" class="btn btn-success" target="_blank">Cetak</a>
                                                <a href="#" class="btn btn-danger" onclick="Delete('transaksi/delete/{{$u->id}}')">Hapus</a>
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